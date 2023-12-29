
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
    <style>
      .text , .sidebar a, .reaction {color:black}
      .innerContainer{display:flex;width:100%}
      .sidebar{width:400%;box-shadow: 3px 3px 4px 2px rgba(0, 0, 0, 0.2);}
      .sidebar a{font-size:9px;margin:10px 10px;padding:0px 10px;text-decoration:underline}
     
      .contents,.content, nav,.catagoryTable{box-shadow: 3px 3px 4px 2px rgba(0, 0, 0, 0.2);padding: 20px;}
      .contents{height:80vh;overflow:scroll}

      .sidebar ul{margin:0px;padding:0px}
     
      .container a{ text-decoration: none;}
     
      nav a{color:white;margin:0px 50px;}

      .text{height:195px;overflow:hidden;}
      .text p{color:#1b0101}
     
      .reaction{ margin-top:30px; border-top:1px solid gray;}

      .content{ margin:50px 0px;text-align: justify;}
      
      a{ color:black;}
      nav a{text-decoration: none;color:white;}
   
      a{ color:black;}

      .content:hover{background-color:aliceblue; }

    

      ::-webkit-scrollbar {width: 2px;}
      ::-webkit-scrollbar-thumb {background: #888;}



      ::-webkit-scrollbar-thumb:hover {background: #555;}

    </style>
  
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
  
<div class="container">

<?php include_once('header.php');?>
  


<br><br>
<div class="innerContainer">
<div class="sidebar">
  <div class="catagoryTable">
    <h6>Catagory</h6>
    <ul type="none">
      <?php foreach ($categories as $category): ?>
            <li><b><a href="Home?catagory=<?=$category->cid ?>"><?php echo $category->catagory; ?></a></b></li>
      <?php endforeach; ?>
        
    </ul>
  </div>
</div>
<div class="contents">
<?php foreach ($contents as $content): ?>
  <a href="<?= base_url('index.php/home/maincontent?blogid=' . $content->blogid) ?>">
  <div class="content">
    <div class="text">
        <h2><?= $content->title; ?></h2>

        
        <p><?= $content->content; ?></p>
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