<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Photos View</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styleForPhotosView.css">


</head>

<body>

<div class="header">
  <h1>List of all uploaded Images with watermark</h1>

</div>


<div class="row"> 
  <div class="column">

<?php foreach ($images as $imagename):?>
 
  
  <img src="<?= base_url()."uploads/".$imagename['name']?>" style="width:100%">

<?php endforeach;?>

  </div>
</div>
  <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
</body>
</html>


