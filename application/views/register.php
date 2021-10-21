<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/register.css"); ?>">
    <title>Document</title>
</head>
<body>
<?php echo form_open_multipart('register');?>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter first name" name="fname" id="fname" required>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter last name" name="lname" id="lname" required>

    <label for="phone"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter phone number" name="phone" id="phone" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>
    <label for="upload"><b>Upload Profile Picture   </b></label>
    <input type="file" name="userfile" size="20" required />

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" value="upload" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
<?php echo validation_errors(); ?>

</body>
</html>