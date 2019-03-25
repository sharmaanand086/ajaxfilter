<?php $conn = mysqli_connect("localhost","username","pass","dbname"); 
include 'connect.php';
if (!$conn){
    die("Database Connection Failed" . mysqli_error($connection));
}
session_start();
$userid=$_SESSION['contactid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/menu.css">
	<style>
	    .btn{
	margin: 2% 0!important;
    padding: 1%!important;
    width:90%!important;
    border-radius: 5px!important;
    border: 1px solid #1DA5F3!important;
    background: #1DA5F3!important;
    color: #fff!important;
    font-size: 18px!important;
    font-weight: bold!important;
    cursor: pointer!important;
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    -ms-transition: all 0.2s ease-in;
    -o-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in!important;
	    }
	</style>
	  <link rel="stylesheet" href="http://www.arfeenkhan.com/coachstat/admin/css/style.css">
</head>
<body>	
<div class="row">
    <div class="myhead">
		<div class="myimg"><img class="img" src="images/arfeenlogo.png"></div>
	<div class="header">Seminar Stat Management</div>
			<div class="user">
                <img class="profile-img" style="margin: 0px auto 0px !important;"src="https://www.lensvillage.com/files/member/avatar-s.png"
                alt="">
				<?php

$datas1=mysqli_query($connection, "SELECT * FROM `login` WHERE `v_id`=$userid ");

          while ($row = $datas1->fetch_row()) {
          	?>
        <h3 class="lead" align='center'>
					<?php echo $row[1]; ?>
				</h3>
                
        <?php 
        //$_SESSION['contactid'] = $row[4];

    }
    ?>
			</div>
		</div>
</div>
<div id="main_menu">
<div id="cssmenu" class="dropdown"><div id="menu-indicator" style="left: 39.5px;"></div><div id="menu-button">Menu</div>

	<ul class="navigation">
		<li class="active"><a href="home.php">Home</a></li>	
     	<li><a href="calls.php">Calls</a></li>
		<li><a href="eventstats.php">Event Stats</a></li>
			<?php	if($userid=='1234'){
	    ?>
 
		<li><a href="allaccess.php">all Maters</a></li>
		<li><a href="allaccess2.php">all speakers</a></li>
		<?php }?>
		<li><a href="logout.php">Logout</a></li>	
	</ul>

</div>
</div>
<section class="second">
	<div class="container second_box" style="border:none!important;">
	     
		  <div class="row">
			 <?php 
			     $tabl = $_GET['id'];
			     $name=$_SESSION['name'];
			     $query = "SELECT * FROM `$tabl`";
                  $result = mysqli_query($conn,$query);
                   ?>
			
			 <div id="checkalldata" style="display:block;">
			     <?php
			     while($row = $result->fetch_assoc()) {
			     ?>
			     <div>
			     <div class="col-md-12 main_speaker" style="margin-top: 25px;  padding: 0;  padding-left: 38px;  background-color: #1db8f3;  color: #fff">
				<label style="width:100%;">   <?php    echo date( "d-m-Y",strtotime( $row['masterdate'] )); ?>  | <?php echo $row["sess_check"]; ?>   </label>
			 </div>
		     	<div class="col-md-12 main_speaker" style="   padding: 0;line-height: 2;  padding-left: 38px;   background-color: #fff;border: 1px solid #1db8f3; color: ##000000ba;">
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
			    <?php
			     }
			    ?>
			    
			</div>
		  <div class="results" id="selecteddate11"></div>
		  <div class="results" id="selecteddate1"></div>
		  <div class="results" id="selecteddate2"></div>
		  <div class="results" id="selecteddate3"></div>
		</div>
	</div>
</section>

</body>
<script>
$("#sub").click(function(){
     var inputDate =document.getElementById("txtDate").value;
     var mycity =document.getElementById("mycity").value;
     var myname =document.getElementById("myname").value;
    // var  seltable =document.getElementById("seltable").value;
     
   //alert(seltable); 
//   if(inputDate==""){
//       alert("Select Date You Want!");
//   }
//   if(mycity==""){
//       alert("Select City You Want!");
//   }
//   if(myname==""){
//       alert("Select Name You Want!");
//   }
    $.ajax({
      type: 'POST',
      url: 'alldata.php',
      data: ({inputDate:inputDate,mycity:mycity,myname:myname}),
      success: function(data){
         //alert(data);
         $('#selecteddate11').html(data);
       
      }
    })
    
});
    $("#checkproduct2").click(function(){
  if($(this).prop("checked") == true){
    //  alert('dsfa');
      window.location.href="http://www.arfeenkhan.com/coachstat/allaccess.php?id=master1";
              $('#checkalldata').show();
                $('#selecteddate').hide();
            }
            else if($(this).prop("checked") == false){
                $('#checkalldata').hide();
            }
    });
</script>
</html>