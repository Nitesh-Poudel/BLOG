<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
        .container{margin-top:0px}
        #content{height:100px}
    </style>
      
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

   
    <div class="container">
    <?php
        include_once('header.php');
    ?>
   

    <h1>Write_blog</h1>
    <?php echo form_open('home/upload')?>
      <input type="text" placeholder="title" id="title"class="form-control" name="title">
      <div id="error"><?php echo form_error('title');?></div><br>

      <select id="catagory" name="catagory"class="form-control" >
        <option value="disable ">Choose catagory</option>
        
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category->cid; ?>"><?php echo $category->catagory; ?></option>
        <?php endforeach; ?>

        <option value="disable "><a href="https://www.facebook.com/">facebook</a></option>

    </select><br>

    
      <textarea name="content" id="content"class="form-control"></textarea><br>
      <div id="error"><?php echo form_error('content');?></div><br>


        <button type="submit"name="post" class="btn btn-primary">Post</button><br>
    <?php echo form_close()?>
    </div>
</body>
</html>