


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
        background-image: url('path_to_your_background_image.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .order-table {
        margin-top: 20px;
        width: 80%;
        border-collapse: collapse;
        background-color: #ffffff;
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .order-table th,
    .order-table td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ccc;
    }

    .order-table th {
        background-color: #f2f2f2;
    }

    .order-table img {
        height: 150px;
        width: 150px;
        object-fit: cover;
    }

    .order-table td a {
        display: block;
        padding: 8px 12px;
        background-color: #4CAF50;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .order-table td a:hover {
        background-color: #45a049;
    }
</style>

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
                                    <a href="{{url('/redirect')}}" class="btn btn-success">Home</a>
                                @else
                                    <a href="{{url('/')}}" class="btn btn-success">Home</a>
                                @endauth
                                @endif
			</li>
	       

	          <!-- <li class="nav-item cta mr-md-2"><a href="appointment.html" class="nav-link">Appointment</a></li> -->
	          @if (Route::has('login'))
                               
                                    @auth
                                        <li class="nav-item">
                                        <a href="#" class="btn btn-warning" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
  
                            <!-- <li class="nav-item"><a href="{{url('/redirect')}}" class="btn btn-danger"><span>End Meeting</span></a></li> -->
	        


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





<table class="table table-striped table-bordered">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Date</th>
            <th>Url</th>
        </tr>
        @foreach($data as $p)
        <tr>
            <td><img src="/uploads/{{$p->image}}" alt="Product image" height="150px" width="150px" class="product-image"></td>
            <td>{{$p->name}}</td>
            <td>{{$p->date}}</td>
            @if ($p->url == null)
            <td><a href="" class="btn btn-danger">Appointment time not fixed</a></td>
            @else
            <td><a href="{{ url('user_videocall_join',['url' => $p->url]) }}" class="btn btn-success">Join</a></td>
            @endif
        </tr>
        @endforeach
    </table>


</html>
