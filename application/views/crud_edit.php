<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CodeIgniter CRUD</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" >
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("boot/css/style.css"); ?>" >
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url("boot/js/custom.js"); ?>"></script>    
  
</head>
<body>
<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Edit <b>Students</b></h2>
        </div>
       </div>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
  <?php if(isset($edit)) {?>
      <form method="POST" action="<?php echo base_url(); ?>add_student" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Edit Student</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="username" value="<?php echo $edit->user_name; ?>" class="form-control">
            <span class="text-danger"><?php echo form_error("username"); ?></span>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="usermail" value="<?php echo $edit->user_email; ?>" class="form-control">
            <span class="text-danger"><?php echo form_error("usermail"); ?></span>
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" name="usercity" value="<?php echo $edit->user_city; ?>" class="form-control">
            <span class="text-danger"><?php echo form_error("usercity"); ?></span>
          </div>
          <div class="form-group">
            <label>User image</label>
            <input type="file" name="userimage" class="form-control">
            <input type="hidden" name="current_image" value="<?php if(isset($edit)) echo $edit->user_image; ?>" class="form-control">
          </div>
          <?php if(isset($edit->user_image)) { ?>
          <div class="form-group">
            <img src="<?php echo base_url() . $edit->user_image; ?>" alt="image" width="15%" height="15%">
          </div>
          <?php } ?>
          <input type="hidden" name="userid"  value="<?php echo $edit->id; ?>" class="form-control">
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url(); ?>"><input type="button" class="btn btn-default" value="Cancel"></a>
          <input type="submit" class="btn btn-success"  name="update" value="Update">
        </div>
      </form>
      <?php } ?>

</body>
</html>