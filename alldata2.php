<?php
 $conn =mysqli_connect("localhost","username","pass","dbname"); 
 
session_start();
$userid=$_SESSION['contactid'];

if (!$conn){
    die("Database Connection Failed" . mysqli_error($connection));
}
 //$d = $_POST['inputDate'];
 //$d1 =$_POST['inputDate1'];
// $n = $_POST['name'];
// $c = $_POST['str'];

// $t= $_POST['seltable'];
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
     //var ar = str.split();
     //var_dump($c1);
     if($check == 1 ){
         $query .= " AND";
    }
     $check =1;
     $query .= " city IN('".$c1."') ";
 
 }else{
     $check =0;
     
 }

//  $c1 = explode(",",$c);
//  $count =count($c1);
//  $i = 1;
// foreach($c1 as $key) {
//      if($check == 1){
//          $query .= " OR ";
//      }
//      $check =1;
//      $query .= " city='$key'";
//   // echo $i.' '.$key .'</br>';
// $i++;
// }
  
 
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
 
//  $n1 = explode(",",$n);
//  $countn =count($n1);
//  $j = 1;
// foreach($n1 as $keys) {
//      if($check == 1 || $upcheck == 1){
//          $query .= " OR ";
//      }
//      $check =1;
//      $query .= " fname='$keys'";
//   // echo $i.' '.$key .'</br>';
// $j++;
// }
 
 //$query .= "fname='$n' AND city ='$c' AND masterdate='$d'";
// echo $query;
  $result = mysqli_query($conn,$query);
?>	 
       
			     <?php
			     if(mysqli_num_rows($result)>0){
			     while($row = $result->fetch_assoc()) {
			   ?>
			 <div id="selecteddate11" >
               <div>
			     <div class="col-md-12 main_speaker" style=" margin-top: 25px;  padding: 0;  padding-left: 38px;  background-color: #1db8f3;  color: #fff">
				<label style="width:100%;">   <?php  echo date( "d-m-Y",strtotime( $row['speakerdate'] )); ?> | <?php echo $row["check_sess"]; ?>   </label>
			 </div>
		     	<div class="col-md-12 main_speaker" style="padding: 0; padding-left: 38px; background-color: #fff;border: 1px solid #1db8f3; color: #000000ba;">
				<label style="width:100%;">Speaker Name : <?php echo $row["fname"]; ?></label>
			    <label style="width:100%;">City : <?php echo $row["city"]; ?></label>
				<label style="width:100%;">Total number of attendees : <?php echo $row["numofpeopleallocated"]; ?></label>
				<label style="width:100%;">Total sign ups::	 <?php echo $row["totsignups"]; ?>   </label>
				<!--<label style="width:100%;">Percentage	 <?php echo $row["percentage"]; ?>  </label>-->
				<label style="width:100%;">Full payments:  <?php echo $row["fullpayment"]; ?> </label>
				<label style="width:100%;">Part payments: <?php echo $row["partpayment"]; ?></label>
			    </div>
			    </div>
			</div>
        			<?php 
                    }
			        }
                    else
                    {
                       ?>
                       <div id="selecteddate11" >
                           <p>Not Found</p>
                           </div>
                       <?php 
                     
                     }  
			
			    ?>
		  
