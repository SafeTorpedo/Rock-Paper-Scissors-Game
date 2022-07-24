<?php

//Check if the user has logged-in
if (!isset($_GET['name']) || strlen($_GET['name'])<1){
    die("Name Parameter missing");
}

//