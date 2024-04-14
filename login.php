<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Blood Bank</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <?php
        require_once("connection.php");

        $emailErrMsg = "";
        $passErrMsg = "";
        $errMsg = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            if(isset($_POST["userEmail"]) && isset($_POST["password"]))
            {
                $valid = true;
                $userEmail = $_POST["userEmail"];
                $userPassword = $_POST["password"];

                if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) || strlen($userEmail) < 1) {
                    $emailErrMsg = "Invalid Email";
                    $valid = false;
                }
                
                if(strlen($userPassword) < 1)
                {
                    $passErrMsg = "Enter your password";
                    $valid = false;
                }

                if($valid)
                {
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($connection,$sql);
                    
                    while($row = mysqli_fetch_assoc($result))
                    {
                        if ($row["Email"] === $userEmail) {
                            if(password_verify($userPassword,$row["Password"]))
                            {
                                $_SESSION["name"] = $row["Name"];
                                $_SESSION["email"] = $row["Email"];
                                $_SESSION["role"] = $row["Role"];

                                header("Location: index.php");
                            }
                            else{
                                $passErrMsg = "Password doesn't match";
                            }
                        }
                        else{
                            $errMsg = "User not found";
                        }
                    }
                }
            }

        }

    ?>



    <!-- component -->
    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="images/background.png" alt="Placeholder Image" class="object-cover w-full h-full">
        </div>
        <!-- Right: Login Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4 text-red-600">Login</h1>
            <form action="login.php" method="POST">
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="userEmail" class="block text-gray-600">Email</label>
                    <input type="text" id="userEmail" name="userEmail"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                    <span class="text-red-600 text-sm"> 
                        <?php echo $emailErrMsg; ?> 
                    </span>
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                    <span class="text-red-600 text-sm"> 
                        <?php echo $passErrMsg; ?> 
                    </span>
                </div>
                <!-- Forgot Password Link -->
                <div class="mb-6 text-red-600">
                    <a href="#" class="hover:underline">Forgot Password?</a>
                </div>

                <p class="text-red-600 text-sm text-center mb-3"> 
                        <?php echo $errMsg; ?>  
                </p>
                <!-- Login Button -->
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
            </form>
            <!-- Sign up  Link -->
            <div class="mt-6 text-red-600 text-center">
                <a href="signup.html" class="hover:underline">Sign up Here</a>
            </div>
        </div>
    </div>
</body>

</html>