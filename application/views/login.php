<html>
    <head>
        <title>Login</title>
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">




        <style>
            #error{color:red;font-size:10px}
        </style>
    </head>
    <body>
        <div class="container">
        <nav  class="nav  navbar navbar-dark bg-dark">
            <a href="<?= base_url('index.php/signin')?>">Sign Up</a>
        </nav>
        <h1>Login</h1>
        <?php echo form_open('login/Login_validation')?>
            <div class="form-group">
                <input type="text"placeholder="email"class="form-control" name="email">
                <div id="error"><?php echo form_error('email');?></div><br>
            </div>

            <div class="form-group">
                <input type="password"class="form-control" placeholder="password" name="password">
                <div id="error"><?php echo form_error('password');?></div><br>
            </div>
            <button type="submit"name="login"  class="btn btn-primary">Login</button>
        <?php echo form_close()?>
        </div>
       <br>

       <div id="error">
    <?php if(isset($loginFail)): ?>
        <?php echo $loginFail; ?>
    <?php endif; ?>
</div>
           
        
       
    </body>
</html>