
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $result['title']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet"a href="<?= base_url('/assect/style/mainStyle.css') ?>">

    <style>
      .nav{height:200px}
      .logo img{height:60px}
      .content{margin:50px 0px;text-align: justify;}
       button img{width:30px}
       a{ color:black;}
      .reaction{border-top:1px solid gray;padding-top:20px;}
      .like{display:flex;align-items:center}
       #like{border:none;background:transparent;cursor: pointer;}
    
    </style>
  
  
    <link hrf="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
<?php include_once('header.php');
if(isset($_SESSION['userid'])){$user=$_SESSION['userid'];}?> 
<div class="conntainer">

  <div class="content">
    <div class="text">
        <h2><?= $result['title']; ?></h2>
        <p><?= $result['content']; ?></p>
        <h6><b><a href="<?=base_url('/application/controllers/userProfile')?>">Author :- <?= $result['fname']; ?><?= $result['uid']; ?>
        </a></b></h6>
    </div>
    <div class="reaction">
    <?php echo form_open('reaction/like')?>

      <div class="like">
        <input type="hidden"name="author" value=" <?= $result['uid']; ?>">
        <input type="hidden"name="blogid"value="<?= $result['blogid']; ?>">
        <button type="submit" id="like">
          <?php echo $likeCount == 0 ? '<img src="' . base_url('/assect/images/systemImg/like.png') . '" alt="Like Image">' : '<img src="' . base_url('/assect/images/systemImg/unlike.png') . '" alt="Unlike Image">'; ?>
        </button>

        </button>
        <?php echo $likeCount?>
      </div>
      
    <?php echo form_close()?>

    <?php echo form_open('reaction/comment')?>
      <label for="<?= $result['blogid'];  ?>">Comment</label><br>
      <input type="text" class="form-control" name="comment" id="<?= $result['blogid']; ?>">

      <?php if(isset($_SESSION['userid'])):?>
        <input type="hidden" name="author"value=" <?= $result['uid']; ?>">
        <input type="hidden"name="blogid"value="<?= $result['blogid']; ?>">
        <input type="hidden"name="user"value="<?= $user ?>">
      <?php endif;?>

      <button type="submit">Comment</button>
    <?php echo form_close();?>
  </div>
  </div>


  <?php foreach($getComment as $comment): ?>
    <?php
        // Display comment details as needed
        echo "<b>".$comment->fname."    </b> ".$comment->comment."<br>"; // Replace 'your_comment_column' with the actual column name from your database

    ?>
<?php endforeach; ?>

</div>
</body>
</html>