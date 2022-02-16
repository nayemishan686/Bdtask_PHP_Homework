<?php 
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($username) && ($password)){
        if(($_POST['check']) == "on"){
            setcookie("username", $username);
            setcookie("userpassword", $password);
        }
        $_SESSION['loggedin'] = true; 
    }
    
    if(isset($_POST['logout'])){
        $_SESSION['loggedin'] = false;
        session_destroy();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Logout System Using Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    /* Google fonts link */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

    /* Main code for login & logout */
    html, body{
        margin: 0;
        padding: 20px;
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
    }
    q{
        font-size: 18px;
        margin-bottom: 30px;
        color: #03045e;
    }
</style>
<body>
    <div class="container">
        <div class="row text-center">
            <h2>Login Panel</h2>
            <?php if(true ==  $_SESSION['loggedin'] ){ ?>
                <q>
                Welcome to your profile. Happy Journey. You can loggedout by hitting the logout button.
                </q>
            <?php }else{ ?>
                <q>
                Hey do you want to login?
                So fill login panel with valid data.
                Then i will send your porfile page
                </q>
            <?php } ?>
        </div>
        <?php if(false == $_SESSION['loggedin']){ ?>
        <div class="row">
            <form action="" class="w-50 m-auto" method="post">
                <label for="username">Username :</label>
                <input type="text" name="username" id="" placeholder="Enter your username" class="form-control mb-3" value="<?php if(!empty($_COOKIE['username'])){echo $_COOKIE['username'];} ?>">
                <label for="password">Password :</label>
                <input type="password" name="password" id="" class="form-control mb-3" placeholder="Enter your password" class="form-control" value="<?php if(!empty($_COOKIE['userpassword'])){echo $_COOKIE['userpassword'];} ?>">
                <?php if(!empty($_COOKIE['username']) && ($_COOKIE['userpassword'])){ ?>
                    <input type="checkbox" name="check" id="" checked> Remember me <br>
                <?php }else{?>
                    <input type="checkbox" name="check" id=""> Remember me <br>
                <?php }?>
                <button type="submit" name="login" class="btn btn-danger">Submit</button>
            </form>
        </div>
        <?php }else{?>
            <div class="row">
                <form action="" class="w-50 m-auto" method="post">
                    <button name="logout" class="btn btn-danger">Log Out</button>
                </form>
            </div>
        <?php }?>
    </div>

    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>