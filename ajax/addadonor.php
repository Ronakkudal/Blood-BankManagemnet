<?php
session_start();
if(!isset($_SESSION['uname'])){
  header('location:home.php');
}
include 'dbconn.php';
?>
<html>
<head>
	<title>Registration Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <?php if (isset($_POST['submit'])): 
     $uid = $_POST['uid'];
     $aadhar = $_POST['aadhar'];
     $name = $_POST['name'];
     $mobno = $_POST['mobno'];
     $bgp = $_POST['bgp'];
     $qty = $_POST['qty'];
     $city = $_POST['city'];
?>  
                
<?php


$sql = "INSERT INTO donor ( uid,aadhar,name,mobno,bgp,qty,city) VALUES ('$uid', '$aadhar', '$name', '$mobno', '$bgp', '$qty', '$city')";
$query = "INSERT INTO alld ( uid,aadhar,name,mobno,bgp,qty,city) VALUES ('$uid', '$aadhar', '$name', '$mobno', '$bgp', '$qty', '$city')";


if (mysqli_query($conn, $sql)) {
 echo "Registration Successful";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
if (mysqli_query($conn, $query)) {
    echo " ";
   } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
mysqli_close($conn);
?>             
                <p> Go <a href="addadonor.php">BACK</a> to the form</p>

                <p>  <a href="adminhp.php">HOME</a> </p>

            <?php else: ?>
                        <h1  style="text-align:center;color:red;font-family:verdana;font-size:300%;">LIFESTREAM BLOOD BANK</H1> <BR>
                        <h3  style="text-align:center;color:red;font-family:verdana;">Registration Form</h3>
                        <p> <a href="adminhp.php">HOME</a> </p>
                        <form action="addadonor.php" method="POST">

                        <div class="container">
                  <div class="row">
                  <div class="mb-2">
                <label for="uid"> <b>Unique ID</b> </label>
                <input class="form-control" type="text" name="uid" placeholder="enter uid" required> </br>
                <label for="aadhar"> <b>Aadhar Number</b> </label>
                <input class="form-control" type="number" name="aadhar" placeholder="enter Aadhar" required  > </br>
                <label for="name"> <b>Name</b> </label>
                <input  class="form-control" type="text" name="name" placeholder="enter name" required> </br>
                <label for="mobno"> <b>Mobile Number</b> </label>
                <input  class="form-control" type="number" name="mobno" placeholder="enter mobile number" required> </br>
                <label for="bgp"> <b>Blood Group</b> </label>
                <input class="form-control"  type="text" name="bgp" placeholder="enter blood group" required> </br>
                <label for="qty"> <b>Units</b> </label>
                <input class="form-control"  type="number" name="qty" placeholder="enter units" required> </br>
                <label for="city"> <b>City</b> </label>
                <input class="form-control"  type="text" name="city" placeholder="enter city" required> </br>
                
            
                <button class="btn btn-primary"type="submit" name="submit">submit</button>
                
</div>

                        </form>
	<?php endif; ?>
</body>
</html>
