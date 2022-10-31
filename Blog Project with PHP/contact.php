<?php include 'inc/header.php';?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                	$firstname = $format->validation($_POST['firstname']);
                	$lastname = $format->validation($_POST['lastname']);
                	$email = $format->validation($_POST['email']);
                	$message = $format->validation($_POST['message']);
                	
                    $firstname = mysqli_real_escape_string($db->link, $firstname);
                    $lastname = mysqli_real_escape_string($db->link, $lastname);
                    $email = mysqli_real_escape_string($db->link, $email);
                    $message = mysqli_real_escape_string($db->link, $message);

                    if($lastname==''||$firstname==''||$email==''||$message==''){
                        echo "<span class='error'>Field must not be empty</span>";
                    }
                    else{
                        $sql = "INSERT INTO tbl_contact(firstname,lastname,email,message) values 
                            ('$firstname','$lastname','$email','$message')";
                        $result = $db->insert($sql);
                        if($result){
                            echo "<span class='success'>Message Sent</span>";
                        }
                        else{
                            echo "<span class='error'>Error occurs! Try again!!</span>";
                        }
                    }
                }
                ?>
				<form action="" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Your First Name:</td>
							<td>
							<input type="text" name="firstname" placeholder="Enter first name" required="1"/>
							</td>
						</tr>
						<tr>
							<td>Your Last Name:</td>
							<td>
							<input type="text" name="lastname" placeholder="Enter Last name" required="1"/>
							</td>
						</tr>
						
						<tr>
							<td>Your Email Address:</td>
							<td>
							<input type="email" name="email" placeholder="Enter Email Address" required="1"/>
							</td>
						</tr>
						<tr>
							<td>Your Message:</td>
							<td>
							<textarea name="message"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
							<input type="submit" name="submit" value="Send"/>
							</td>
						</tr>
					</table>
				<form>				
 			</div>
		</div>
		<?php include "inc/sidebar.php";?>
	<?php include "inc/footer.php";?>