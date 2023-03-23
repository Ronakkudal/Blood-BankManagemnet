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
	<title>Blood Avaiable</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
.tuc{ display: flex;
  margin:0 auto;
  align-items: center;
     width:25vw;
     border:2px solid red;
     border-radius:2px;
     height:100px;
     color:#000;
    }
       .container__table{
           height:40vh;    
        text-align: center;
           display: flex;
           justify-content: space-between;
           margin:0 35px;
       }
       .rightPart{
        /* display: flex; */
        flex-direction:column;           
        /* font-family: monospace; */
        align-items: center;
        width:30vw;
        height:35vh;
        font-size: 25px;
       }
       .rightPart .rtable{
           float:bottom;
           width:28vw;
        height:35vh;
        overflow: hidden;
        overflow-y:scroll;
       }

        table{border: 1px solid black;
        text-align: center;}
        th {
            background-color:#dc143c;
            color:white;
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
<h2 style="text-align:center; background-color:red;color:white ;margin-top:5px;margin-left:37vw; width:25vw" > Total Units in Stock   </h2>

    <div class="tuc">
<?php

$query = "SELECT sum(qty) as qty FROM alld ";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  // echo "<br>";
  echo  "<p style='color:#00fa9a; font-size:70px;text-align:center;margin-left:130px'>". $row["qty"];
}

?>
   <img border="0"  alt="" src="pics/baa.jpg" width="80px" height="80px" >

</div>
<br>
 <div class="container__table">
<div class="rightPart">
<h2 class="page-header" style="color:#00008b;">AVAILABLE BLOOD CITYWISE</H1>
<div class="rtable">
<table id="mytable" style=" background-color:#e0ffff;" >
    <thead>
<tr>
    
    <th>Blood Group</th>
    <th>Units</th>
    <th>City</th>
   
</tr>
</thead> 
<tbody> 
            <?php
            
$stmt =$db->prepare("select bgp,sum(qty) as qty,city from alld group by city,bgp HAVING sum(qty)>0 order by city");
$stmt->execute();
while($row=$stmt->fetch()){
            ?>
            <tr>
                
                <td><?php echo $row['bgp'] ?></td>
                <td><?php echo $row['qty'] ?></td>
                <td><?php echo $row['city'] ?></td>
                
</tr>
<?php
}
?>
        </tbody>
</table>
<?php  $sql ="SELECT bgp,SUM(qty) as qty from alld group by bgp order by bgp ";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['bgp']  ;
            $sales[] = $row['qty'];
        }
?>
</div> </div>
 <div style="width:40%;hieght:10%;text-align:center">
            <h2 class="page-header" style=" color:#00008b;" >Available Blood Groupwise </h2>
            <div></div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>  </div> <br><br>
         <hr style="width:100%; color:red; height:10px; background-color:red"> 







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="ddtf.js"></script>
    <script>
        $('#mytable').ddTableFilter();
        </script>
 <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>       
</body>
</html>
