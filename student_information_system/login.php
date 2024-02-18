<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
            color: #007bff; 
        }

        .title_log {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form_log {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .label_log {
            color: #6c757d; 
        }

        .login_form {
            margin-top: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ced4da; 
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff; 
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <center>
                    <div class="title_log">Login</div>
                </center>

                <center>
                    <div class="form_log">
                        <form action="login_check.php" method="POST" class="login_form">
                            <div>
                                <label class="label_log">Username</label>
                                <input type="text" name="username" id="">
                            </div>

                            <div>
                                <label class="label_log">Password</label>
                                <input type="password" name="password" id=""> 
                            </div>

                            <div>
                                <input type="submit" name="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
