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
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->

	<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">9526 <span class="float-right"></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Temperature <span class="float-right"></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">8323 <span class="float-right"></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Weight Scale<span class="float-right"></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">6200 <span class="float-right"></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Pulse Oximeter <span class="float-right"></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">5630 <span class="float-right"></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Blood Pressure Monitor <span class="float-right"></span></p>
                </div>
            </div>
        </div>
    </div>
 </div>  
	  
 <div class="row">
  <div class="col-12 col-lg-4 col-xl-4 order-lg-last">



  <div class="card">
    <div class="card-header">Heart Rate
		   <div class="card-action">
			 <div class="dropdown">
			 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
			  <i class="icon-options"></i>
			 </a>
				<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="javascript:void();">Action</a>
				<a class="dropdown-item" href="javascript:void();">Another action</a>
				<a class="dropdown-item" href="javascript:void();">Something else here</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="javascript:void();">Separated link</a>
			   </div>
			  </div>
		   </div>
		 </div>
		 <div class="card-body">
		    <ul class="list-inline">
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>New Visitor</li>
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>Old Visitor</li>
			</ul>
			<div class="chart-container-1">


            <div style="overflow-x:auto">
            <canvas id="waveformCanvas" width="800" height="200"></canvas>
            </div>



			</div>
		 </div>
		 
		 <div class="row m-0 row-group text-center border-top border-light-3">
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0">45.87M</h5>
			   <small class="mb-0">Overall Visitor <span> <i class="fa fa-arrow-up"></i> 2.43%</span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0">15:48</h5>
			   <small class="mb-0">Visitor Duration <span> <i class="fa fa-arrow-up"></i> 12.65%</span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0">245.65</h5>
			   <small class="mb-0">Pages/Visit <span> <i class="fa fa-arrow-up"></i> 5.62%</span></small>
		     </div>
		   </div>
		 </div>
		 
    </div>
  </div>






  
  <div class="col-12 col-lg-8 col-xl-8 order-lg-first">
    
      <!-- Videos content here -->
      <div class="copy d-none">Send your URL to start a video call, code: <input type="text" value="{{$url}}" id="hash" readonly></div><br>

      <div class="d-flex justify-content-between">
      <video id="localVideo" autoplay muted></video>
      <video id="remoteVideo" autoplay></video>

    </div>
  </div>
</div>




     
	
   


 </div><!--End Row-->


    </div>
      </div>
    </div><!--End Row-->
	
	</div>
	 </div>
	</div><!--End Row-->

      <!--End Dashboard Content-->
    <!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
	
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
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
  <!-- Chart js -->
  
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
