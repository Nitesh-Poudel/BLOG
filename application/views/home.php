
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
    <link rel="stylesheet"a href="<?= base_url('/assect/style/mainStyle.css') ?>">

    <style>
      
    </style>
  
  
    <lnk href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
<body>
  
<div class="container">

<?php include_once('header.php');?>
  


<br><br>
<div class="innerContainer">
<div class="sidebar">
  <div class="search"><input id="input" type="text" id="form1" />
    <button class="btn btn-primary">Search</button>
  </div>
   
  <div class="catagoryTable">
    <h6>Catagory</h6>
    <ul type="none">
      <?php foreach ($categories as $category): ?>
            <div class="catagoryImg"><li> 
              <a href="Home?catagory=<?= $category->cid ?>">
                <img src="<?= base_url('/assect/images/catagoryImg/' . $category->cimg) ?>" alt="">
              </a>
            <div class="catagoryName"><b><?=$category->catagory?></b></div>
          </li></div><br>
      <?php endforeach; ?>
        
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
   
    <h6>    <?php echo $likeCount[$content->blogid]; ?> Likes   <?php echo $CommentCount[$content->blogid]; ?> Comments   <?= rand(100, 1000); ?> Views</h6>
   
    </div>
  </div>
<?php endforeach; ?>

</div>
</div>

</div>
</body>
</html>