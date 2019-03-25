<?php $conn = mysqli_connect("localhost","worldsuc_assign","asdf1234","worldsuc_stats"); 
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
	    .btn {
    margin: 0% 0!important;
    padding: 3%!important;
    width: 90%!important;
    border-radius: 5px!important;
    border: 1px solid #1DA5F3!important;
    background: #1DA5F3!important;
    color: #fff!important;
    font-size: 19px!important;
    font-weight: bold!important;
    cursor: pointer!important;
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    -ms-transition: all 0.2s ease-in;
    -o-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in!important;
}
	    
	   .name_select{
    border: 1px solid #1db8f3!important;
    background: transparent;
    width: 100%;
    font-size: 15px;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 14%;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 200px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
.button-group{
  width:100%;
  margin-top:2%;
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
		<!--<li class="active"><a href="home.php">Home</a></li>	-->
  <!--   	<li><a href="calls.php">Calls</a></li>-->
		<!--<li><a href="eventstats.php">Event Stats</a></li>-->
		<?php	if($userid=='1234'){
	    ?>
 
		<!--<li><a href="allaccess.php">all Masters</a></li>-->
		<li><a href="allaccess2.php">all speakers</a></li>
		<?php }?>
		<li><a href="logout.php">Logout</a></li>	
	</ul>

</div>
</div>
<section class="second">
	<div class="container second_box" style="border:none!important;">
	     
		  <div class="row">
			<div class="col-sm-3" style="display: inline-flex!important;" >
				 <p style="font-size: 15px;     padding-top: 6%;"> From:</p><div style="margin-top:2%;">
 				  <input type="date" name="masterdate" id="txtDate"  value="" style="width: 100%;border: 1px solid #1db8f3!important;border-radius: 5px!important;    padding: 5px 2px;">
				 </div>
			</div>
		<div class="col-sm-3" style="display: inline-flex!important;" >
				 <p style="font-size: 15px;    padding-top: 6%;"> To:</p><div style="margin-top:2%;">
 				  <input type="date" name="mastertodate" id="txtDate1"  value="" style="width: 100%;border: 1px solid #1db8f3!important;border-radius: 5px!important;    padding: 5px 2px;">
				 </div>
			</div>
			<div class="col-sm-3 " style="">
			    	 <div class="button-group">
                        <button type="button" class="name_select  btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><p id="cc">city <span class="caret"></span></p></button>
        			    	<?php
        					$query = "SELECT * FROM `city`";
                            $result = mysqli_query($connection,$query);
                        	?>
                             <ul class="dropdown-menu" id="mycity">
                                  <li>
                                            <a href="#" class="small"  >
                                            <input type="checkbox" onclick="for(c in document.getElementsByName('location[]')) document.getElementsByName('location[]').item(c).checked = this.checked" value="selectall">&nbsp;SELECT ALL 
                                            </a>
                                        </li>
                               <?php
                                while ($row = mysqli_fetch_array($result)) { ?>
                                        <li>
                                            <a href="#" class="small"  >
                                            <input type="checkbox" name="location[]" value="<?php echo  $row['name'] ?>">&nbsp;<?php echo  $row['name'] ?> 
                                            </a>
                                        </li>
                                <?php  }  ?>  
			               	</ul>
                    </div>
			 </div>
                <div class="col-sm-3" style="">
                   <div class="button-group">
                        <button type="button" class="name_select  btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><p id="nn">Name <span class="caret"></span></p></button>
                        <?php
                        $query = "SELECT * FROM `login`";
                        $result = mysqli_query($connection,$query);
                        ?>
                        <ul class="dropdown-menu">
                            <li>
                                            <a href="#" class="small"  >
                                            <input type="checkbox" name="speakername[]" onclick="for(s in document.getElementsByName('speakername[]')) document.getElementsByName('speakername[]').item(s).checked = this.checked" value="selectall">&nbsp;SELECT ALL 
                                            </a>
                                        </li>
                                 <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?> 
                              <li>
                              <a href="#" class="small" data-value="option1" tabindex="-1">
                              <input type="checkbox" name="speakername[]" value="<?php echo  $row['username'] ?>" >&nbsp; <?php echo  $row['username'] ?>
                              </a>
                              </li>
                             <?php    }   ?>  
                        </ul>
                     </div>
                </div>
			    <div class="col-sm-3 ">
			        <div style="margin-top:2%;">
			    <input type="submit" class="btn"  id="sub" value="submit">
			    </div>
			    </div>
			    	<div class="col-md-12 " style="display:inline-block; margin-top:2%;">
			    	<p style="float:left;">Show All : </p>
				<label class="cust-check" style="float:left;"> 
                <input class="styled-checkbox" id="checkproduct2" type="checkbox" name="allrec" >
                    <span class="checkmark"></span>
                </label>
			
			</div>
		
			 <?php 
			     
			     $name=$_SESSION['name'];
			     $query = "SELECT * FROM `speakers`";
                  $result = mysqli_query($conn,$query);
                 // $row = mysqli_fetch_assoc($result) ;
                  
                   ?>
			
			 <div id="checkalldata" style="display:none;">
			     <?php
			     while($row = $result->fetch_assoc()) {
			     ?>
			     <div>
			     <div class="col-md-12 main_speaker" style="margin-top: 25px;  padding: 0;  padding-left: 38px;  background-color: #1db8f3;  color: #fff">
				<label style="width:100%;">   <?php    echo   $row["speakerdate"]; ?>  | <?php echo $row["check_sess"]; ?>   </label>
			 </div>
		     	<div class="col-md-12 main_speaker" style="   padding: 0;line-height: 2;  padding-left: 38px;   background-color: #fff;border: 1px solid #1db8f3; color: ##000000ba;">
					<label style="width:100%;">Speaker Name : <?php echo $row["fname"]; ?></label>
			    <label style="width:100%;">City : <?php echo $row["city"]; ?></label>
				<label style="width:100%;">Total number of attendees : <?php echo $row["numofpeopleallocated"]; ?></label>
				<label style="width:100%;">Total sign ups::	 <?php echo $row["totsignups"]; ?>   </label>
				<label style="width:100%;">Percentage	 <?php echo $row["percentage"]; ?>  </label>
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
  
    
    
var options = [];

$( '.dropdown-menu a' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();
      
   console.log( options );
   return false;
});

</script>
<script>
$("#sub").click(function(){
     var inputDate =document.getElementById("txtDate").value;
     //alert(inputDate);
//   //  var mycity =document.getElementsByName("mycity").value;
    var all_location = document.querySelectorAll('input[name="location[]"]:checked');
    var aIds = [];
    for(var x = 0, l = all_location.length; x < l;  x++)
    {
        aIds.push(all_location[x].value);
    }
    var str = aIds;
    $('#cc').text(str[0]);
   // var ar = aIds.split(",");
     console.log(str);
   // alert(str);
     
      var all_name = document.querySelectorAll('input[name="speakername[]"]:checked');
    var nameid = [];
    for(var x = 0, l = all_name.length; x < l;  x++)
    {
        nameid.push(all_name[x].value);
    }
    var name = nameid;
     $('#nn').text(name[0]);
   // console.log(name);
    // var myname =document.getElementById("myname").value;
   // alert(name);
    
    $.ajax({
      type: 'POST',
      url: 'alldata2.php',
      data: ({inputDate:inputDate,str:str,name:name}),
      success: function(data){
         //alert(data);
         $('#selecteddate11').html(data);
       
      }
    })
    
});
    $("#checkproduct2").click(function(){
  if($(this).prop("checked") == true){
      window.location.href="http://www.arfeenkhan.com/coachstat/showall2.php?id=speakers"
              $('#checkalldata').show();
                $('#selecteddate').hide();
            }
            else if($(this).prop("checked") == false){
                $('#checkalldata').hide();
            }
    });
 
</script>
</html>
