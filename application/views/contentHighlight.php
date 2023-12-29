
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $result['title']; ?></title>
    <style>
     
      .contents,.content, .text{box-shadow: 3px 3px 6px 2px rgba(0, 0, 0, 0.2);padding: 20px;}
      .container a{
        text-decoration: none;
        color:darkred;
      }
      nav a{
        color:black;
        margin:0px 50px;
      }

      .content{
        margin:50px 0px;
       text-align: justify;
       }
       button img{width:30px}

      a{ color:black;}
      .reaction{border-top:1px solid gray;padding-top:20px}
    button{border:none;background:transparent}
    
    </style>
  
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
  
<div class="container">
<?php include_once('header.php');
echo$user=$_SESSION['userid']?>
  <div class="content">
    <div class="text">
        <h2><?= $result['title']; ?></h2>
        <p><?= $result['content']; ?></p>
        <h6><b>Author :- <?= $result['fname']; ?></b></h6>
    </div>
    <div class="reaction">
    <?php echo form_open('reaction/like')?>
      <input type="hidden"name="blogid"value="<?= $result['blogid']; ?>">
       
      <button type="submit">
        <?php echo $likeCount == 0 ? '<img src="' . base_url('/assect/like.png') . '" alt="Like Image">' : '<img src="' . base_url('/assect/unlike.png') . '" alt="Unlike Image">'; ?>
      </button>

      </button><?php echo $likeCount?>
      
    <?php echo form_close()?>

    <?php echo form_open('reaction/comment')?>
      <label for="<?= $result['blogid'];  ?>">Comment</label><br>
      <input type="text" class="form-control" name="comment" id="<?= $result['blogid']; ?>">
      <input type="hidden"name="blogid"value="<?= $result['blogid']; ?>">
      <input type="hidden"name="user"value="<?= $user ?>">
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