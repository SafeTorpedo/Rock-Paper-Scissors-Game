<?php

if (isset($_POST['cancel'])){
    //Redirect to homepage index.php
    header("Location: index.php");
    return;
}

$salt='XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  //Password is php123

$fail=false; //For error messages if any arise ahead


//Checking for POST data
if (isset($_POST['who']) && isset($_POST['pass'])){
    if (strlen($_POST['who'])<1 || strlen($_POST['pass'])<1){
        $fail="User name and password is required!";
    }
    else{
        $check=hash('md5',$salt.$_POST['pass']);
        if ($check==$stored_hash){
            //Redirect to game on successful authentication
            header("Location: game.php?name=".urlencode($_POST['who']));
            return;
        }
        else{
            $failure="Incorrect password!";
        }
    }
}

?>

<!-- Starting View Control -->

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <h1>Please Log In</h1>
        
        <p style="color:red">
        <?php
        //Displaying error messages if any
        if ($failure!==false){
            echo "htmlentities($failure)\n";
        }
        ?>
        </p>

        <!-- Form with POST method -->
        <form method="POST">
            <label for="name">User name</label>
            <input type="text" name="who" id="name"><br/>
            
            <label for="pwd">Password</label>
            <input type="password" name="pass" id="pwd"><br/>

            <input type="submit" value="Log In">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>

