<?php
include 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Donate Blood</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
     .photo{
      width:90px;
      height:90px;
      border-radius:50%;
      offset:cover;
      margin-right:20px;

    }
    .container-fluid{
      width: 100%;
    padding-right: 15px;
    padding-left: 300px;
    background-color:WHITE; 
    COLOR: RED; 
      display: flex;
      align-items: center;
      
    }
    .headings .hh1{
      font-size: 60px;
    }
    .headings{
      font-size:20px;
    }
   
   .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 15px;
    padding-left: 300px;
    background-color:red;
    
}

   
    .navbar {
       
        background-color: red;
        
    }
    .navbar-dark .navbar-nav .nav-link {
    color: rgb(22 22 21);
}
.navbar-dark .navbar-nav .active>.nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show>.nav-link {
    color:rgb(22 22 21) ;
}
    .btn-outline-success {
    color: #e6ece8;
    border-color: #f8fcf9;
}

   

    .form-group input {
        font-family: 'Baloo Bhai', cursive;
        text-align: center;
        display: block;
        width: 508px;
        padding: 1px;
        border: 2px solid black;
        margin: 11px auto;
        font-size: 25px;
        border-radius: 8px;
    }

    .container h1 {
      background-color: red;
        text-align: center;
    }

    .container button {
        display: block;
        color: black;
        border-color: #f8fcf9;
        width: 74%;
        margin: 20px auto;
    }
    
    .btn:hover {
      
        background-color:red;
    }
    .data{
        color: black;
        font-size:20px;
        text-align: left;
        display: flex;
         justify-content:space-around; 
         align-content: center;
        
    }
    body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #e1e4e7;
    text-align: left;
    background-color: #ebebeb;
}
.container button {
        
        width: 24%;
        margin: 20px auto;
        border:white

    }
  </style>
</head>
<?php

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
else{
 if (isset($_POST['submit'])){ 
     
     $name = $_POST['name'];
     $mobno = $_POST['mobno'];
     $city = $_POST['city'];
 
$sql = "INSERT INTO dr ( name,mobno,city) VALUES ('$name', '$mobno','$city')";


if (mysqli_query($conn, $sql)) {
echo  "<p style='color:red;'>" ." Details submitted". "</p>";
} 
 else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
else
mysqli_close($conn);

}
?>                 

<body>
<div class="container-fluid">
  <img src="pics/fp.jpg" class="photo" alt="" srcset="">
  <div class="headings">
    <h1 class="hh1">Life Stream Blood Bank</h1>
   <p>Donate Blood Save Life</p> 
  </div> 
</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-#b13937">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="rb.php">Check Blood Availability</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="db.php">Donate Blood </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="about.php">About </a>
      </li>
     
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<h2 style="padding-left:60px;padding-bottom:20px; padding-top:20px;  text-align:left;color:red;font-family:roboto;">
Enter Following Details We Will Inform You About Donation Camp in Your City </h2>
<div class="data">
    <form action="db.php" method="POST">
    Name:
    <input  class="form-control" type="text" name="name" placeholder="enter name" required> </br>
    Mobile Number:
    <input  class="form-control" type="number" name="mobno" placeholder="enter mobile number" required> </br>
    City:
    <input  class="form-control" type="text" name="city" placeholder="enter city" required> </br>
    <button class="btn btn-primary"type="submit" name="submit">submit</button>
    </form>

<img src="pics/bdp.jpg" alt="" width="50%" height="600">

</div>
<h1 style="padding-left:60px; padding-top:20px;text-align:left;color:red;font-family:roboto;">Healthy Effects of Blood Donation</h1>
<p  style="padding-left:60px; text-align:left;color:black;font-family:helvetica;">
Giving blood can reveal potential health problems <br>
Giving blood can reduce harmful iron stores<br>
Giving blood may lower your risk of suffering a heart attack <br>
Giving blood may reduce your risk of developing cancer<br>
</p>
<hr style="width:100%; color:red; height:20px; background-color:red"> 
</body>
</html>