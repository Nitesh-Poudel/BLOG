
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $result['title']; ?></title>
    <style>
     
      .contents,.content, {box-shadow: 3px 3px 6px 2px rgba(0, 0, 0, 0.2);padding: 20px;}
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

      a{ color:black;}
      .reaction{border-top:1px solid gray;padding-top:20px}
    
    
    </style>
  
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
  
<div class="container">
<?php include_once('header.php');?>

  <div class="content">
        <h2><?= $result['title']; ?></h2>
        <p><?= $result['content']; ?></p>
        <h6><b>Author :- <?= $result['fname']; ?></b></h6>
  
    <div class="reaction">
    <?php echo form_open('reaction/like')?>
      <input type="hidden"name="blogid"value="<?= $result['blogid']; ?>">
      <button type="submit">Like </button><?php echo $likeCount?>
      
    <?php echo form_close()?>

    <?php echo form_open('reaction/comment')?>
      <label for="<?= $result['blogid'];  ?>">Comment</label><br>
      <input type="text" class="form-control" name="comment" id="<?= $result['blogid']; ?>">
      <input type="hidden"name="blogid"value="<?= $result['blogid']; ?>">
      <button type="submit">Comment</button>
    <?php echo form_close();?>
  </div>
  </div>



</div>
</body>
</html>