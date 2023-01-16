<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
    <link rel="stylesheet" href="styles.css">


<body>
    <main class="center">
        <div class="title">
            <h1>title goes here</h1>
        </div>       

        <div class="boarderBox">
            
            <div class="inputs">
                <form method="POST" class="thing" action="login_query.php">
                    <div name="usernames">
                        <h2>Login</h2>
                        <p class="anchorleft">Email or Username</p>
                        <input type="text" name="username" id="userid" class="wider"/>
                    </div>                 
                    <div>
                        <p class="anchorleft">Password</p>
                        <input type="password" name="password" class="wider" />
                    </div>
                    <?php
                        //checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
                        if(ISSET($_SESSION['error'])){
                            ?>
                            <!-- Display Login Error message -->
                            <div class="alert-danger"><?php echo $_SESSION['error']?></div>
                            <?php
                            //Unsetting the 'error' session after displaying the message. 
                            unset($_SESSION['error']);
                        }
				    ?>



                    <?php
					//checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
                        if(ISSET($_SESSION['success'])){
                            ?>
                            <!-- Display Login Error message -->
                            <div class="account_created"><?php echo $_SESSION['success']?></div>
                            <?php
                            //Unsetting the 'error' session after displaying the message. 
                            unset($_SESSION['success']);
                        }
				    ?>
                    <div class="thing">
                        <button class="button" type="submit"  id="submitBtn" >Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="register_button">
            <P>Haven't got an account? Register below!</P>
            
            <div>
                <a class="new_button" href="register.php" >Register</a>                
            </div>            
        </div>    
    </main>    
</body>
</html>