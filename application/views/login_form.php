<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
<meta charset="UTF-8">
<title>Login Form</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('login'); ?>


<h4>Username</h4>

<input type="text" name="username" value="" size="20"  />

<h4>Password</h4>
<input type="text" name="password" value="" size="50" />

<div><input type="submit" value="Login" /></div>

</form>

<br/>

<p><?php echo anchor('form', 'Have not sign up ? please sign up here..'); ?></p>

</body>
</html>
