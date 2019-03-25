<?php
include 'connect.php';
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

	  <link rel="stylesheet" href="http://www.arfeenkhan.com/coachstat/admin/css/style.css">
</head>
<body>
    <form action="action_update.php" method="post">
<section class="first">
	<div class="container">
		<div class="row">
			<h1 style="margin: 3% 0;">SPEAKER'S UPDATE</h1>
		</div>
	</div>
</section>
<section class="second">
	<div class="container second_box">
		<div class="row">
		    	<?php
		       	    $id = $_GET['edit'];
		       	   // echo $id;
					$query = "SELECT * FROM `speakers` WHERE id='$id'";
                    $result = mysqli_query($connection,$query);
                      $row = mysqli_fetch_assoc($result);
                     // var_dump($row);
                	?>
			<div class="col-md-4">
			 
				  Date: <input type="date" name="speakerdate"  value="<?php echo $row['speakerdate']; ?>">
				  <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
			 
			</div>
			<div class="col-md-4 xy">
				<label class="cust-check">
                <input class="styled-checkbox" id="checkproduct2" type="radio" name="check" <?php $checkbox_array = explode(",", $row['check_sess']); ?> value="Morning section" <?php if(in_array("Morning section", $checkbox_array)){ echo " checked=\"checked\""; } ?>>
                    <span class="checkmark"></span>
                </label>
				<p>Morning section</p>
			</div>
			<div class="col-md-4 xy">
				<label class="cust-check">
                <input class="styled-checkbox" id="checkproduct2" type="radio" name="check"   <?php $checkbox_array = explode(",", $row['check_sess']); ?>  value="Evening section" <?php if(in_array("Evening section", $checkbox_array)){ echo " checked=\"checked\""; } ?>>
                    <span class="checkmark"></span>
                </label>
				<p>Evening section</p>
			</div>
			</div>
			<div class="row">
			<div class="col-md-5 main_speaker" style="display:inline-flex;">
				<label style="width:100%;">Main Speaker:
			 
			 
				<select id="fname" name="fname" required>
				   	<?php 	$query2 = "SELECT * FROM `login`";
				//echo $row['fname'];
                    $result2 = mysqli_query($connection,$query2);
                while($rw=mysqli_fetch_array($result2))
                { ?>
                         <option value="<?php echo $rw['username']; ?>"<?php if($row['fname']==$rw['username']) echo 'selected="selected"'; ?>><?php echo $rw['username']; ?></option>
              <?php } ?>         
				</select>
	 

			    </label>
			</div>
			
			<div class="col-md-4 main_speaker" style="display:inline-flex;    padding-left: 82px;">
				<label style="width:100%;">City:
				 
			 
				<select id="city" name="city" required>
				   	<?php 	$query3 = "SELECT * FROM `city`";
				//echo $row['fname'];
                    $result3 = mysqli_query($connection,$query3);
                while($rw3=mysqli_fetch_array($result3))
                { ?>
                         <option value="<?php echo $rw3['name']; ?>"<?php if($row['city']==$rw3['name']) echo 'selected="selected"'; ?>><?php echo $rw3['name']; ?></option>
              <?php } ?>   
                      
				</select>
				           
              
			    </label>
			</div>
			
			<div class="col-md-3 main_speaker" style="text-align:right;">
			    <!--	<!?php-->
			    <!--	$q ="SELECT COUNT(eventnum) As tot FROM `speakers`";-->
			    <!--      $result3=mysqli_query($connection,$q);-->
			          <!--$r=mysqli_fetch_assoc($result3);-->
                    <!--var_dump($data['tot']);-->
       <!--            while($r=mysqli_fetch_assoc($result3)){-->
       <!--         	?>-->
                	 
			    <!--<p><b>Event No.:</b><span>-->
			        
       <!--                <input  value= "<!?php echo $r['tot']; ?>"  name="eventno" style="width:30%" readonly> -->
                        
                        
       <!--                 <!?php }?>-->
			    <!--    </span></p>-->
			
			</div>
		</div>
		<div class="row">
		    <div class="col-md-12" style="margin-top:1%;">
		        <label style="width:100%;">Co-Speaker:
			 
				<select id="f1name" name="f1name" required>
				    	<?php 	$query2 = "SELECT * FROM `login`";
				//echo $row['fname'];
                    $result2 = mysqli_query($connection,$query2);
                while($rw=mysqli_fetch_array($result2))
                { ?>
                         <option value="<?php echo $rw['username']; ?>"<?php if($row['f1name']==$rw['username']) echo 'selected="selected"'; ?>><?php echo $rw['username']; ?></option>
              <?php } ?> 
                     
				</select>
			    </label>
		    </div>    
		</div>
		</div>
	</div>
</section>
<section class="three">
	<div class="container">
		<div class="row table1">
			<table>
				<tr class="section_three">
					<td class="total"><b>Number of peoples attended:</b></td>
					<td><input type="text" class="cost" value="<?php echo $row['numofpeopleallocated']; ?>" name="numofpeopleallocated"/></td>
				</tr>
				<!-- <tr class="section_three">
					<td class="total"><b>No. of Speakers:</b></td>
					<td><textarea class="cost"></textarea></td>
				</tr> -->
				<tr class="section_three">
					<td class="total"><b>Number of peoples during offer:</b></td>
					<td><input type="text" class="cost"  value="<?php echo $row['numofpdoffer']; ?>"  name="numofpdoffer"></td>
				</tr>
				<tr class="section_three">
					<td class="total"><b>Total sign ups:</b></td>
					<td><input type="text" class="cost"  value="<?php echo $row['totsignups']; ?>"   name="totsignups"></td>
				</tr>
			</table>
		</div>
	</div>
</section>
<section class="three">
	<div class="container">
		<div class="row table2">
		<table>
		<!--	<tr >-->
		<!--	<td class="item-row"><b>Percentage</b></td>-->
		<!--	<td class="item-row"><textarea class="cost" required  name="percentage"></textarea></td>-->
		<!--</tr>-->

		<tr style="margin-top:2%;">
			<td><b>Full payments:</b></td>
			<td><input type="text" class="price" value="<?php echo $row['fullpayment']; ?>"   name="fullpayment"  ></td>
			</tr>
			<tr>
			<td><b>Part payments:</b></td>
			<td><input type="text" class="price" value="<?php echo $row['partpayment']; ?>"    name="partpayment"  ></td>
			</tr>
		</table>
	 
      <div class="container" style="text-align: center;">
        <input type="submit" value="Update">
        
        </div>
			<p class="footer"><b>ARFEEN KHAN</b></p>

		</div>
	</div>

</section>
</form>
</body>
  <script>
    
    $( window ).on( "load", function() {
        console.log( "window loaded" );
         
    });
    </script>
</html>