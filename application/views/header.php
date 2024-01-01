<?php //session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet"a href="<?= base_url('/assect/style/mainStyle.css') ?>">
<style>
 
 .links{display:flex;justify-content: space-between;width:80%;align-items:flex-end;}
 
 .links a{color:white}
 .links  img{width:30px;height:30px;filter: invert(1);}
 .links .grp1 img{}
 
 .nav ,.links{display:flex;justify-content:space-between}

 /*drop_down*/
 .dropdownParent{position:relative}
 .dropdownParent:hover .dropdown{display:block}
.dropdown{background-color:white;position:absolute;top:30px;right:-20px;border:1px solid gold;border-radius:8px;display:none}
.dropdown a{color:black;padding:0px 0px}
.dropdown div{padding:2px 20px}
.dropdown div:hover{background-color:aliceblue;}
</style>
     

</head>
<body>
<nav  class="nav  navbar ">
  <div class="logo">
  <?php echo '<img src="' . base_url('/assect/images/systemImg/logo.png') . '" height=150px>' ; ?>
  </div>
  <div class="links">
      <div class="grp1">
       
        <a href="<?= base_url('index.php/home')?>"><?php echo '<img src="' . base_url('/assect/images/systemImg/home.png') . '" title="Home">' ; ?>
</a>
        <?php if(isset($_SESSION['userid'])):?>
         
          <a href="<?= base_url('index.php/UPLOAD')?>"><?php echo '<img src="' . base_url('/assect/images/systemImg/upload.png') . '" title="Upload">' ; ?>
</a>
          <a href="#"><?php echo '<img src="' . base_url('/assect/images/systemImg/bell.png') . '" title="Notification">' ; ?></a>
        <?php endif;?>
       
        
        
    </div>
    <div class="dropdownParent">
      <?php if(isset($_SESSION['userid'])):?>
          <?php echo '<img src="' . base_url('/assect/images/systemImg/profile.png') . '" height=50px>' ; ?>
      <?php else:?>
        <a href="<?= base_url('index.php/login')?>"><div>login</div></a>
      <?php endif;?>


      <div class="dropdown">
      <a href="<?= base_url('index.php/userprofile')?>"><div>profile</div></a>
          <div><?php if(isset($_SESSION['userid'])):?>
            <a href="<?= base_url('index.php/login/logout')?>"><div>Logout</div></a>
          <?php else:?>
            <a href="<?= base_url('index.php/login')?>"><div>login</div></a>
          <?php endif;?>
    
      </div>
    </div>


  </div>
  </nav>
</body>
</html>