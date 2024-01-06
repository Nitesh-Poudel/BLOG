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
 .links  .grp1 img{width:16px;filter: invert(1);}
 .links .grp1 {display:flex}
 
 .nav ,.links{display:flex;justify-content:space-between}
 .links  .dropdownParent img{width:36px;height:auto;border:3px solid gray;margin-top:20px}
 /*drop_down*/
 .dropdownParent{position:relative}
 .dropdownParent:hover .dropdown{display:block}
.dropdown{background-color:white;position:absolute;top:30px;right:-20px;border:1px solid gold;border-radius:8px;display:none}
.dropdown a{color:black;padding:0px 0px}
.dropdown div{padding:2px 20px}
.dropdown div:hover{background-color:aliceblue;}
.notification {cursor:pointer;position:relative;padding:0px;margin:0px}
.notification:hovejr .notification-list{display:block}

.status{cursor:pointer;position:absolute;top:-5px;right:-5px;background-color:red;width:16px;text-align:center;border-radius:50%}
.notification-list{position:absolute;top:25px;left:-50px;width:300px;height:200px;overflow-y:scroll;overflow-x:hidden;line-height;border:1px solid gray;display:none}
.notification-list table {
  width: 100%;
  border-collapse: collapse;
}

.notification-list table tr {
  border-bottom: 1px dotted gray;
  background-color: white;
}

.notification-list table tr td {
  padding: 8px;
  text-align: left;
  color:Black;
}
#notifincation{ padding:5px;background-color:green}
#notificnation-list{background-color:blue}
table tr.seen0{background-color:aliceblue;}
table tr .seen1{background-color:white;}
</style>
     

</head>
<body>
<nav  class="nav  navbar ">
  <div class="logo">
  <?php echo '<img  src="' . base_url('/assect/images/systemImg/logo.png') . '" height=150px>' ; ?>
  </div>
  <div class="links">
      <div class="grp1">
       
        <a href="<?= base_url('index.php/home')?>"><?php echo '<img src="' . base_url('/assect/images/systemImg/home.png') . '" title="Home">' ; ?></a>
        <?php if(isset($_SESSION['userid'])):?>
         
          <a href="<?= base_url('index.php/UPLOAD')?>"><?php echo '<img src="' . base_url('/assect/images/systemImg/upload.png') . '" title="Upload">' ; ?>
</a>
        <div class="notification"id="notification"width="20px"><?php echo '<img src="' . base_url('/assect/images/systemImg/bell.png') . '" title="Notification">' ; ?>
            <div class="status"><b><?= $numNotification;?></b></div>
            <div class="notification-list"id="notification-list">
              
              <table>
              <?php foreach($notifications as $notification):?>
               <tr class="seen<?= $notification['seen']?>">
                <a href="#"><td><b><?= $notification['fname']. $notification['lname']?></b> <?=$notification['notification']?> your blog<br>
                    <?=$notification['title']?>
                  </td></a>
                </tr>
                <?php //print_r($notifications)
                  endforeach?>
               
                <tr>
                 
              </table>
              
            </div>
        </div>
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

  <script>
        document.addEventListener('DOMContentLoaded', function () {
            let notification = document.getElementById("notification");
            let notify = document.getElementById("notification-list");
            let isNotificationVisible = false;


          
           
            // Add click event listener to the notification trigger
            notification.addEventListener('click', function (event) {
                event.stopPropagation(); // Prevents the click event from propagating to the document
                if (!isNotificationVisible) {
                    notify.style.display = 'block';
                    isNotificationVisible = true;
                    updateDatabase();

                } else {
                    notify.style.display = 'none';
                    isNotificationVisible = false;
                }
            });

            // Add click event listener to the document to hide the notification when clicking anywhere outside it
            document.addEventListener('click', function () {
                if (isNotificationVisible) {
                    notify.style.display = 'none';
                    isNotificationVisible = false;
                }
            });
        });
    </script>

</body>
</html>