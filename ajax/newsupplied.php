<?php
session_start();
if(!isset($_SESSION['uname'])){
  header('location:home.php');
}
include 'dbconn.php';
?>
<html>
<head>
	<title>Supplied Blood Details</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
</head>
<body>

    <?php if (isset($_POST['submit'])): 
     $aadhar = $_POST['aadhar'];
     $name = $_POST['name'];
     $mobno = $_POST['mobno'];
     $bgp = $_POST['bgp'];
     $qty = $_POST['qty'];
     $city = $_POST['city'];
?>  
                
<?php


if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO supplied ( name,aadhar,mobno,bgp,qty,city) VALUES ('$name', '$aadhar','$mobno', '$bgp', '$qty', '$city')";

if (mysqli_query($conn, $sql)) {
 echo "Registration Successful";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$qty=-1*$qty;
$query = "INSERT INTO alld ( name,aadhar,mobno,bgp,qty,city) VALUES ('$name', '$aadhar', '$mobno', '$bgp', '$qty', '$city')";

if (mysqli_query($conn, $query)) {
    echo " ";
   } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
mysqli_close($conn);
?>                <p> Go <a href="newsupplied.php">BACK</a> to the form</p>
                <p>  <a href="adminhp.php">HOME</a> </p>

            <?php else: ?>
                        <h1  style="text-align:center;color:red;font-family:verdana;font-size:300%;">LIFESTREAM BLOOD BANK</H1> <BR>
                        <h3  style="text-align:center;color:#00fa9a;font-family:verdana;">Supplied Blood Details</h3>
                        <p> <a href="adminhp.php">HOME</a> </p>
                        <form action="newsupplied.php" method="POST">

                        <div class="container">
                  <div class="row">
                  <div class="mb-2">
                <label for="name"> <b>Name of Person/Hospital</b> </label>
                <input class="form-control" type="text" name="name" placeholder="enter name " required> </br>
                <label for="aadhar"> <b>Aadhar Number</b> </label>
                <input class="form-control" type="number" name="aadhar" placeholder="enter Aadhar" required  > </br>
                <label for="mobno"> <b>Mobile Number</b> </label>
                <input  class="form-control" type="number" name="mobno" placeholder="enter mobile number" required> </br>
                <label for="bgp"> <b>Blood Group</b> </label>
                <input class="form-control"  type="text" name="bgp" placeholder="enter blood group" required> </br>
                <label for="qty"> <b>Units</b> </label>
                <input class="form-control"  type="number" name="qty" placeholder="enter units" required> </br>
                <label for="city"> <b>City</b> </label>
                <input class="form-control"  type="text" name="city" placeholder="enter city from where blood is supplied" required> </br>
                
            
                <button class="btn btn-primary"type="submit" name="submit">submit</button>
                
</div>

                        </form>
	<?php endif; ?>
</body>
</html>
