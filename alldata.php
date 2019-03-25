<?php
 $conn = mysqli_connect("localhost","username","pass","dbname"); 
session_start();
$userid=$_SESSION['contactid'];

if (!$conn){
    die("Database Connection Failed" . mysqli_error($connection));
}
 $d = $_POST['inputDate'];
 $n = $_POST['myname'];
 $c = $_POST['mycity'];
// $t = $_POST['seltable'];
 $name=$_SESSION['name'];
 $query = "";
 $query .= "SELECT * FROM `master1` WHERE ";
 $check = 0;
 $upcheck = 0;
 if($_POST['inputDate'] == "") {
       $check =0;
       $upcheck =0;
  }else{
      $check =1;
      $upcheck =1;
     $query .= " masterdate='$d'";
  }
 
 
 if($_POST['mycity'] != "select"){
     if($check == 1){
         $query .= " AND ";
     }
     $check =1;
     $query .= " city='$c'";
 }else{
     $check =0;
 }
 
 if($_POST['myname'] != "select"){
     if($check == 1 || $upcheck == 1)
     {
         $query .= " AND ";
     }
     $query .= " fname='$n'";
 }else{
     $check = 0;
 }
 
 
 
 //$query .= "fname='$n' AND city ='$c' AND masterdate='$d'";
//echo $query;
  $result = mysqli_query($conn,$query);
?>	 
       
			     <?php
			     if(mysqli_num_rows($result)>0){
			     while($row = $result->fetch_assoc()) {
			   ?>
			 <div id="selecteddate11" >
               <div>
			     <div class="col-md-12 main_speaker" style=" margin-top: 25px;  padding: 0;  padding-left: 38px;  background-color: #1db8f3;  color: #fff">
				<label style="width:100%;">   <?php  echo date( "d-m-Y",strtotime( $row['masterdate'] )); ?> | <?php echo $row["sess_check"]; ?>   </label>
			 </div>
		     	<div class="col-md-12 main_speaker" style="padding: 0; padding-left: 38px; background-color: #fff;border: 1px solid #1db8f3; color: #000000ba;">
				<label style="width:100%;">Name : <?php echo $row["fname"]; ?></label>
			    <label style="width:100%;">City : <?php echo $row["city"]; ?></label>
				<label style="width:100%;">Total number of attendees : <?php echo $row["numofattendees"]; ?></label>
				<label style="width:100%;">No. of Speakers:  <?php echo $row["numofspeakers"]; ?> </label>
				<label style="width:100%;">Attendees participated in Breakout session:	 <?php echo $row["attpinbreakout"]; ?>   </label>
				<label style="width:100%;">Attendees participated in Strategy session: <?php echo $row["attpinstrategy"]; ?>  </label>
				<label style="width:100%;">Total sign ups: <?php echo $row["totsignups"]; ?>  </label>
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
		  