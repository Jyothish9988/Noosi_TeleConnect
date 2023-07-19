<!DOCTYPE html>
@include('doctor.header_2');
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdn.scaledrone.com/scaledrone.min.js"></script>

 
</head>
<body>





  <div class="copy">Send your URL to start a video call, code:<input type="text" value="{{$url}}" id="hash" readonly>
   
  </div><br>


  <video id="localVideo" autoplay muted width="320" height="240" controls> </video>
 
  <video id="remoteVideo" autoplay></video>


  
<script>

var roomHash1=document.getElementById('hash').value;

  location.hash = roomHash1.toString();

const roomHash = location.hash;

const drone = new ScaleDrone('yiS12Ts5RdNhebyM');
// Room name needs to be prefixed with 'observable-'
const roomName = 'observable-' + roomHash;
const configuration = {
  iceServers: [{
    urls: 'stun:stun.l.google.com:19302'
  }]
};
let room;
let pc;




function onSuccess() {};
function onError(error) {
  console.error(error);
};

drone.on('open', error => {
  if (error) {
    return console.error(error);
  }
  room = drone.subscribe(roomName);
  room.on('open', error => {
    if (error) {
      onError(error);
    }
  });
  // We're connected to the room and received an array of 'members'
  // connected to the room (including us). Signaling server is ready.
  room.on('members', members => {
    console.log('MEMBERS', members);
    // If we are the second user to connect to the room we will be creating the offer
    const isOfferer = members.length === 2;
    startWebRTC(isOfferer);
  });
});

// Send signaling data via Scaledrone
function sendMessage(message) {
  drone.publish({
    room: roomName,
    message
  });
}

function startWebRTC(isOfferer) {
  pc = new RTCPeerConnection(configuration);

  // 'onicecandidate' notifies us whenever an ICE agent needs to deliver a
  // message to the other peer through the signaling server
  pc.onicecandidate = event => {
    if (event.candidate) {
      sendMessage({'candidate': event.candidate});
    }
  };

  // If user is offerer let the 'negotiationneeded' event create the offer
  if (isOfferer) {
    pc.onnegotiationneeded = () => {
      pc.createOffer().then(localDescCreated).catch(onError);
    }
  }

  // When a remote stream arrives display it in the #remoteVideo element
  pc.ontrack = event => {
    const stream = event.streams[0];
    if (!remoteVideo.srcObject || remoteVideo.srcObject.id !== stream.id) {
      remoteVideo.srcObject = stream;
    }
  };

  navigator.mediaDevices.getUserMedia({
    audio: true,
    video: true,
  }).then(stream => {
    // Display your local video in #localVideo element
    localVideo.srcObject = stream;
    // Add your stream to be sent to the conneting peer
    stream.getTracks().forEach(track => pc.addTrack(track, stream));
  }, onError);

  // Listen to signaling data from Scaledrone
  room.on('data', (message, client) => {
    // Message was sent by us
    if (client.id === drone.clientId) {
      return;
    }

    if (message.sdp) {
      // This is called after receiving an offer or answer from another peer
      pc.setRemoteDescription(new RTCSessionDescription(message.sdp), () => {
        // When receiving an offer lets answer it
        if (pc.remoteDescription.type === 'offer') {
          pc.createAnswer().then(localDescCreated).catch(onError);
        }
      }, onError);
    } else if (message.candidate) {
      // Add the new ICE candidate to our connections remote description
      pc.addIceCandidate(
        new RTCIceCandidate(message.candidate), onSuccess, onError
      );
    }
  });
}

function localDescCreated(desc) {
  pc.setLocalDescription(
    desc,
    () => sendMessage({'sdp': pc.localDescription}),
    onError
  );
}


</script>
<script>
    // Sample heart rate data
    const heartRateData = [
      // Place your heart rate values here
      // e.g., 60, 65, 70, 75, ...
    ];

    // Canvas setup
    const canvas = document.getElementById("waveformCanvas");
    const context = canvas.getContext("2d");
    const width = canvas.width;
    const height = canvas.height;

    // Function to draw the waveform
    function drawWaveform() {
      context.clearRect(0, 0, width, height);

      // Set the line color and style
      context.strokeStyle = "blue";
      context.lineWidth = 2;

      // Calculate the vertical scale
      const scale = height / Math.max(...heartRateData);

      // Move to the starting point
      context.beginPath();
      context.moveTo(0, height - heartRateData[0] * scale);

      // Draw the waveform
      for (let i = 1; i < heartRateData.length; i++) {
        const x = (width / (heartRateData.length - 1)) * i;
        const y = height - heartRateData[i] * scale;
        context.lineTo(x, y);
      }

      // Stroke the path
      context.stroke();
    }

    // Call the drawWaveform function
    drawWaveform();
  </script>

</html>
