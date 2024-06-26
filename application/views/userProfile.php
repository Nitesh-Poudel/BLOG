<!-- userProfile view -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=ucwords($userdata->fname.' '.$userdata->lname)?></title>
  <link rel="stylesheet" href="<?= base_url('/assect/style/mainStyle.css') ?>">
  <link hrebf="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .container{width:100%;height:80vh;}
    .sidebar img{width:90px}
    .sidebar .intro{display:flex;line-height: 0.1;align-items:center;margin:10px 0px;border-bottom:1px solid gray}
    .sidebar .intro h2{font-size:100%}
    .sidebar .linkss{line-height:0;}
    .sidebar .linkss a{color:black;font-size:16px}
    .innercontainer{width:100%;height:90vh;}
    .conttent{width:90%;height:80vh;background-color:blu;overflow:scroll;margin:20px 0px;background-color:;box-shadow:none;}
    .shortcontent-tasks{background-color:old;padding:10px;box-shadow: 3px 3px 4px 2px rgba(0, 0, 0, 0.2);}
    .shortcontent-tasks:hover{background-color:lightgray;}
    .shortcontent{height:195px;overflow:hidden;background-color:re;padding:0px;}
    .right{overflow:scroll;display:flex;justify-content:center}
    .conttent,.right {text-align: justify;}
    .container .innercontainer{display:flex;box-shdow: 3px 3px 4px 2px rgba(0, 0, 0, 0.2);text-align: justify;justify-content:space-around;}
     .right{width:100%}
    .tasks{display:flex;justify-content:flex-end;border-top:1px solid gray;margin-top:30px;}
    .tasks img{width:20px}
    button{border:none;background:transparent;cursor: pointer;margin:10px}
    .settings{position: absolute;cursor: pointer;}
    .setting{line-height:10px;position:relative;top:0px;left:0px;background-color:gold;padding:20px;display:none}
    .settings:hover .setting{display:block;background-color:red}
  </style>
</head>
<body>
<?php include_once('header.php');?>
  <div class="container">
   
    <div class="innercontainer">
      <div class="sidebar">

        <div class="intro">
          <div>
            <?php echo'<img src="' . base_url('/assect/images/systemImg/profile.png') . '" >'?>
          </div>
          <div>
            <h2><?php echo $userdata->fname." ".$userdata->lname;?></h2>
            <?php echo $userdata->email?>
          </div>
          
        </div>

        
        <div class="linkss">
          <ul type="none">
          <?php if(!isset($_GET['userid'])||$_GET['userid']==$_SESSION['userid']):?>
            <li><a href="<?=base_url('index.php/userProfile')?>"><h5>My Contents</h5></a></li>
            <li><a href="<?=base_url('index.php/userProfile/saved')?>"><h5>Saved</h5></a></li>
            <div class="settings"><li><h5>Setting</h5></li>
              <div class="setting">
                <li><a href="<?=base_url('index.php/setting/changePassword')?>">Change Password</a></li>
                <li><a href="<?=base_url('index.php/setting/changeProfile')?>">Change Profile</a></li>
                <li><a href="<?=base_url('index.php/setting/filterContent')?>">Filter Content</a></li>
              </div>
            </div>
            
            <?php else:?>
              <?= form_open('relation/follow')?>
                <input type="hidden" name="followBy" value="<?=$_SESSION['userid']?>">
                <input type="hidden" name="followTo" value="<?=$_GET['userid']?>">
                <li><button><?=$doIFollow?"Unfollow":"Follow"?></button></li>
              <?=form_close();?>
              
              <?= form_open('relation/block')?>
                   <input type="hidden" name="blockTo" value="<?=$_GET['userid']?>">
               
                <li><button>Block</button></li>
              <?= form_close()?>
            <?php endif;?> 

          </ul>
        </div>
      
      
    </div>

      <div class="right">
   
        <div class="conttent">
          <h1><?=isset($userUploadeddata)?'Uploaded Contents':'Saved Content';?></h1>
          <?php if (isset($userUploadeddata) || isset($userSaveddata)): ?>
            <?php $data = isset($userUploadeddata) ? $userUploadeddata : $userSaveddata; ?>
       

            <?php foreach ($data as $content): ?>
              <div class="shortcontent-tasks">
                <a href="<?= base_url('index.php/home/maincontent?blogid=' . $content->blogid) ?>"><div class="shortcontent">
                    <h2><?php echo $content->title; ?></h2><br>
                    <em>Description: </em><?php echo $content->content; ?><br>
                    <!-- Display other relevant properties -->
                </div></a>
               
               
                <div class="tasks">

              <?php $userid=''; if(isset($userUploadeddata)&& $_SESSION['userid']==$content->userid):?>
                <?php// elseif($_SESSION['userid']==isset($_GET['userid'])):?>
                <?= form_open('userprofile/edit');?>
                  <input type="hidden" value="<?= $content->blogid;?>" name="blogid">
                  <input type="hidden"value="<?=$userdata->uid?>"name="uid">
                
                  <button type="submit" name="edit" >
                    <?php echo '<img src="' . base_url('/assect/images/systemImg/edit.png') . '">'; ?>
                 </button>
                <?= form_close();?>

                <?= form_open('userprofile/delete');?>
                  <input type="hidden" value="<?= $content->blogid;?>" name="blogid">
                  <input type="hidden"value="<?=$userdata->uid?>"name="uid">
                  <button type="submit" name="delete">
                    <?php echo '<img src="' . base_url('/assect/images/systemImg/delete.png') . '">'; ?>
                  </button>
                <?= form_close();?>
              <?php endif;?>



               </div> 
              </div>
            <?php endforeach; ?>
          
          <?php else:?>
            <p>No content Posted</p>
          <?php endif;?>

        </div>
      </div>
      
    </div>
  </div>
</body>
</html>
