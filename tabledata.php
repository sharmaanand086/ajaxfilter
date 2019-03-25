<!DOCTYPE html>
<html>
<head>
<title>coach stat</title>
<!-- DataTables CSS -->
<link href="css/addons/datatables.min.css" rel="stylesheet">
<!-- DataTables JS -->
<script href="css/addons/datatables.min.js" rel="stylesheet"></script>

<!-- DataTables Select CSS -->
<link href="css/addons/datatables-select.min.css" rel="stylesheet">
<!-- DataTables Select JS -->
<script href="css/addons/datatables-select.min.js" rel="stylesheet"></script>
 <script>
 $(document).ready(function () {
$('#dtMaterialDesignExample').DataTable();
$('#dtMaterialDesignExample_wrapper').find('label').each(function () {
$(this).parent().append($(this).children());
});
$('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
$('input').attr("placeholder", "Search");
$('input').removeClass('form-control-sm');
});
$('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
$('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
$('#dtMaterialDesignExample_wrapper select').removeClass(
'custom-select custom-select-sm form-control form-control-sm');
$('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
$('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
$('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});
 </script>
</head>
<body>
			   

<table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
  <thead>
    <tr>
      
      <th class="th-sm">Date </th>
      <th class="th-sm">Session 
      </th>
      <th class="th-sm">Speaker Name
      </th>
      <th class="th-sm">City
      </th>
      <th class="th-sm">Total number of attendees  
      </th>
      <th class="th-sm">Total sign ups
      </th>
       <th class="th-sm">Percentage
      </th>
      <th class="th-sm">Full payments
      </th>
      <th class="th-sm">Part payments
      </th>
    </tr>
  </thead>
<?php
 $conn = mysqli_connect("localhost","username","pass","worldsuc_stats"); 
session_start();
$userid=$_SESSION['contactid'];

if (!$conn){
    die("Database Connection Failed" . mysqli_error($connection));
}
  
 $d1 = $_POST['inputDate'];
 $d12 = $_POST['inputDate1'];
 $name=$_SESSION['name'];
 $query = "";
 $query .= "SELECT * FROM `speakers` WHERE ";
 $check = 0;
 $upcheck = 0;
 if($_POST['inputDate']=="") {
       $check =0;
       $upcheck =0;
  }else {
      $check =1;
      $upcheck =1;
      $query .= "speakerdate BETWEEN '$d1' AND '$d12'";
  }  
  
 if(isset($_POST['str'])){
     $c1 = implode("','",$_POST['str']);
    
     if($check == 1 ){
         $query .= " AND";
    }
     $check =1;
     $query .= " city IN('".$c1."') ";
 
 }else{
     $check =0;
     
 }
 
 if(isset($_POST['name'] )){
       $c12 = implode("','",$_POST['name']);
     if($check == 1 || $upcheck == 1)
     {
         $query .= " AND ";
     }
     $check =1;
     $query .= " fname IN('".$c12."') ";
 }else{
     $check = 0;
 }
 //$query .= "fname='$n' AND city ='$c' AND masterdate='$d'";
// echo $query;
  $result = mysqli_query($conn,$query);
?>	 
       
			     <?php
			     if(mysqli_num_rows($result)>0){
			     while($row = $result->fetch_assoc()) {
			   ?>

  <tbody>
    <tr>
      
      <td> <?php  echo date( "d-m-Y",strtotime( $row['speakerdate'] )); ?></td>
      <td><?php echo $row["check_sess"]; ?> </td>
      <td><?php echo $row["fname"]; ?></td>
      <td><?php echo $row["city"]; ?></td>
      <td><?php echo $row["numofpeopleallocated"]; ?></td>
      <td><?php echo $row["totsignups"]; ?></td>
       <td> <?php  $p =$row["totsignups"]/ $row["numofpeopleallocated"]*100; echo (round($p, 2)); ?>%</td>
      <td><?php echo $row["fullpayment"]; ?></td>
      <td><?php echo $row["partpayment"]; ?></td>
      
    </tr>
     
  </tbody>
  	
 
        			<?php 
                    }
			        }
                    else
                    {
                       ?>
                       		    
                    <tr id="selecteddate11">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                         
                        
                        
                        <td class="th-sm" > Not Found </td>
                      </tr>
          
                       <?php 
                     
                     }  
			
			    ?>
	   <tfoot>
    <tr>
      <th class="th-sm">  </th>
      <th class="th-sm">  
      </th>
      <th class="th-sm"> 
      </th>
      
      <th class="th-sm">Total 
      </th>
      <?php
       $d1 = $_POST['inputDate'];
 $d12 = $_POST['inputDate1'];
      $query2 = "";
       $query2 .= "SELECT SUM(numofpeopleallocated) as people,SUM(totsignups) as signup ,SUM(fullpayment) as fp,SUM(partpayment) as pp FROM speakers WHERE";
       $chk = 0;
 $upchk = 0;
 if($_POST['inputDate']=="") {
       $chk =0;
       $upchk =0;
  }else {
      $chk =1;
      $upchk =1;
      $query2 .= " speakerdate BETWEEN '$d1' AND '$d12'";
  }  
  
 if(isset($_POST['str'])){
     $c1 = implode("','",$_POST['str']);
    
     if($chk == 1 ){
         $query2 .= " AND";
    }
     $chk =1;
     $query2 .= " city IN('".$c1."') ";
 
 }else{
     $chk =0;
     
 }
 
 if(isset($_POST['name'] )){
       $c12 = implode("','",$_POST['name']);
     if($chk == 1 || $upchk == 1)
     {
         $query2 .= " AND ";
     }
     $chk =1;
     $query2 .= " fname IN('".$c12."') ";
 }else{
     $chk = 0;
 }
// echo $query2;
      $result2 = mysqli_query($conn,$query2);
        if(mysqli_num_rows($result)>0){
			     while($row2 = $result2->fetch_assoc()) {
      ?>
      <th class="th-sm" id="selecteddate11"> <?php echo $row2["people"]; ?>
      </th>
      <th class="th-sm"> <?php echo $row2["signup"]; ?>
      </th>
      <th class="th-sm"> 
      </th>
      <th class="th-sm"> <?php echo $row2["fp"]; ?>
      </th>
      <th class="th-sm">  <?php echo $row2["pp"]; ?>
      </th>
      
      <?php } } ?>
    </tr>
  </tfoot>	 
</table>
</body>
</html>
 
