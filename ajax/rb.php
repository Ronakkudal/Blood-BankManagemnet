<?php
include 'dbconn.php';
?>

<html>
<head>
	<title>REQUEST BLOOD</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
</head>
<body>

    <?php if (isset($_POST['submit'])): 
     $bgp = $_POST['bgp'];
     $rqty = $_POST['rqty'];
     $city = $_POST['city'];
?>  
                
<?php




$stmt =$db->prepare("select sum(qty) as qty from alld group by city,bgp HAVING city='$city' and bgp='$bgp' ");
$stmt->execute();
$CHECK=true;
while($row=$stmt->fetch()){
    if($row['qty']>=$rqty){
        echo  "<p style='color:green; font-size:50px'>" ." Blood is Available at our Blood Bank". "</p>";
    }
    else { 
        echo  "<p style='color:red; font-size:50px'>" ."Sorry, Blood Not Available". "</p>";
    }
    $CHECK= false;  

}
if($CHECK){
    echo "<p style='color:red; font-size:50px'>" ."Sorry, Blood Not Available". "</p>"; 
}
mysqli_close($conn);
?> 
                <p>  <a href="home.php">HOME</a> </p>

            <?php else: ?>
                        <h1  style="text-align:center;color:red;font-family:verdana;font-size:300%;">LIFESTREAM BLOOD BANK</H1> <BR>
                        <h3  style="text-align:center;color:#00fa9a;font-family:verdana;">ENTER DETAILS</h3>
                        <p>  <a href="home.php">HOME</a> </p>
                        <form action="rb.php" method="POST">

                        <div class="container">
                  <div class="row">
                  <div class="mb-2">
                <label for="bgp"> <b>Blood Group</b> </label>
                <input class="form-control"  type="text" name="bgp" placeholder="enter blood group" required> </br>
                <label for="qty"> <b>Units</b> </label>
                <input class="form-control"  type="number" name="rqty" placeholder="enter units" required> </br>
                <label for="city"> <b>City</b> </label>
                <input class="form-control"  type="text" name="city" placeholder="enter city from where you want to take blood  in CAPITAL letters" > </br>
                
            
                <button class="btn btn-primary"type="submit" name="submit">submit</button>
                
</div>

                        </form>
	<?php endif; ?>
</body>
</html>
