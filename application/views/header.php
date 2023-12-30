<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet"a href="<?= base_url('/assect/style/mainStyle.css') ?>">
<style>
 
 .links{display:flex;justify-content: space-between;width:70%;align-items:flex-end}
 .links a{color:white}
 
 .nav ,.links{display:flex;justify-content:space-between}
</style>
     

</head>
<body>
<nav  class="nav  navbar ">
  <div class="logo">
  <?php echo '<img src="' . base_url('/assect/images/systemImg/logo.png') . '" height=150px>' ; ?>
  </div>
  <div class="links">
      <div class="grp">
      <a href="<?= base_url('index.php/home')?>">Home</a>
      <a href="<?= base_url('index.php/userprofile')?>">Profile</a>
      <a href="<?= base_url('index.php/UPLOAD')?>">Upload</a>
    </div>
    <div class="grp">
      <a href="<?= base_url('index.php/login/logout')?>">logout</a>
    </div>
  </div>
  </nav>
</body>
</html>