<?php

$conn = mysqli_connect('localhost','root','password','techrepairhub');

if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $productType = mysqli_real_escape_string($conn, $_POST['productType']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $warranty = mysqli_real_escape_string($conn, $_POST['warranty']);

  $insert = "INSERT INTO repair_from(name, email, productType, description, warranty) VALUES('$name','$email','$productType','$description', '$warranty')";
  mysqli_query($conn, $insert);
  echo "Data Submitted Successfully";
  header('location:finalform.php');
};
?>


<!DOCTYPE html>
<html>
<head>
  <title>Gadget Repair Appointment</title>
  <style>
    body {
      background-color: #fff;
      color: #333;
      font-family: Arial, sans-serif;
    }

    /* Navbar */
    .navbar {
      background-color: #1768a1;
      padding: 10px;
      text-align: center;
    }
    
    .navbar h1 {
      margin: 0;
      color: #fff;
    }
    
    form {
      max-width: 400px;
      margin: 0 auto;
    }
    
    form h2 {
      text-align: center;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
    }
    
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
    }
    
    .warranty-options {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    
    input[type="radio"] {
      margin-right: 5px;
    }
    
    input[type="submit"] {
      background-color: #1768a1;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      display: block;
      margin: 0 auto;
      transition: background-color 0.3s ease;
    }
    
    input[type="submit"]:hover {
      background-color: #0e4674;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <h1>Gadget Repair Appointment</h1>
  </div>
  
  <form id="appointmentForm" action="" method="post">
    <h2>Repair Appointment Form</h2>
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="productType">Product Type:</label>
    <select id="productType" name="productType" required>
      <option value="">Select...</option>
      <option value="computer">Computer</option>
      <option value="laptop">Laptop</option>
      <option value="smartphone">Smartphone</option>
      <option value="smartwatch">Smart Watch</option>
      <option value="gameconsole">Game Console</option>
      <option value="multimedia">Multimedia</option>
    </select>
    
    <label for="description">Product Description:</label>
    <textarea id="description" name="description" required></textarea>
    
    <label for="warranty">Warranty Condition:</label>
    <select id="warranty" name="warranty" required>
      <option value="">Select...</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>

    <input type="submit" name="submit" value="submit">
  </form>
</body>
</html>
