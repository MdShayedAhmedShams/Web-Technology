<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<style>
		#filename {
			position: relative;
			top: 20px;
			left: 300px;
			font-weight: bolder;
			
		}
	</style>
</head>
<body>

	<?php 
		$firstname = "";
		$firstnameErrMsg = "";

		$lastname = "";
		$lastnameErrMsg = "";

		$gender = "";
		$genderErrMsg = "";

		$email = "";
		$emailErrMsg = "";

		$mobileno = "";
		$mobilenoErrMsg = "";

		$address1 = "";
		$address1ErrMsg = "";

		$country = "";
		$countryErrMsg = "";




		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test_input($_POST['firstname']);
			$lastname = test_input($_POST['lastname']);
			$gender = isset($_POST['gender']) ? test_input($_POST['gender']) : "";
			$email = test_input($_POST['email']);
			$mobileno = test_input($_POST['mobileno']);
			$address1 = test_input($_POST['address1']);
			$country = isset($_POST['country']) ? test_input($_POST['country']) : "";

			$message = "";
			if (empty($firstname)) {
				$firstnameErrMsg = "First Name is Empty";
			}
			else {
				if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
				$firstnameErrMsg = "Only letters and spaces allowed.";
				}
			}


			if (empty($lastname)) {
				$lastnameErrMsg = "Last Name is Empty";				
			}
			else {
				if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
				$lastnameErrMsg = "Only letters and spaces allowed.";
				}
			}


			if (empty($gender)) {
				$genderErrMsg = "Gender is not selected";
			}


			if (empty($email)) {
				$emailErrMsg = "Email is empty";
			}
			else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErrMsg = "Email is incorrect";
				}
			}


			if (empty($mobileno)) {
				$mobilenoErrMsg = "Mobile Number is empty";
			}
			else
				if(!preg_match('/^\d+$/',$mobileno)){
				$mobilenoErrMsg = "Mobile Number only contain numbers";
			}

			if (empty($address1)) {
				$address1ErrMsg = "Street/House/Road is empty";
			}
						
			if (!isset($country) or empty($country)) {
				$countryErrMsg = "Country Name is empty";
			}
			
		}
	?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>General</legend>

			<label for="fname">First Name</label>
			<input type="text" name="firstname" id="fname" value="<?php echo $firstname; ?>">

			<span><?php echo $firstnameErrMsg; ?></span>

			<br><br>

			<label for="lname">Last Name</label>
			<input type="text" name="lastname" id="lname" value="<?php echo $lastname; ?>">
			
			<span><?php echo $lastnameErrMsg; ?></span>

			<br><br>

			<label>Gender</label>
			<input type="radio" name="gender" id="male" value="Male"<?php echo ($gender=='Male')?'checked':'' ?>>
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="Female" <?php echo ($gender=='Female')?'checked':'' ?>>
			<label for="female">Female</label>
			<span><?php echo $genderErrMsg ?></span>
			
			<br><br>

			<p id="filename">Group_XX_StudentId</p>

		</fieldset>

		<fieldset>
			<legend>Contact</legend>

			<label for="email">Email</label>
			<input type="email" name="email" id="email" value="<?php echo $email; ?>">
			<span><?php echo $emailErrMsg ?></span>

			<br><br>

			<label for="mobileno">Mobile No</label>
			<input type="text" name="mobileno" id="mobileno" value="<?php echo $mobileno; ?>">
			<span><?php echo $mobilenoErrMsg ?></span>

			<br><br>

		</fieldset>

		<fieldset>
			<legend>Address</legend>

			<label for="address1">Street/House/Road</label>
			<input type="text" name="address1" id="address1" value="<?php echo $address1; ?>">
			<span><?php echo $address1ErrMsg ?></span>

			<br><br>

			<label for="country">Country</label>
			<select name="country" id="country">
				<option value="bd" <?=$country == 'bd' ? ' selected="selected"' : '';?> >Bangladesh</option>
				<option value="usa" <?=$country == 'usa' ? ' selected="selected"' : '';?> >United States of America</option>
			</select>

			<br><br>

		</fieldset>

		<input type="submit" name="submit" value="Register">
	</form>

</body>
</html>