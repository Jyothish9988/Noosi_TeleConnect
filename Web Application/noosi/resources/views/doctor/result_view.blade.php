<!DOCTYPE html>
<html>
@include('doctor.header_2');
<head>
    
    <style>
        /* Sample CSS for the patient information and diagnosis report form */

body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  padding: 20px;
}

h1 {
  text-align: center;
}

form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

textarea {
  resize: vertical;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

/* Optional: Style for image upload input */
input[type="file"] {
  display: none; /* Hide the default file input */
}

/* Custom styling for the file input's label */
label[for="patient_image"] {
  display: inline-block;
  padding: 8px 12px;
  background-color: #4CAF50;
  color: #fff;
  border-radius: 4px;
  cursor: pointer;
}

/* Optional: Additional styling for the form elements (e.g., patient info section) */
.patient-info {
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
}

.patient-info label {
  font-weight: bold;
}

/* Optional: Styling for the diagnosis report section */
.diagnosis-report {
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
}

.diagnosis-report label {
  font-weight: bold;
}

.diagnosis-report textarea {
  min-height: 100px;
  resize: vertical;
}

    </style>
</head>
<br>
<br>
<br>
<body>
    <h1>Patient Information and Diagnosis Report</h1>
    <form method="post" action="">
        @csrf <!-- Add CSRF token for Laravel form submission -->

        <!-- Patient Information -->
        <label for="patient_name">Patient Name:</label>
        <input type="text" name="patient_name" id="patient_name" value="{{ $result->name }}" required>
        <br>
        <label for="patient_email">Patient Email:</label>
        <input type="email" name="patient_email" id="patient_email" value="{{ $result->email }}" required>
        <br>

        <!-- Diagnosis Report -->
        <label for="heart_rate">Heart Rate:</label>
        <input type="text" name="heart_rate" id="heart_rate" value="{{ $result->heart_rate }}"required>
        <br>
        <label for="respiration_rate">Respiration Rate:</label>
        <input type="text" name="respiration_rate" id="respiration_rate" value="{{ $result->respiration_rate }}" required>
        <br>
        <label for="temperature">Temperature:</label>
        <input type="text" name="temperature" id="temperature" value="{{ $result->temperature }}" required>
        <br>
        <label for="oxygen_saturation">Oxygen Saturation:</label>
        <input type="text" name="oxygen_saturation" id="oxygen_saturation" value="{{ $result->oxygen_saturation }}"required>
        <br>
        <label for="weight_scale">Weight Scale:</label>
        <input type="text" name="weight_scale" id="weight_scale" value="{{ $result->weight_scale }}" required>
        <br>
        <label for="blood_pressure">Blood Pressure:</label>
        <input type="text" name="blood_pressure" id="blood_pressure" value="{{ $result->blood_pressure }}"required>
        <br>
        <label for="diagnosis_report">Diagnosis Report:</label>
        <textarea name="diagnosis_report" id="diagnosis_report" required>{{ $result->report }}</textarea>
        <br>
        <label for="prescription">Prescription:</label>
        <textarea name="prescription" id="prescription" required>{{ $result->prescription }}</textarea>
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
@include('doctor.footer_2');
</html>
