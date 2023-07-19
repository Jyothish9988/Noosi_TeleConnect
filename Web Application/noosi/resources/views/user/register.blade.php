@include('user.header_2');

<style>
  .form-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f5f5f5;
  }

  .form-container h2 {
    text-align: center;
    margin-bottom: 20px;
  }

  .form-container .form-group {
    margin-bottom: 15px;
  }

  .form-container label {
    font-weight: bold;
  }

  .form-container input[type="text"],
  .form-container input[type="number"],
  .form-container input[type="date"],
  .form-container select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .form-container .btn-primary {
    display: block;
    width: 100%;
    padding: 10px;
    font-weight: bold;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
  }

  .form-container .btn-primary:hover {
    background-color: #0056b3;
  }

  .camera-container {
    position: relative;
    width: 320px;
    height: 240px;
    margin: 0 auto;
  }

  .camera-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .camera-container .capture-button {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    padding: 8px 16px;
    font-weight: bold;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
  }
</style>

<br><br><br><br><br><br><br><br><br>

<!-- ------------------alert------------------------- -->
@if(session()->has('message'))
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">x</button>
  {{session()->get('message')}}
</div>
@endif
<!-- -------------------------alert end--------------- -->

<div class="form-container">
  <h2>Upload Patient Details</h2>

  <form action="{{ url('upload_patient') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label>Image</label>
      <br>
      <div class="camera-container">
        <video id="cameraView" playsinline autoplay></video>
        <button type="button" id="captureButton" class="capture-button">Capture Photo</button>
      </div>
      <input type="hidden" name="capturedImageData" id="capturedImageData">
    </div>
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" placeholder="Enter Name" required class="form-control">
    </div>

    <div class="form-group">
      <label>Age</label>
      <input type="text" name="age" placeholder="Enter Age" required class="form-control">
    </div>

    <div class="form-group">
      <label>Date of Birth</label>
      <input type="date" name="dob" placeholder="Select Date of Birth" required class="form-control">
    </div>

    <div class="form-group">
      <label>Gender</label>
      <select name="gender" class="form-control">
        <option>Select Gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
      </select>
    </div>

    <div class="form-group">
      <label>Blood Group</label>
      <select name="blood" class="form-control">
        <option>Select blood group</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>O+</option>
        <option>O-</option>
        <option>AB+</option>
        <option>AB-</option>
      </select>
    </div>

    <div class="form-group">
      <label>Address</label>
      <input type="text" name="address" placeholder="Enter Address" required class="form-control">
    </div>

    <div class="form-group">
      <label>Pin</label>
      <input type="number" name="pin" placeholder="Enter Pin" required class="form-control">
    </div>

    <div class="form-group">
      <label>Contact</label>
      <input type="number" name="phone" placeholder="Enter Phone Number" required class="form-control">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" placeholder="Enter Email" required class="form-control">
    </div>

    <div class="form-group">
      <label>Health ID</label>
      <input type="text" name="hid" placeholder="Enter Health ID" class="form-control">
    </div>

    <input type="submit" class="btn btn-primary" value="Submit">
  </form>
</div>
<script>
  // Get references to the HTML elements
  const cameraView = document.getElementById('cameraView');
  const captureButton = document.getElementById('captureButton');
  const capturedImageDataField = document.getElementById('capturedImageData');
  const captureMessage = document.getElementById('captureMessage');

  // Function to initialize the camera
  async function initializeCamera() {
    try {
      const stream = await navigator.mediaDevices.getUserMedia({ video: true });
      cameraView.srcObject = stream;
      await new Promise((resolve) => {
        cameraView.onloadedmetadata = () => {
          resolve();
        };
      });
    } catch (error) {
      console.error('Error accessing the camera:', error);
    }
  }

  // Function to capture the photo
  function capturePhoto() {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    canvas.width = cameraView.videoWidth;
    canvas.height = cameraView.videoHeight;
    context.drawImage(cameraView, 0, 0, canvas.width, canvas.height);
    const imageData = canvas.toDataURL('image/png');
    capturedImageDataField.value = imageData;
    captureMessage.innerText = 'Photo captured!';
  }

  // Attach the initializeCamera function to the window load event
  window.addEventListener('load', function () {
    initializeCamera();
  });

  // Attach the capturePhoto function to the button click event
  captureButton.addEventListener('click', function () {
    capturePhoto();
  });
</script>


@include('user.footer_2')
