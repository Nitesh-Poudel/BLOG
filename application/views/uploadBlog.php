<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
      .nav img{height:80px}
      .container{box-shadow: 3px 3px 4px 2px rgba(0, 0, 0, 0.2);}
      textarea{height:100px}
    </style>
       
    <link rel="stylesheet"a href="<?= base_url('/assect/style/mainStyle.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

   
   
    <?php
        include_once('header.php');
    ?>
   <br><br><br>
   <div class="container">
    <h1>Write_blog</h1>
    <?php echo form_open('Upload/upload')?>
      <input type="text" placeholder="title" id="title"class="form-control" name="title"value="<?=$editable['title']?>">
      <div id="error"><b><?php echo form_error('title');?></b></div><br>

      <select id="catagory" name="catagory"class="form-control" >
      <option value=""><?=$editable['catagory']?></option>
        <option value="disable ">Choose catagory</option>
        
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category->cid; ?>"><?php echo $category->catagory; ?></option>
        <?php endforeach; ?>
      </select>
      <div id="error"><b><?php echo form_error('catagory');?></b></div><br>
  
    
      <textarea name="content" id="content" class="form-control"><?=$editable['content']?></textarea>

      <div id="error"><b><?php echo form_error('content');?></b></div><br>

      <input type="file"><br>

      <input type="text" placeholder="Keywords:Enter specfic keyword so that you contanct can get good rank." id="title"class="form-control" name="keywords">
      <div id="error"><b><?php echo form_error('keywords');?></b></div><br>

        <button type="submit"name="post" class="btn btn-primary">Post</button><br>
    <?php echo form_close()?>
    </div>
</body>
</html>