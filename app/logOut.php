<?php 
ini_set("session.save_path", "/home/unn_w20019235/sessionData"); 
session_start();

require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * Log out
 * 
 * This code deletes the session and loggs the 
 * user out of the website keeping their 
 * details safe. 
 * 
 * @author Lindsey Cawthorne
 */

    echo "<div class = 'loggedIn'><p>Logout sucsessful</p>
                        <a href='index.php'<strong>Click here to return home!</strong></a>
                        </div>"; 

    $_SESSION = array();

    //Set the cookie expiration date to one hour ago
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        "",
        time() - 3600,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );

session_destroy();
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>