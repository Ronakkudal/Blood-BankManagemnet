
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
	<title>Donor Details</title>
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
       .container__table{
           height:82vh;
        border: 5px outset red;    
        text-align: center;
           display: flex;
           justify-content: space-around;
       }
       .leftpart{
           display: flex;
           flex-direction:column;
           font-family: monospace;
           width:30vw;
           align-items: center;
           font-size: 25px;
           
           
       }
       .rightPart{
        display: flex;
        flex-direction:column;           
        font-family: monospace;
        align-items: center;
        width:60vw;
        font-size: 20px;
       }
       .rightPart .rtable{
           float:bottom;
        height:59vh;
        overflow: hidden;
        overflow-y:scroll;
       }

        table{border: 1px solid black;
        text-align: center;}
        th {
            background-color:#dc143c;
            color:white;
            padding:5px;
        }
        tr:nth-child(even) {background-color: #f2f2f2 ;}
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


<div class="container__table">
  <div class="leftpart">
      <h2 style="font-size: 40px; color:#00008b; FONT-FAMILY:ROBOTO" >TOTAL DONATED BLOOD</h2>
  <table style="float:left;background-color:#f0f8ff">
      <thead>
        <tr>
            <th>Blood Group</th>
            <th>Total Units</th>
        </tr>   
        <thead> 

<?php

$query = "SELECT bgp,sum(qty) as aadhar FROM donor group by bgp order by sum(qty) desc";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>". $row["bgp"]."</td><td>". $row["aadhar"]."</td></tr>";
}
echo "</table>";
?>
</table>
</div> 

<div class="rightPart">
<h2 style="font-size: 40px; color:#00008b;FONT-FAMILY:ROBOTO">DETAILS OF DONORS</H2>
<input type="text" id="searchBox-3" placeholder="Search here" style="margin-bottom:10px;margin-right:676px;">
<div class="rtable">

<table id="mytable" style=" background-color:#e0ffff;" >
    <thead>
<tr>
    <th>Unique Number</th>
    <th>Aadhar</th>
    <th>Name</th>
    <th>Mobile Number</th>
    <th>Blood Group</th>
    <th>Units</th>
    <th>City</th>
    <th>Date</th>
</tr>
</thead> 
<tbody> 
            <?php
           
$stmt =$db->prepare("select uid ,aadhar,name,mobno,bgp,qty,city,DATE(date) from donor order by date desc");
$stmt->execute();
while($row=$stmt->fetch()){
            ?>
            <tr>
                <td><?php echo $row['uid'] ?></td>
                <td><?php echo $row['aadhar'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['mobno'] ?></td>
                <td><?php echo $row['bgp'] ?></td>
                <td><?php echo $row['qty'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['DATE(date)'] ?></td>
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
         <script>
          var searchBox_3 = document.getElementById("searchBox-3");
          searchBox_3.addEventListener("keyup",function(){
    var keyword = this.value;
    keyword = keyword.toUpperCase();
    var table_3 = document.getElementById("mytable");
    var all_tr = table_3.getElementsByTagName("tr");
    for(var i=0; i<all_tr.length; i++){
            var all_columns = all_tr[i].getElementsByTagName("td");
            for(j=0;j<all_columns.length; j++){
                if(all_columns[j]){
                    var column_value = all_columns[j].textContent || all_columns[j].innerText;
                    column_value = column_value.toUpperCase();
                    if(column_value.indexOf(keyword) > -1){
                        all_tr[i].style.display = ""; // show
                        break;
                    }else{
                        all_tr[i].style.display = "none"; // hide
                    }
                }
            }
        }
})    
        </script>
</body>
</html>
