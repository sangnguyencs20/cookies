<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-riqxC9b/p8fhQWq3BKV6TNGT2+1KtiOxG6SnfD0mnJU6F+U6oPYU7V0J4ztuO7Z4epjKb+J01L1YcWsJfSgS9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="logo mb-3">
                            <img src="Cookie.png" width="100" height="100" alt="Logo">
                        </div>
                        <h3 class="text-center mb-4">Login Form</h3>
                        <form action="index.php?act=login" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name = "email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password" placeholder="Enter password" name = "password">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" name= "login" value="Login"></input>
                        </form>
                        <a href="index.php?act=signup">Don't have any account? Sign up here!</a>
                    </div>
                </div>
            </div>

            <h1>
                <?php
                    echo $message;
                ?>  
            </h1>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/XpG5CJMQnE6I5Xw" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>