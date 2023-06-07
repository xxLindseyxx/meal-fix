
<?php

/**
 * 
 * Functions
 * 
 * Functions is mainly used to build the webpage and
 * to handle errors
 * 
 * @author Lindsey Cawthorne
 */
//Building the webpage
function getConnection()
{
    try {
        $dbName = 'mealfix.db';
        $connection = new PDO('sqlite:'.$dbName);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (Exception $e) {
        throw new Exception("Connection error " . $e->getMessage(), 0, $e);
    }
}
function makePageStart($title, $css, $script)
{
    $pageStartContent = <<<PAGESTART
    <?php
    ini_set("session.save_path", "/home/unn_w20019235/sessionData");
        session_start();
    ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
                <title>$title</title> 
                <link href="$css" rel="stylesheet" type="text/css">
            <meta name = "viewport" content="width=device-width, initial-scale=1.0">
            <script src="$script" defer></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        </head>
        <body>
PAGESTART;
    $pageStartContent .= "\n";
    return $pageStartContent;
}

function makeHeader($header)
{
    $headContent = <<<HEAD
            <header class= "header">
           
            <img class= 'grapes' src="images/grapes.svg" alt="A picture of a grapes">
            <img class= 'pepper' src="images/pepper.svg" alt="A picture of a yellow pepper">
            <h1>$header </h1>
                <img class= 'tomato' src="images/tomato.svg" alt="A picture of a tomato">
                <img class= 'lemon' src="images/lemon.svg" alt="A picture of a lemon">
            </header>
            <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 180"><path fill="#1cab80" fill-opacity="1" d="M0,32L120,64C240,96,480,160,720,176C960,192,1200,160,1320,144L1440,128L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>
HEAD;
    $headContent .= "\n";
    return $headContent;
}

// Build the nav 
function makeNavMenu()
{
$navMenuContent = <<<NAVMENU
    <div class"wrappper">
        <nav class="nav">
            <a href="index.php" class="nav-link nav-link--active">
                <i class="material-icons nav-icon">home</i>
                <span class="nav-text">Home</span>
            </a>
            <a href="account.php" class="nav-link">
                <i class="material-icons nav-icon">person</i>
                <span class="nav-text">Account</span>
            </a>
            <a href="calendar.php" class="nav-link">
                <i class="material-icons nav-icon">calendar_month</i>
                <span class="nav-text">Calendar</span>
            </a>
            <a href="meals.php" class="nav-link">
                <i class="material-icons nav-icon">restaurant_menu</i>
                <span class="nav-text">Meals</span>
            </a>
            <a href="lists.php" class="nav-link">
                <i class="material-icons nav-icon">list</i>
                <span class="nav-text">Lists</span>
            </a>
        </nav>
NAVMENU;

    return $navMenuContent;
}

function startMain()
{
    return "<main class = 'main'>\n";
}

function endMain()
{
    return "</main>\n ";
}

function makeFooter(array $list, $copy)
{
    $output = "<ul>";
    foreach ($list as $value) {
        $output .= "<li>$value</li>\n";
    }
    $output .= "</ul>\n";
    $footContent = <<<FOOT
    </div>
        <footer class = "footer">
            $output  
            <p> &nbsp; &copy; $copy</p>
            <img class= 'veg' src="images/veg.svg" alt="A picture of a vegetables">
        </footer>
        </div>
FOOT;
    $footContent .= "\n";
    return $footContent;
}

function makePageEnd()
{
    return "</body>\n</html>";
}
//-------------------------------------------------------------------

// code to create sessions and valadate logon

/** 
 * define a function to be the global exception handler that 
 * will fire if no catch block is found
 * @param $e
 */
function exceptionHandler($e)
{ // Handle exceptions
    echo "<p><strong>Problem occured</strong></p>";
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
    
    log_error($e);
}

set_exception_handler('exceptionHandler');


function errorHandler($errno, $errstr, $errfile, $errline)
{

    if (!(error_reporting() & $errno)) {
        return;
    }
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}

set_error_handler('errorHandler');

function log_error($e)
{ // Log errors to the console

    $fileHandle = fopen("error_log.log", "ab");
    $errorDate = date('D M j G:i:s T Y');
    $errorMessage = $e->getMessage();
    $toReplace = array("\r\n", "\n", "\r"); //chars to replace Take out line breaks 
    $replaceWith = '';
    $errorMessage = str_replace($toReplace, $replaceWith, $errorMessage);
    fwrite($fileHandle, "$errorDate|$errorMessage" . PHP_EOL);
    fclose($fileHandle);
}

?>