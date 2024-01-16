<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>

</head>
<body>
    
    <?=form_open_multipart('adminpannel/validate');?>
        <input type="text" name="newCatagory" id="newCatagory"placeholder="Add new catagory">
        <div id="error"><?php echo form_error('newCatagory');?></div><br>

        <?=form_upload(['name'=>'catagoryImg'])?>
        <div id="error"><?php if(isset($upload_error)) {echo $upload_error;}?>
        </div><br>

        <button type="submit" >Add Catagory</button>
    <?=form_close();?>
    
</body>
</html>