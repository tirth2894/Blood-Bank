<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Blood Bank</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>

    <?php
        require_once("connection.php");

        $nameErrMsg = "";
        $emailErrMsg = "";
        $passwordErrMsg = "";
        $errMsg = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $valid = true;
            if (isset($_POST["userName"]) && isset($_POST["userEmail"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])) {
                
                $userName = $_POST["userName"];
                $userEmail = $_POST["userEmail"];
                $password = $_POST["password"];
                $confirmPassword = $_POST["confirmPassword"];

                if (strlen($userName) < 1) {
                    $nameErrMsg = "Invalid Name";
                    $valid = false;
                }

                if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) || strlen($userEmail) < 1) {
                    $emailErrMsg = "Invalid Email";
                    $valid = false;
                }

                if(strlen($password) < 1 || ($password !== $confirmPassword))
                {
                    $passwordErrMsg = "Invalid Password";
                    $valid = false;
                }

                $sql = "SELECT Email FROM user";
                $result = mysqli_query($connection,$sql);
                while ($email = mysqli_fetch_assoc($result)) {
                    if($email["Email"] == $userEmail)
                    {
                        $emailErrMsg = "User already exist";
                        $valid = false;
                        break;
                    }
                }

                if ($valid) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    if (isset($_POST["asBloodBank"]) && ($_POST["asBloodBank"] == "on")) {
                        $role = "BLOOD BANK";
                    }
                    else
                    {
                        $role = "CONTRIBUTOR";
                    }
                 
                    $sql = "INSERT INTO `user` (`Name`, `Email`, `Password`, `Role`) VALUES ('$userName', '$userEmail', '$password', '$role')";
                        
                    if(mysqli_query($connection,$sql))
                    {
                        if ($role == "BLOOD BANK") {
                            header("Location: bloodBankDetail.php");  
                        }
                        else
                        {
                            header("Location: login.php");  
                        }
                    }
                    else{
                        $errMsg = "Something gets Wrong Please try again";
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
        <div class="lg:px-36 md:px-52 sm:px-20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4 text-red-600">Sign up</h1>
            <form action="signup.php" method="POST">
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="userName" class="block text-gray-600">Name</label>
                    <input type="text" id="userName" name="userName" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600" autocomplete="off" >
                    <span class="text-red-600 text-sm"> 
                        <?php echo $nameErrMsg; ?> 
                    </span>
                </div>
                <!-- Email Input -->
                <div class="mb-4">
                    <label for="userEmail" class="block text-gray-600">Email</label>
                    <input type="text" id="userEmail" name="userEmail" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600" autocomplete="off" >
                    <span class="text-red-600 text-sm"> 
                        <?php echo $emailErrMsg; ?> 
                    </span>
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" >
                </div>
                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <label for="confirmPassword" class="block text-gray-600"> Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" >
                    <span class="text-red-600 text-sm"> 
                        <?php echo $passwordErrMsg; ?> 
                    </span>
                </div>
                <!-- As Blood bank Checkbox -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="asBloodBank" name="asBloodBank" class="accent-red-600">
                    <label for="asBloodBank" class="text-gray-600 ml-2">As blood bank</label>
                </div>

                <p class="text-red-600 text-sm text-center mb-3"> 
                        <!-- <?php echo $errMsg; ?>  -->
                </p>

                <!-- Sign up Button -->
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md py-2 px-4 w-full">Sign up</button>
            </form>
            <!-- Sign up  Link -->
            <div class="mt-6 text-red-600 text-center">
                <a href="login.php" class="hover:underline">Login Here</a>
            </div>
        </div>
    </div>
</body>
</html>