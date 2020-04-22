<!-- This page will contain a form for user login data. 
If the user is already logged in and they try to access this page, redirect them to home.php.
Otherwise, create a form for the user to login with their username and password. 
Sanitize and validate the data (make sure it's non-empty and valid). 
Use a prepared statement to see if the user exists. 
If they do, store the user's information into $_SESSION and redirect them to home.php. 
If they don't, display a message to let them know that they could not be logged in and make them try again. 
Make sure that your form retains values and use password hashing. 
-->
<?php 

    require_once "connect.php";
    require_once "utilities.php";
    // redirect if already logged in
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
        header("location: home.php");
        exit;
    }

    ## Initial Definition of Variables
    $username = $password = "";
    $username_err = $password = "";

    // myVarDump($_POST, "POST Data");

    // Check if the form gets posted.
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //First, sanitize the POST array.
        $_POST = array_map("sanitize", $_POST);
        // myVarDump($_POST, "POST Array");

        // Was thinking of using a ternary operator, but that wouldn't work because you can't use statements within that operator.
        // Check if all the forms are filled.

        if(empty($_POST['password'])) {
            $password_err = "Please enter a password.";
            echo $password_err;
        } else {
            $password = $_POST['password'];
        }
        if(empty($_POST['username'])) {
            $username_err = "Please enter a username.";
            echo $username_err;
        } else {
            $username = $_POST['username'];
        }

        // Once all the forms are filled, hash the password.
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Verify if the password hash is equal to the original password entered.
        // If it is, setup the query to check if the credentials are accurate.
        if(password_verify($password, $passwordHash)) {

            if ( $statement = $conn -> prepare("SELECT username, password FROM Users WHERE username = ?") ) {
                $statement -> bind_param("s", $_POST['username']);
                $statement -> execute();
    
                // Store the result 
                $statement -> store_result();
                // First, check if there was a user found at all. If so, do the verification process.
                // Else, you will get an error because the user name does not exist in the database.
                if ( $statement -> num_rows > 0 ) {
                    // Bind the results to these new variables that I have created.
                    $statement -> bind_result($dbUserName, $dbPassword);
                    $statement -> fetch();
                    
                    // Check if the password from the database is the same as our password hash we had used.
                    // If it is, you will be logged in to that user. 
                    // Otherwise, you will get an error 

                    if ( password_verify($dbPassword, $passwordHash) ) {
                        echo "yeet! You're logged in!";
                        // session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['username'] = $username;

                        header("location: home.php");
                    } else {
                        echo "bro, why are you trying to log in to someone's account with the wrong password?";
                    }

                } else {
                    echo "this username does not exist bruh what are you doing with your life";
                }
                $statement -> close();
            }

        } else {
            echo("This is not a valid password!");
        }
        
        // Else, Redirect them back to the login page.

        // $passwordString = mysqli_real_escape_string($_POST['password']);
        // $passwordHash = password_hash($passwordString,PASSWORD_BCRYPT);

        // if(password_verify($passwordString, $passwordHash)) {
            
        // } else {
        //     echo "Incorrect Password bro!";
        // }
    }
?>
<!DOCTYPE HTML>
    <html>
        <?php require_once "head.php"; ?>
    <body>
        <form method = "POST">
                <div class="form-group">
                    <label for ="username"> User Name : </label> 
                    <input type = "text" class = "form-control" name = "username" id = "username"> </br>
                </div>
                <div class = "form-group">
                    <label for = "password"> Password : </label>
                    <input type = "text" class = "form-control" name = "password" id = "password"> </br>
                </div>
                    <button type = "submit" class = "btn btn-primary"> Login </button>
        </form>
        
    <?php require_once "footer.php"; ?>