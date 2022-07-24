<?php

//Check if the user has logged-in
if (!isset($_GET['name']) || strlen($_GET['name'])<1){
    die("Name Parameter missing");
}

//Provision for Log-out
if (isset($_POST['logout'])){
    header("Location: index.php");
    return;
}

//Array containing the options  
$options=array("Rock", "Paper", "Scissors");

$user=-1;
//Human's Choice
if (isset($_POST["user"])){
    $user=$_POST["user"]+0;
}

//Computer's Choice
$computer=rand(0,2);


//Function to check for winner
function check($computer, $user){
    if ($computer==0){
        if ($user==0){
            return "Tie";
        }
        else if ($user==1){
            return "You Win";
        }
        else if ($user==2){
            return "You Lose";
        }
    }

    else if ($computer==1){
        if ($user==0){
            return "You Lose";
        }
        else if ($user==1){
            return "Tie";
        }
        else if ($user==2){
            return "You Win";
        }
    }

    else if ($computer==2){
        if ($user==0){
            return "You Win";
        }
        else if ($user==1){
            return "You Lose";
        }
        else if ($user==2){
            return "Tie";
        }
    }
}

//Calling function to decide result of the play
$result=check($computer,$user);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Rock Paper Scissors Game</title>
    </head>
    <body>
        <h1>Rock Paper Scissors</h1>
        <?php
        if (isset($_REQUEST['name'])){
            echo "<p>Welcome: ";
            echo htmlentities($_REQUEST['name']);
            echo "</p>\n";
        }
        ?>

        <form method="POST">
            <select name="user">
                <option value="-1">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
            </select>

            <input type="submit" value="Play">
            <input type="submit" name="logout" value="Logout">
        </form>

        <pre>
            <?php
            print "\n";
            if ($user==-1){
                print "Please select a choice to play";
            }
            else if ($user==3){
                for ($i=0; $i<3 ; $i++){
                    for ($j=0; $j<3 ;$j++){
                        $r=check($i,$j);
                        print "Human=$options[$j] Computer=$options[$i] Result=$r\n";
                    }
                }
            }
            else{
                print "Your Play=$options[$user] Computer Play=$options[$computer] Result=$result\n";
            }
            ?>
        </pre>
    </body>
</html>

