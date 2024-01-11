<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" a href="#">
        <style>
            #error{color:red;font-size:10px}
            <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
           width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #error {
            color: red;
            font-size: 12px;
        }
    </style>
        </style>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
        <h1>Sign_IN</h1>
        <?php echo form_open('signin/registration_validation')?>

            <div class="form-row">
                <div class="col">
                    <input type="text"placeholder="First_nae"name="fname">
                    <div id="error"><?php echo form_error('fname');?></div><br>
              
                <div class="col">
                    <input type="text"placeholder="last_nae"name="lname"><br>
                    <div id="error"><?php echo form_error('lname');?></div><br>
                </div>
            </div>
            <div class="form-row">
                <input type="radio"  id="male"name="gender" value="Male" />
                <label for="male">Male</label>


                <input type="radio"  id="Female"name="gender" value="Female" />
                <label for="Female">Female</label>

                <input type="radio"  id="Others"name="gender" value="Others" />
                <label for="Others">Others</label><br>
                <div id="error"><?php echo form_error('gender');?></div><br>
        

                <input type="text"placeholder="email"name="email">
                <div id="error"><?php echo form_error('email');?></div><br>
                <input type="password"placeholder="password" name="password">
                <div id="error"><?php echo form_error('password');?></div><br>
                <input type="cpassword"placeholder="Conform-Password" name="cpassword">
                <div id="error"><?php echo form_error('cpassword');?></div><br>
            </div>
           
           <button type="submit"name="login">sign-n</button>
        </form>
       
        
        </div> 
    </body>
</html>