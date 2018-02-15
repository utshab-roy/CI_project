<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
<meta charset="UTF-8">
<title>Homepage</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('login'); ?>
<h1>Welcome to Roopokar online stroage</h1>
<br/>
<h3>your personal imformation:</h3>
<br/>


<table border = "1">

  <tr>
    <th colspan = "2">Personal information table</th>
  </tr>

  <tr>
    <td>Username</td>
    <?php echo "<td>".$userArray[0]['username']."</td>";?>
  </tr>

  <tr>
    <td>Firstname</td>
    <?php echo "<td>".$userArray[0]['first_name']."</td>";?>
  </tr>   

  <tr>
    <td>Lastname</td>
    <?php echo "<td>".$userArray[0]['last_name']."</td>";?>
  </tr>  

  <tr>
    <td>Email</td>
    <?php echo "<td>".$userArray[0]['email']."</td>";?>
  </tr>    
   
     
</table>
      
<br/>
<br/>
<input type="submit" value="Logout !" />
</form>

<button onclick="location.href='<?php echo base_url('upload');?>'">Upload Pic</button>

</body>
</html>
