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
  <?php if($this->session->flashdata("error") || ($this->session->flashdata("success"))){ ?>
  <div class="alert <?php echo $this->session->flashdata("error") ? 'alert-danger' : 'alert-success'; ?> " id="flash_message">
    <?php 
      if($this->session->flashdata("error")){ echo $this->session->flashdata("error"); }
      if($this->session->flashdata("success")){ echo $this->session->flashdata("success"); } ?>
  </div>
    <?php } ?>   
  
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Manage <b>Students</b></h2>
        </div>
        <div class="col-sm-6">
          <a href="crud_add" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>
          <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>S No</th>
          <th>Name</th>
          <th>Email</th>
          <th>City</th>
          <!-- <th>Phone</th> -->
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $i = 1;
        if(isset($value)){           
            foreach($value as $row){          
          ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row->user_name; ?></td>
          <td><?php echo $row->user_email; ?></td>
          <?php if($row->user_image){ ?>
          <td><img src="<?php echo  base_url() . $row->user_image; ?>" alt="image" width="100" height="100"></td>
          <?php }else{ ?>
            <td><p>No image</p></td>
            <?php } ?>
          <td><?php echo $row->user_city; ?></td>
          <td>
            <a href="student_edit/<?php echo $row->id; ?>" class="edit" ><i class="material-icons">&#xE254;</i></a>
            <a href="#" class="delete" id="<?php echo $row->id; ?>"><i class="material-icons" title="Delete">&#xE872;</i></a>
          </td>
        </tr>
        <?php
          $i++;     
            }} 
            if(!$value) { ?>
            <tr>
              <td colspan="5"> <?php echo "No data found"; ?></td>
            </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<!-- Edit Modal HTML -->
<!-- <div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Add Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
        </div>
      </form>
    </div>
  </div>
</div> -->
<!-- Edit Modal HTML -->
<!-- <div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-info" value="Save">
        </div>
      </form>
    </div>
  </div>
</div> -->
<!-- Delete Modal HTML -->
<!-- <div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div> -->

<script>
  $(document).ready(function(){
    $('.delete').click(function(){
      event.preventDefault();
      var id = $(this).attr('id');
      if(confirm('Are you sure you want to delete this row?'))
      {
        window.location = "<?php echo base_url() ?>crud_controller/delete/" + id;
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function(){
    var success_message = document.getElementById("flash_message");
    if(success_message)
    {
      setTimeout(function(){
        success_message.style.display = "none";
      }, 5000);
    }
  });
</script>
</body>
</html>