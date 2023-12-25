
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
    <style>
      .innerContainer{display:flex;}
      .sidebar{width:50vw;box-shadow: 3px 3px 4px 2px rgba(0, 0, 0, 0.2);}
      .contents,.content, nav{box-shadow: 3px 3px 4px 2px rgba(0, 0, 0, 0.2);padding: 20px;}
      .contents{height:80vh;overflow:scroll}

      .sidebar ul{margin:0px;padding:0px}
      .sidebar li{padding:20px 5px;}
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
        height:150px;
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
<div class="innerContainer">
<div class="sidebar">
  <h6>Catagory</h6>
  <ul type="none">
  <?php foreach ($categories as $category): ?>
            <li><b><a href="Home?catagory=<?=$category->cid ?>"><?php echo $category->catagory; ?></a></b></li>
        <?php endforeach; ?>
  </ul>
</div>
<div class="contents">
<?php foreach ($contents as $content): ?>
  <a href="<?= base_url('index.php/home/maincontent?blogid=' . $content->blogid) ?>">
  <div class="content">
        <h2><?= $content->title; ?></h2>
        <p><?= $content->content; ?></p>
        
  </div></a>
<?php endforeach; ?>

</div>
</div>

</div>
</body>
</html>