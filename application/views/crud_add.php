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
          <h2>Add <b>Students</b></h2>
        </div>
       </div>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
      <form method="POST" action="<?php echo base_url('add_student'); ?>" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Add Student</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="username" class="form-control">
            <span class="text-danger"><?php echo form_error("username"); ?></span>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="usermail" class="form-control">
            <span class="text-danger"><?php echo form_error("usermail"); ?></span>
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" name="usercity" class="form-control">
            <span class="text-danger"><?php echo form_error("usercity"); ?></span>
          </div>
          <div class="form-group">
            <label>User Image</label>
            <input type="file" name="userimage" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url(); ?>"><input type="button" class="btn btn-default" value="Cancel"></a>
          <input type="submit" class="btn btn-success" name="add" value="Add">
        </div>
      </form>

</body>
</html>