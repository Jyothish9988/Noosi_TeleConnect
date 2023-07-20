<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/dashtreme/demo/transparent-admin/vertical-layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jan 2020 07:18:48 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme - Multipurpose Bootstrap4 Admin Template</title>
  <!--favicon-->
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


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdn.scaledrone.com/scaledrone.min.js"></script>

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
      /* box-shadow: rgba(156, 172, 172, 0.2) 0px 2px 2px, rgba(156, 172, 172, 0.2) 0px 4px 4px, rgba(156, 172, 172, 0.2) 0px 8px 8px, rgba(156, 172, 172, 0.2) 0px 16px 16px, rgba(156, 172, 172, 0.2) 0px 32px 32px, rgba(156, 172, 172, 0.2) 0px 64px 64px; */
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

   <!-- start loader -->
   <!-- <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div> -->
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper" class="toggled">
 
 

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>

    <li class="nav-item">
			  @if (Route::has('login'))
                                @auth
                                    <a href="{{url('/redirect')}}" class="nav-link">Home</a>
                                @else
                                    <a href="{{url('/')}}" class="nav-link">Home</a>
                                @endauth
                                @endif
			</li>
	       
	          <li class="nav-item"><a href="{{ url('consultation') }}" class="nav-link"><span>Consultation</span></a></li>
			  <li class="nav-item"><a href="{{ url('bookings_view_today') }}" class="nav-link"><span>Bookings</span></a></li>
	          <li class="nav-item"><a href="{{ url('doctor_dr') }}" class="nav-link"><span>Doctors</span></a></li>
	          <!-- <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li> -->
			  <li class="nav-item"><a href="{{ url('blogs') }}" class="nav-link"><span>Blog</span></a></li>
	         
	          <!-- <li class="nav-item cta mr-md-2"><a href="appointment.html" class="nav-link">Appointment</a></li> -->
	          @if (Route::has('login'))
                               
                                    @auth
                                        <li class="nav-item">
                                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
    @csrf
</form>
                                        
                                        </li> 

                                    @else
                                        
                                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link" data-toggle="modal"><i class="icon-user"></i>Login</a></li>

                                        @if (Route::has('register'))
                                   
                                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"class="ml-4 text-sm text-gray-700 underline">Signup</a></li>
                                        @endif
                                    @endauth
                                
                            @endif
	        


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
<br>
<br>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->

      <head>
    <!-- ... (other head content) ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <!-- Temperature -->
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">{{ $reading->temperature }}°C<span class="float-right">
                        @if ($reading->temperature > 37.5)
                            <i class="fas fa-arrow-up text-danger"></i>
                        @elseif ($reading->temperature < 36.0)
                            <i class="fas fa-arrow-down text-primary"></i>
                        @else
                            <i class="fas fa-equals text-success"></i>
                        @endif
                    </span></h5>
                    <div class="progress my-3" style="height:15px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $reading->temperature }}%;" aria-valuenow="{{ $reading->temperature }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Temperature <span class="float-right"></span></p>
                </div>
            </div>
            
            <!-- Weight Scale -->
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">{{ $reading->weight_scale }} kg<span class="float-right">
                        @if ($reading->weight_scale > 80)
                            <i class="fas fa-arrow-up text-danger"></i>
                        @elseif ($reading->weight_scale < 50)
                            <i class="fas fa-arrow-down text-primary"></i>
                        @else
                            <i class="fas fa-equals text-success"></i>
                        @endif
                    </span></h5>
                    <div class="progress my-3" style="height:15px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $reading->weight_scale }}%;" aria-valuenow="{{ $reading->weight_scale }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Weight Scale<span class="float-right"></span></p>
                </div>
            </div>
            
            <!-- Heart Rate -->
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">{{ $reading->heart_rate }} bpm<span class="float-right">
                        @if ($reading->heart_rate > 100)
                            <i class="fas fa-arrow-up text-danger"></i>
                        @elseif ($reading->heart_rate < 60)
                            <i class="fas fa-arrow-down text-primary"></i>
                        @else
                            <i class="fas fa-equals text-success"></i>
                        @endif
                    </span></h5>
                    <div class="progress my-3" style="height:15px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $reading->heart_rate }}%;" aria-valuenow="{{ $reading->heart_rate }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Heart Rate<span class="float-right"></span></p>
                </div>
            </div>
            
            <!-- Respiration Rate -->
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">{{ $reading->respiration_rate }} bpm<span class="float-right">
                        @if ($reading->respiration_rate > 20)
                            <i class="fas fa-arrow-up text-danger"></i>
                        @elseif ($reading->respiration_rate < 12)
                            <i class="fas fa-arrow-down text-primary"></i>
                        @else
                            <i class="fas fa-equals text-success"></i>
                        @endif
                    </span></h5>
                    <div class="progress my-3" style="height:15px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $reading->respiration_rate }}%;" aria-valuenow="{{ $reading->respiration_rate }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Respiration Rate<span class="float-right"></span></p>
                </div>
            </div>
            
            <!-- Oxygen Saturation -->
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">{{ $reading->oxygen_saturation }}%<span class="float-right">
                        @if ($reading->oxygen_saturation < 95)
                            <i class="fas fa-arrow-down text-primary"></i>
                        @elseif ($reading->oxygen_saturation >= 95 && $reading->oxygen_saturation <= 100)
                            <i class="fas fa-equals text-success"></i>
                        @endif
                    </span></h5>
                    <div class="progress my-3" style="height:15px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $reading->oxygen_saturation }}%;" aria-valuenow="{{ $reading->oxygen_saturation }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Oxygen Saturation<span class="float-right"></span></p>
                </div>
            </div>
            
            <!-- Blood Pressure Monitor -->
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">{{ $reading->blood_pressure }}<span class="float-right"></span></h5>
                    <div class="progress my-3" style="height:15px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $reading->blood_pressure }}%;" aria-valuenow="{{ $reading->blood_pressure }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Blood Pressure Monitor<span class="float-right"></span></p>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3 border-light">
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <textarea name="temperature" class="form-control mb-2" rows="3" placeholder="Please enter the prescription here"></textarea>
            <button type="submit" class="btn btn-primary">Generate Report</button>
        </form>
    </div>
</div>
        </div>
    </div>
</div>

 
	  

    
      <!-- Videos content here -->
      <div class="copy d-none">Send your URL to start a video call, code: <input type="text" value="{{$url}}" id="hash" readonly></div><br>

      <div class="d-flex justify-content-between">
      <video id="localVideo" autoplay muted></video>
      <video id="remoteVideo" autoplay></video>

    </div>
 
	
	</div>
	 </div>
  <div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            
        <div class="col-12 col-lg-6 col-xl-3 border-light">
    <div class="card-body">
        <span>Noosi TeleConnect</span>
    </div>
</div>
                    
        </div>
    </div>
</div>
	</div>

  
	  <div class="overlay toggle-menu"></div>
	
	
    </div>
   
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>


  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('video/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('video/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('video/assets/js/bootstrap.min.js')}}"></script>
	
 <!-- simplebar js -->
  <script src="{{asset('video/assets/plugins/simplebar/js/simplebar.js')}}"></script>
  <!-- sidebar-menu js -->
  <script src="{{asset('video/assets/js/sidebar-menu.js')}}"></script>
  <!-- loader scripts -->
  <script src="{{asset('video/assets/js/jquery.loading-indicator.html')}}"></script>
  <!-- Custom scripts -->
  <script src="{{asset('video/assets/js/app-script.js')}}"></script>

  <script src="{{asset('video/assets/plugins/Chart.js/Chart.min.js')}}"></script>
  <!-- Vector map JavaScript -->
  <script src="{{asset('video/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{asset('video/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- Easy Pie Chart JS -->
  <script src="{{asset('video/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
  <!-- Sparkline JS -->
  <script src="{{asset('video/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('video/assets/plugins/jquery-knob/excanvas.js')}}"></script>
  <script src="{{asset('video/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
    
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
  <!-- Index js -->
  <script src="{{asset('video/assets/js/index.js')}}"></script>
  
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
      70, 75, 80, 78, 82, 85, 88, 90, 92, 95, 98, 100, 105, 102, 99, 95, 92, 90, 88, 85, 82, 80, 78, 75, 73, 70, 68, 65, 62, 60
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

</body>

<!-- Mirrored from codervent.com/dashtreme/demo/transparent-admin/vertical-layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jan 2020 07:20:15 GMT -->
</html>
