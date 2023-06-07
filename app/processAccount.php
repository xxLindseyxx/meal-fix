<?php 
    require_once('functions.php');

    echo makePageStart("Meal Fix!", "styles/index.css", "");
    echo makeHeader("MEAL-FIX");
    echo makeNavMenu(array());
    echo startMain();

    /**
     * Process account 
     * 
     * Processes the account detials that have been passed from createAccount.php
     * and checks to see if the user has been registered.
     * 
     * @author Lindsey Cawthorne
     */

            $dbConn = getConnection();

            // Function for sanitizing the data
            function validate_input($input) 
            {
                // Remove whitespace from beginning and end of input
                $input = trim($input);
                
                // Remove backslashes from the input
                $input = stripslashes($input);
                
                // Convert special characters to HTML entities
                $input = htmlspecialchars($input, ENT_QUOTES);
                
                // Return the sanitized input
                return $input;
            }

            // Check to see if the form uses the post method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // If yes get the values from the input fields
            $email = filter_has_var(INPUT_POST, 'email') ? $_POST['email'] : null;
            $firstName = filter_has_var(INPUT_POST, 'first_name') ? $_POST['first_name'] : null;
            $lastName = filter_has_var(INPUT_POST, 'last_name') ? $_POST['last_name'] : null;
            $phoneNum = filter_has_var(INPUT_POST, 'phone_number') ? $_POST['phone_number'] : null;
            $password = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;
            $repeatPassword = filter_has_var(INPUT_POST, 'repeat-password') ? $_POST['repeat-password'] : null;
            
            validate_input($email);
            validate_input($firstName);
            validate_input($lastName);
            validate_input($phoneNum);
            validate_input($password);
            validate_input($repeatPassword);

            // Make sure fields are filled and alert the user if not
            $errors = array();

            if (empty($email)) {
                $errors['email'] = 'Email is required';
            }
            if (empty($firstName)) {
                $errors['first_name'] = 'First name is required';
            }
            if (empty($lastName)) {
                $errors['last_name'] = 'Last name is required';
            }
            if (empty($phoneNum)) {
                $errors['phone_number'] = 'Phone number is required';
            }
            if (empty($password)) {
                $errors['password'] = 'Password is required';
            }
            if (empty($password)) {
                $errors['repeat-password'] = 'Please repeat your password';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email is not a valid email address.';
            }

            // Connect to the database and check if the email address has already been used
            $sql = "SELECT COUNT(*)
                    FROM user
                    WHERE email = :email";


            $stmt = $dbConn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            // If yes send an error to the user
            if ($count > 0) {
                $errors['email'] = 'You already have an account <a href="loginForm.php" >Login here!</a>';
            }

            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
                $errors['repeat-password'] = 'Password must contain at least one uppercase letter, one lowercase letter, and one number.';
            }

            //If all of the inputs are filled and the email address is unique do this!
            if (!count($errors) == 0) {

            //There is errors log them to the screen
                if (isset($errors)){ 
                    foreach ($errors as $error):
                        echo "<p>$error</p>\n";
                    endforeach;
                    exit();
                }
            }
            else
            {
            //Make the password hash take longer to deter hackers. 
            $option = [
                'cost' => 14,
            ];
        
            $hash = password_hash($password, PASSWORD_DEFAULT, $option);


                $insert = "INSERT INTO user (email, first_name, last_name, phone_number, password) 
                VALUES (:email, :first_name, :last_name, :phone_number, :password)";

                $stmt = $dbConn->prepare($insert);

                $stmt->execute(array(

                    ':email' => $email,
                    ':first_name' => $firstName, 
                    ':last_name' => $lastName, 
                    ':phone_number' => $phoneNum, 
                    ':password' => $hash 
                    
                ));
                header('Location: ' .'welcome.php');
            }
        }
    echo endMain();
    echo makeFooter(array(""), "Meal-Fix");
    echo makePageEnd();
?>