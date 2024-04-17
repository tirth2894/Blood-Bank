<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank - Change Password</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <?php

        if (isset($_SESSION["email"])) {
            // Navbar
            require_once("navbar.php"); 
            require_once("connection.php"); 

            $oldPasswordErrMsg = "";
            $newPasswordErrMsg = "";
            $Msg = "";
            $errMsg = "";

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                
                if(isset($_POST["oldPassword"]) && isset($_POST["newPassword"]) && isset($_POST["confirmNewPassword"]))
                {
                    $oldPassword = $_POST["oldPassword"];
                    $newPassword = $_POST["newPassword"];
                    $newConfirmPassword = $_POST["confirmNewPassword"];
                    $valid = true;

                    if(strlen($oldPassword) < 1)
                    {
                        $oldPasswordErrMsg = "Invalid Password";
                        $valid = false;
                    }

                    if(strlen($newPassword) < 1 || strlen($newConfirmPassword) < 1)
                    {
                        $newPasswordErrMsg = "Invalid Password";
                        $valid = false;
                    }
                    elseif($newPassword != $newConfirmPassword)
                    {
                        $newPasswordErrMsg = "Password doesn't match";
                        $valid = false;
                    }

                    if($valid)
                    {
                        $sql = "SELECT * FROM user WHERE Email = '".$_SESSION['email']."'";
                        $result = mysqli_query($connection,$sql);
                        $row = mysqli_fetch_assoc($result);

                        if(mysqli_num_rows($result) < 1)
                        {
                            $errMsg = "User not found";
                        }
                        elseif(password_verify($oldPassword,$row["Password"]))
                        {
                            $newConfirmPassword = password_hash($newConfirmPassword, PASSWORD_DEFAULT);
                            $sql = "UPDATE user SET Password='$newConfirmPassword' WHERE Email = '".$_SESSION["email"]."'";
                            
                            if(mysqli_query($connection,$sql))
                            {
                                $Msg = "Update Successfully..";
                            }   
                            else
                            {
                                $errMsg = "Update Unsuccessfully..";
                            }
                        }

                    }
                }
                
            }
        }
        else
        {
            header("Location: login.php");
        }
    ?>

    <!-- Form -->
    <div class="flex items-center justify-between flex-col bg-gray-100 p-4 m-[0.3rem]">
    <h1 class="font-semibold my-10 text-xl text-red-600 text-center">Change Paasword</h1>
        <div class="mx-auto w-full max-w-[550px]">
            <form action="changePassword.php" method="POST">
                <div class="mb-5">
                    <label for="oldPassword" class="mb-3 block text-base font-medium text-gray-600"> Old Password </label>
                    <input type="password" name="oldPassword" id="oldPassword" placeholder="Old Password" class="w-full rounded-md border border-[#e0e0e0] bg-white p-3 text-base outline-none focus:border-red-600 focus:shadow-md" />
                    <span class="text-red-600 text-sm"> 
                        <?php echo $oldPasswordErrMsg; ?> 
                    </span>
                </div>
                
                <div class="mb-5">
                    <label for="newPassword" class="mb-3 block text-base font-medium text-gray-600"> New Password </label>
                    <input type="password" name="newPassword" id="newPassword" placeholder="New Password" class="w-full rounded-md border border-[#e0e0e0] bg-white p-3 text-base  outline-none focus:border-red-600 focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="confirmNewPassword" class="mb-3 block text-base font-medium text-gray-600"> Confirm New Password </label>
                    <input type="password" name="confirmNewPassword" id="confirmNewPassword" placeholder="Confirm New Password" class="w-full rounded-md border border-[#e0e0e0] bg-white p-3 text-base outline-none focus:border-red-600 focus:shadow-md" />
                    <span class="text-red-600 text-sm"> 
                        <?php echo $newPasswordErrMsg; ?> 
                    </span>
                </div>
                <p class="text-green-700 text-base text-center mb-3"> 
                    <?php echo $Msg; ?>  
                </p>
                <p class="text-red-600 text-base text-center mb-3"> 
                    <?php echo $errMsg; ?>  
                </p>
                <div>
                    <button class="hover:shadow-form rounded-md bg-red-600 py-3 px-8 text-base font-semibold text-white outline-none"> Submit </button>
                </div>
            </form>
        </div>
    </div>
    
    <?php
        // Footer
        require_once("footer.php")
    ?>
</body>

</html>