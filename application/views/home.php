
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
    <style>
      nav a{
        margin:0px 50px;
      }
      .content{
        margin:50px 0px;
        height:100px;
        overflow:hidden;
        text-align: justify;
        

       
      }
      a{ color:black;}
     nav a{
        text-decoration: none;
        color:white;
        
      }
      a{ color:black;}
      .content:hover{
        background-color:aliceblue;
      }
    </style>
  
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
  
<div class="container">

<?php include_once('header.php');?>
  


<br><br>


<?php foreach ($contents as $content): ?>
  <a href="<?= base_url('index.php/home/maincontent?blogid=' . $content->blogid) ?>">
  <div class="content">
        <h2><?= $content->title; ?></h2>
        <p><?= $content->content; ?></p>
        
  </div></a>
<?php endforeach; ?>


</div>
</body>
</html>