<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css")?>">
</head>
<body>

<!-- <img src="<?php echo base_url("uploads/profile/1.png") ?>" alt="profile pic">
<img src="/assets/uploads/profile/1.png" alt="Flowers in Chania" width="460" height="345"> -->

<form action="<?php echo base_url("login/login"); ?>" method="post">

  <div class="container">
    <label for="phone"><b>Phone</b></label>
    <input type="text" placeholder="Enter Phone" name="phone" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>