<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdn.scaledrone.com/scaledrone.min.js"></script>
  <link rel="icon" href="{{asset('video/assets/images/favicon.ico')}}" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="{{asset('video/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="{{asset('video/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('video/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{asset('video/assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{asset('video/assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{asset('video/assets/css/sidebar-menu.css')}}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{asset('video/assets/css/app-style.css')}}" rel="stylesheet"/>
  <style>
    body {
      display: flex;
      height: 100vh;
      margin: 0;
      align-items: center;
      justify-content: center;
      padding: 0 50px;
      font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    }
    video {
      max-width: calc(50% - 100px);
      margin: 0 50px;
      box-sizing: border-box;
      border-radius: 2px;
      padding: 0;
      box-shadow: rgba(156, 172, 172, 0.2) 0px 2px 2px, rgba(156, 172, 172, 0.2) 0px 4px 4px, rgba(156, 172, 172, 0.2) 0px 8px 8px, rgba(156, 172, 172, 0.2) 0px 16px 16px, rgba(156, 172, 172, 0.2) 0px 32px 32px, rgba(156, 172, 172, 0.2) 0px 64px 64px;
    }
    .copy {
      position: fixed;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 16px;
      color: rgba(0, 0, 0, 0.5);
    }
  </style>
 
</head>
<body class="bg-theme bg-theme1">

<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <!-- <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li> -->

    <li class="nav-item">
			  @if (Route::has('login'))
                                @auth
                                    <a href="{{url('/redirect')}}" class="btn btn-success">Home</a>
                                @else
                                    <a href="{{url('/')}}" class="btn btn-success">Home</a>
                                @endauth
                                @endif
			</li>
	       

	          <!-- <li class="nav-item cta mr-md-2"><a href="appointment.html" class="nav-link">Appointment</a></li> -->
	          @if (Route::has('login'))
                               
                                    @auth
                                        <!-- <li class="nav-item">
                                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
    @csrf
</form>
                                        
                                        </li>  -->

                                    @else
                                        
                                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link" data-toggle="modal"><i class="icon-user"></i>Login</a></li>

                                        @if (Route::has('register'))
                                   
                                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"class="ml-4 text-sm text-gray-700 underline">Signup</a></li>
                                        @endif
                                    @endauth
                                
                            @endif
  
                            <li class="nav-item"><a href="{{url('/redirect')}}" class="btn btn-danger"><span>End Meeting</span></a></li>
	        


  </ul>
     
  </ul>
</nav>
</header>
<!--End topbar header-->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>





<div class="copy d-none">Send your URL to start a video call, code: <input type="text" value="{{$url}}" id="hash" readonly></div><br>
   
  </div><br>


  <video id="localVideo" autoplay muted></video>
 
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


</html>
