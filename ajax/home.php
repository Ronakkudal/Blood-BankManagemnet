<?php 
session_start();
include 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BLOOD BANK MANAGEMENT SYSTEM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
   .carousel{
     width:60vw;   
    } 
   /* . */
     .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 15px;
    padding-left: 300px;
    background-color:red;  
}

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

   .heading{
     padding:20px;
     background: pink;
     font-size:1.3rem;

     margin-bottom:20px;
     TEXT-ALIGN:CENETR;
   }
   

   .middleContainer{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:0 10px;
    
    /* width:; */
   }
   .SubmitBtn{
     display: flex;
     justify-content: center;
     background-color: red;
     border:none;
     border-radius:3px;
     padding:5px 15px;
     color:#fff;
     margin:auto;
     }
   .Login__container{
     display: grid;
     /* grid-template-columns: 1fr 1fr; */

   }

   
   .LoginForm{
     width:30vw;
     border:2px solid red;
     border-radius:2px;
     height:450px;
     color:#000;
    }
    .main {
        text-align:center;
    }
    .marq {
        padding-top:10px;
        padding-bottom:10px;
    }
    .geek1 {
        font-size:36px;
        font-weight:bold;
        color:white;
        padding-bottom:10px;
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
        border:white;
    }
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    .footer{
	background-color: #24262b;
    padding: px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}
  </style>



</head>
<body>
<?php
$SERVER = "localhost";

if (isset($_POST['submit'])){
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $us="select * from login where uname='$uname'";
  $query=mysqli_query($conn,$us);
  $ucount=mysqli_num_rows($query);
  if($ucount){
    $upass=mysqli_fetch_assoc($query);
    $dbpass=$upass['pass'];
    $_SESSION['uname']=$upass['uname'];
    
    if($pass==$dbpass){
      echo  "<p style='color:red;'>" ."login successfully". "</p>";
      $_POST['pass']="";
      ?> 
<script>
  location.replace("adminhp.php");
</script>

     <?php

    } else {  
      echo  "<p style='color:red;'>" ." Password incorrect". "</p>";  }

  }else{  
     echo  "<p style='color:red;'>" ." Invalid username". "</p>";
    }
}

?>

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
        <a class="nav-link" href="#"  style=" font-size:20px;">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#"  style="font-size:20px;">Admin Login</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="rb.php"  style=" font-size:20px;">Check Blood Availability</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="db.php"  style="font-size:20px;">Donate Blood </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php"  style="font-size:20px;">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="middleContainer">
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="pics/gettyimages-519935149-2048x2048.jpg" alt="" width="900" height="460">
      <div class="carousel-caption">
       
      </div>   
    </div>
    <div class="carousel-item">
      <img src="pics/Blood-donation-facebook-post.jpg" alt="" width="900" height="460">
      <div class="carousel-caption">
        
      </div>   
    </div>
    <div class="carousel-item">
      <img src="pics/commonResource_1517314124_65324.jpg" alt="" width="900" height="460">
      <div class="carousel-caption">
      
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>   <!-- Carosol -->

<div class="LoginForm">
  <div class="heading">
    <span style="color:#00008b;FONT-FAMILY:ROBOTO;FONT-SIZE:30PX;TEXT-ALIGN:CENTER">Admin Login</span>
  </div>   
    <form action="home.php" method="post">
      <div class="Login__container">
        <label> Enter Your Name :</label><input type="text" name="uname" id=""   required="true" ><br>
        <label> Enter Your Password :</label><input type="password" name="pass" id=""  required="true"><br>
      </div>
     <button type="submit" class="SubmitBtn" name="submit" id="logbtn">Submit</button>
    </form>
</div>

</div>    <!-- MiddleContainer -->

<div class = "main">
    <marquee class="marq" bgcolor= "red" direction = "left" loop="" >
        <div class="geek1">Welcome to the official website of Lifestream Blood Bank</div>
        <div class="geek2">A Complete Blood Management System</div>
    </marquee>
    </div>
</div>  <!-- RunningStrip -->
  <img src="pics/hpp2.jpg" alt="" width="100%" height="400">
  <title>Footer Design</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
  <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>Explore</h4>
  	 			<ul>
  	 				<li><a href="about.php">About</a></li>
  	 				<li><a href="about.php">Our Centers</a></li>
  	 				<li><a href="about.php">Contact Us</a></li>
  	 				
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">Camps Date</a></li>

  	 				<li><a href="#">order status</a></li>
  	 				<li><a href="#">payment options</a></li>
  	 			</ul>
  	 		</div>
         
  	 		<div class="footer-col">
  	 			<h4>WeAre4U</h4>
           <p>Blood is essential to help patients survive surgeries, 
             cancer treatment, chronic illnesses, and traumatic injuries.
              This lifesaving care starts with one person making a 
              generous donation. </p>
  	 			
  	 		</div>
        <br>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
             <br>
             <br>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
  
</body>
</html>