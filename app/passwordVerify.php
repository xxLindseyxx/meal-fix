<?php

//Set the session for wehen the user loggs into the account page
ini_set("session.save_path", "/home/unn_w20019235/sessionData"); 
session_start();

require_once("functions.php");
/**
 * Verify the password 
 * 
 * This script verifies that the email and password matches the 
 * email and password in the database. If this is true the script 
 * sets the session.
 * 
 * @author Lindsey Cawthorne
 */
echo makePageStart("Meal Fix!", "styles/index.css", "script/password.js");
echo makeHeader("MEAL-FIX"); 
echo makeNavMenu(array());
echo startMain();

    // Get the inputs       
    $email = filter_has_var(INPUT_POST, 'email') ? $_POST ['email'] : null; 
    $password = filter_has_var(INPUT_POST, 'password') ? $_POST ['password'] : null;

    //Do some validation 
    $email = trim ($email);
    $email = stripslashes($email);
    $password = trim ($password);
    $password = stripslashes($password);

    // This statement checks to see if the form field is empty   
    if (empty($email)) {
        echo "<p>Please enter your Email address </p>\n";
    }
    if(empty($password)){
        echo"<p>Please enter your password </p>\n";
    }

    // Make a database connection
    $dbConn = getConnection();

    // Query the users database table to get the password where the email = the current email
    $querySQL = "SELECT password from user where email = :email";

    // Prepare the sql statement using PDO
    $stmt = $dbConn->prepare($querySQL);

    $stmt->execute(array(':email' => $email));

    $user = $stmt->fetchObject();

    // If the email and password is correct set the session and redirect to account page. 
    if ($user) {

        $passwordDB = $user->password;
        if(password_verify($password , $passwordDB)){

            /* set the cache limiter to 'private' */
            session_cache_limiter('private');
            $cache_limiter = session_cache_limiter();

            /* set the cache expire to 10 minutes */
            session_cache_expire(10);
            $cache_expire = session_cache_expire();

            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true;

            header('Location: ' .'account.php');
        }
        else 
        {
            echo "Password Failed!";
        }
    }
        else 
        {
                echo "User failed";
        }

echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();