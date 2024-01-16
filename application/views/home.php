
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
    <link rel="stylesheet"a href="<?= base_url('/assect/style/mainStyle.css') ?>">
  <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
      .reaction{display:flex;justify-content:space-between;align-items:center}
      button{border:none;background:transparent;}
      button img{width:20px}
      
    </style>
  
  
    <lnk href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
<body>
  
<div class="container">



<br><br>
<div class="innerContainer">
<div class="sidebar">
  <div class="search">
    <?=form_open("home");?>
      <input id="input" type="text" id="form1" />
      <button class="btn btn-primary">Search</button>
    <?=form_close();?>
  </div>
   
  <div class="catagoryTable">
    <h6>Catagory</h6>
    <ul type="none">
      <?php if(isset($categories)):?>
      <?php foreach ($categories as $category): ?>
            <div class="catagoryImg"><li> 
              <a href="Home?catagory=<?= $category->cid ?>">
                <img src="<?= base_url('/assect/images/catagoryImg/' . $category->cimg) ?>" alt="">
              </a>
            <div class="catagoryName"><b><?=$category->catagory?></b></div>
          </li></div><br>
      <?php endforeach; ?>
      <?php endif;?>
        
    </ul>
  </div>
</div>
<div class="contents">
<?php foreach ($contents as $index => $content): ?>
  <a href="<?= base_url('index.php/home/maincontent?blogid=' . $content->blogid) ?>">
  <div class="content">
    <div class="text">
        <h2><?= $content->title; ?></h2>

        
        <p><?= $lcontents[$index]; ?></p>
    </div>  
    <div class="reaction">
   
    <div><h6>    <?php echo $likeCount[$content->blogid]; ?> Likes   <?php echo $CommentCount[$content->blogid]; ?> Comments   <?= rand(100, 1000); ?> Views</h6></div></a>
    
    <?php if(isset($_SESSION['userid'])):?>
    <div class=dropdownParent><h6><button type="submit"> <?php echo'<img src="' . base_url('/assect/images/systemImg/dots.png') . '" >'?></button></h6>
      <div class="dropdown">
        <?= form_open('home/savePost')?>
          <div><button type="submit">Save</button></div>
          <input type="hidden" name="blogid" value="<?=$content->blogid?>">
          <input type="hidden" name="blog" value="">
         
          <div><a href="#">Report</a></div>
        <?= form_close()?>

      </div>
    </div>
   <?php endif;?>
    </div>
  </div>
<?php endforeach; ?>

</div>
</div>

</div>




</body>
</html>