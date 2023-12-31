<?php
  $is_edit = !empty($editable['title']) && !empty($editable['content']); // Corrected syntax for empty check

    if ($is_edit) {
      $form_action = 'userprofile/update';
    } else {
      $form_action = 'upload/upload';
  }
?>

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
   <h1><?= $is_edit ? 'Edit Blog' : 'Write Blog' ?></h1>
        <?php echo form_open($form_action)?>
      <input type="text" placeholder="title" id="title"class="form-control" name="title"value="<?= $is_edit ? $editable['title'] : '' ?>">
      <div id="error"><b><?php echo form_error('title');?></b></div><br>

      <select id="category" name="category" class="form-control">
    <option value="<?php echo $is_edit ? $editable['catagoryID'] : ''; ?>" <?php echo ($is_edit && empty($editable['catagoryID'])) ? 'selected' : ''; ?>>
        <?php echo $is_edit ? $editable['catagory'] : 'Choose category'; ?>
    </option>
    <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category->cid; ?>" <?php echo ($is_edit && $category->cid == $editable['catagoryID']) ? 'selected' : ''; ?>>
            <?php echo $category->catagory; ?>
        </option>
    <?php endforeach; ?>
</select>



      <div id="error"><b><?php echo form_error('catagory');?></b></div><br>
  
    
      <textarea name="content" id="content" class="form-control"><?= $is_edit ? $editable['content'] : '' ?></textarea>
         
      <div id="error"><b><?php echo form_error('content');?></b></div><br>

      <input type="file"><br>

      <input type="text" placeholder="Keywords:Enter specfic keyword so that you contanct can get good rank." id="title"class="form-control" name="keywords">
      <div id="error"><b><?php echo form_error('keywords');?></b></div><br>

       <input type="hidden" name="uid" value="<?= $is_edit ? $sessionUserId : '' ?>">
       <input type="hidden" name="blogid" value="<?= $is_edit ? $editable['blogid'] : '' ?>">

      <button type="submit" name="post" class="btn btn-primary">
        <?= $is_edit ? 'Update' : 'Post' ?>
      </button>


      <?php echo form_close()?>
    </div>
</body>
</html>