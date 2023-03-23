
<?php
session_start();
if(!isset($_SESSION['uname'])){
  header('location:home.php');
}
include 'dbconn.php';
?>

<!DOCTYPE html> 
<html>
<head>
	<title>Donation Requests</title>
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

       
        .rtable{
           /* float:bottom; */
        width:50%;   
        height:59vh;
        overflow: hidden;
        overflow-y:scroll;
       }

        table{
            /* border: 3px solid red; */
        text-align: center;
        width:100%;
        font-size: 20px;}
        </style>
</head>
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
        <a class="nav-link" href="adminhp.php">Admin Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ba.php">Blood Available</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addadonor.php">Add A Donor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dod.php">Donor Details</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="suppliedtable.php">Supplied Blood Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newsupplied.php">New Supply</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<h1 style="margin-left:170px;color:red">Donation Request</H1><br>
<div class="rtable">
<table id="mytable" style=" background-color:white;" >
    <thead>
<tr>
    <th>Name</th>
    <th>Mobile Number</th>
    <th>City</th>
    <th>Date</th>
</tr>
</thead> 
<tbody> 
            <?php
            
$stmt =$db->prepare("select name,mobno,city,DATE(date) as date from dr order by date desc");
$stmt->execute();
while($row=$stmt->fetch()){
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['mobno'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['date'] ?></td>
</tr>
<?php
}
?>
        </tbody>
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="ddtf.js"></script>
    <script>
        $('#mytable').ddTableFilter();
        </script>
</body>
</html>
