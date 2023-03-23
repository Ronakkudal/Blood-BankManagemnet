<?php
session_start();
if(!isset($_SESSION['uname'])){
  header('location:home.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
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
    .container h1 {
      background-color: red;
        text-align: center;
    }
    /* .marq {
        padding-top:5px;
        padding-bottom:5px;
    }
    .geek1 {
        font-size:30px;
        font-weight:bold;
        color:white;
        padding-bottom:5px;
    } */
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

    .bcontainer{
      display: flex;
      color:black;
      justify-content: space-around;
    }
  </style>
</head>
<body style="background-color:white">
<div class="container-fluid">
  <img src="pics/fp.jpg" class="photo" alt="" srcset="">
  <div class="headings">
    <h1 class="hh1">Life Stream Blood Bank</h1>
   <p>Donate Blood Save Life</p> 
  </div> 
</div>

<!-- <div class = "main">
    <marquee class="marq" bgcolor= "red"  loop="" >
        <div class="geek1"> Hello </div>
        <!-- <div class="geek2">A Complete Blood Management System</div> -->
    <!-- </marquee> -->
    <!-- </div> -->

    <p style="color:white; background-color:red;font-size:30px; text-align: center; padding:5px; ">  Hello <?php  echo $_SESSION['uname']?> </p>
<div class="bcontainer">
<p style="color:red; font-size:25px; ">
<a href="ba.php">BLOOD AVAILABLE</a> <a href="ba.php">
<img border="0"  alt="" src="pics/baa.jpg" width="150" height="150">
</a>   
<a href="addadonor.php">ADD A DONOR</a><a href="addadonor.php">
<img border="0" alt="" src="pics/ad.jpg" width="150" height="150">
</a>  
<a href="suppliedtable.php">SUPPLIED BLOOD DETAILS</a> <a href="suppliedtable.php">
<img border="0" alt="" src="pics/ssd.jpg" width="150" height="150">
</a>   
  <BR> <BR>
  <a href="dod.php">DONOR DETAILS</a><a href="dod.php">
<img border="0" alt="" src="pics/ddd.jpg" width="150" height="150" style="margin-right:20px;">
</a>   
<a href="newsupplied.php">NEW SUPPLY</a> <a href="newsupplied.php">
<img border="0" alt="" src="pics/ns.jpg" width="150" height="150" style="margin-right:12vw;margin-left:20px">
</a> 
<a href="logout.php">LOGOUT</a> <a href="logout.php">
<img border="0" alt="" src="pics/logout.jpg" width="140" height="140" style="margin-left:20px">
</a> 
<br>
  </p>
<p style="border-style:solid; border-color:#191970">
  <span style="font-size: 30px; color:#00008b; BACKGROUND-COLOR:#7FFFD4"> Today's Donation Requests</span>
  <br>
  <marquee width="300px" direction="up" height="360px">
<?php
$cd = date('Y-m-d');
$cn="RAHUL";
echo $cd;
$conn = mysqli_connect("localhost", "root", "root", "project");
$db= new PDO("mysql:host=localhost;dbname=project","root","root");
$stmt =$db->prepare("select name,mobno,city, date from dr where DATE(date)='$cd' order by date DESC");
$stmt->execute();
while($row=$stmt->fetch()){
  echo "<p style=' font-size:21px;color:#008080'>"."$row[name]" . " " ."$row[mobno]" . "  " . "$row[city]";
  echo "<br>";
}
?>
</marquee>
<br>
 <a href="drt.php">All Donation Requests</a>
</p>
</div>
<a href="home.php" style="font-size:25px">Home</a>
<hr style="width:100%; color:red; height:20px; background-color:red"> 
</body>
</html>