<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change-Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #error{font-size:8px;color:red}
    </style>
</head>
<body>
    <div class="container">
    <h1>Change Password</h1>
     
     <?php echo form_open('setting/validateChangePassword')?>
        
        <div class="form-group">
            <input type="text"placeholder="Enter old Password"class="form-control" name="oldPassword">
            <div id="error"><?php echo form_error('oldPassword');?></div><br>
        </div>

        <div class="form-group">
            <input type="password"class="form-control" placeholder="Enter new Password" name="newPassword">
            <div id="error"><?php echo form_error('newPassword');?></div><br>
        </div>

        <div class="form-group">
            <input type="password"class="form-control" placeholder="Confirm Password" name="confirmPassword">
            <div id="error"><?php echo form_error('conformPassword');?></div><br>
            <div id="error"><?php echo form_error('confirmPassword');?></div><br>
        </div>
        <button type="submit"name="update"  class="btn btn-primary">Update</button>
        <div id="error"><?php echo form_error('newAndConfirm');?></div><br>
     
        <?php echo form_close()?> 
    </div>

</body>
</html>