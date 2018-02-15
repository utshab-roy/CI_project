<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
<meta charset="UTF-8">
<title>Registration Form</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<h1>Registration Form</h1>
<h4>Username</h4>

<input type="text" name="username" value="" size="20"  />

<h4>Firstname</h4>
<input type="text" name="firstname" value="" size="50" />

<h4>Lastname</h4>
<input type="text" name="lastname" value="" size="50" />

<h4>Password</h4>
<input type="text" name="password" value="" size="50" />

<h4>Password Confirm</h4>
<input type="text" name="passconf" value="" size="50" />

<h4>Email Address</h4>
<input type="text" name="email" value="" size="50" />

<div><input type="submit" value="Sign Up" /></div>

</form>

<br/>

<p><?php echo anchor('login', 'Already registared ? please login...'); ?></p>

</body>
</html>
