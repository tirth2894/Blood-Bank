<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank - Update Profile</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>

    <?php
        if(isset($_SESSION["email"]))
        {
            require_once("connection.php");

            $sql = "SELECT * FROM user,banks WHERE user.Id = banks.Id AND user.Email = '".$_SESSION["email"]."'";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result);

            $userName =  $row["Name"];
            $userCity =  $row["City"];
            $userState =  $row["State"];
            $userCountry =  $row["Country"];
            $userContact =  $row["Contact_No"];
            $APos =  $row["A_positive"];
            $ANag =  $row["A_nagative"];
            $BPos =  $row["B_positive"];
            $BNag =  $row["B_nagative"];
            $OPos =  $row["O_positive"];
            $ONag =  $row["O_nagative"];
            $ABPos =  $row["AB_positive"];
            $ABNag =  $row["AB_nagative"];

            $nameErrMsg = "";
            $cityErrMsg = "";
            $stateErrMsg = "";
            $countryErrMsg = "";
            $contactErrMsg = "";
            $aPosErrMsg = "";
            $aNagErrMsg = "";
            $bPosErrMsg = "";
            $bNagErrMsg = "";
            $oPosErrMsg = "";
            $oNagErrMsg = "";
            $abPosErrMsg = "";
            $abNagErrMsg = "";
            $errMsg = "";
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $valid = true;
                
                if (isset($_POST["userName"]) && isset($_POST["userCity"]) && isset($_POST["userState"]) && isset($_POST["userCountry"]) && isset($_POST["userContact"]) && isset($_POST["A+"]) && isset($_POST["A-"]) && isset($_POST["B+"]) && isset($_POST["B-"]) && isset($_POST["O+"]) && isset($_POST["O-"]) && isset($_POST["AB+"]) && isset($_POST["AB-"])) {
                    
                    $userName =  $_POST["userName"];
                    $userCity =  $_POST["userCity"];
                    $userState =  $_POST["userState"];
                    $userCountry =  $_POST["userCountry"];
                    $userContact =  $_POST["userContact"];
                    $APos =  $_POST["A+"];
                    $ANag =  $_POST["A-"];
                    $BPos =  $_POST["B+"];
                    $BNag =  $_POST["B-"];
                    $OPos =  $_POST["O+"];
                    $ONag =  $_POST["O-"];
                    $ABPos =  $_POST["AB+"];
                    $ABNag =  $_POST["AB-"];
                    
                    $pattern = "/^^[A-Za-z]+$/i";
                    
                    if(strlen($userName) < 1)
                    {
                        $nameErrMsg = "Invalid User name";
                        $valid = false;
                    }

                    if(strlen($userCity) < 1 || !(preg_match($pattern,$userCity)))
                    {
                        $cityErrMsg = "Invalid city";
                        $valid = false;
                    }   

                    if(strlen($userState) < 1 || !(preg_match($pattern,$userState)))
                    {
                        $stateErrMsg = "Invalid state";
                        $valid = false;
                    }   

                    if(strlen($userCountry) < 1 || !(preg_match($pattern,$userCountry)))
                    {
                        $countryErrMsg = "Invalid Country";
                        $valid = false;
                    }   

                    if($userContact <= 999999999 || $userContact > 10000000000)
                    {
                        $contactErrMsg = "Invalid contact no";
                        $valid = false;
                    }   

                    if($APos < 0)
                    {
                        $aPosErrMsg = "Invalid Quantity";                   
                        $valid = false;
                    }   

                    if($ANag < 0)
                    {
                        $aNagErrMsg = "Invalid Quantity";
                        $valid = false;
                    }   

                    if($BPos < 0)
                    {
                        $bPosErrMsg = "Invalid Quantity";
                        $valid = false;
                    }   

                    if($BNag < 0)
                    {
                        $bNagErrMsg = "Invalid Quantity";
                        $valid = false;
                    }   

                    if($OPos < 0)
                    {
                        $oPosErrMsg = "Invalid Quantity";
                        $valid = false;
                    }   

                    if($ONag < 0)
                    {
                        $oNagErrMsg = "Invalid Quantity";
                        $valid = false;
                    }   

                    if($ABPos < 0)
                    {
                        $abPosErrMsg = "Invalid Quantity";
                        $valid = false;
                    }   

                    if($ABNag < 0)
                    {
                        $abNagErrMsg = "Invalid Quantity";
                        $valid = false;
                    } 
                    
                    if($valid)
                    {
                        $sql = "SELECT Id FROM user WHERE Email = '".$_SESSION["email"]."'";

                        $result = mysqli_query($connection,$sql);
                        $row = mysqli_fetch_assoc($result);

                        $userId = $row["Id"];

                        $sql = "UPDATE user SET Name='$userName' WHERE Id = '".$userId."'";
                        if(mysqli_query($connection,$sql))
                        {
                            header("Location: userProfile.php");
                        }
                        else
                        {
                            $errMsg = "Update Unsuccessfully..";
                        }

                        if ($_SESSION["role"] == "BLOOD BANK") {
                            $sql = "UPDATE banks SET 
                                City = '$userCity',
                                State='$userState',
                                Country='$userCountry',
                                Contact_No='$userContact',
                                A_positive='$APos',
                                A_nagative='$ANag',
                                B_positive='$BPos',
                                B_nagative='$BNag',
                                O_positive='$OPos',
                                O_nagative='$ONag',
                                AB_positive='$ABPos',
                                AB_nagative='$ABNag'
                            WHERE Id = '".$userId."'";
                            
                            if(mysqli_query($connection,$sql))
                            {
                                $msg = "Update Successfully..";
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

    <div class="bg-gray-100 flex justify-center items-center">
        <!-- Left: Image -->
        <div class="w-1/2 hidden lg:block h-screen fixed top-0 left-0">
            <img src="images/background.png" alt="Placeholder Image" class="object-center w-full h-full">
        </div>
        <!-- Right: Login Form -->
        <div class="sticky left-[50%] lg:px-36 md:px-52 sm:px-20 p-8 w-full lg:w-1/2 h-full">
            <h1 class="text-2xl font-semibold text-red-600 mb-3">Details</h1>
            <form action="updateProfile.php" method="POST">

                <!-- Name Input -->
                <div class="mb-4">
                    <label for="userName" class="block text-gray-600">Name</label>
                    <input type="text" id="userName" name="userName"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $userName; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $nameErrMsg; ?>
                    </span>
                </div>

                <!-- City Input -->
                <div class="mb-4">
                    <label for="userCity" class="block text-gray-600">City</label>
                    <input type="text" id="userCity" name="userCity"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $userCity; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $cityErrMsg; ?>
                    </span>
                </div>

                <!-- State Input -->
                <div class="mb-4">
                    <label for="userState" class="block text-gray-600">State</label>
                    <input type="text" id="userState" name="userState"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $userState; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $stateErrMsg; ?>
                    </span>
                </div>

                <!-- Country Input -->
                <div class="mb-4">
                    <label for="userCountry" class="block text-gray-600">Country</label>
                    <input type="text" id="userCountry" name="userCountry"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $userCountry; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $countryErrMsg; ?>
                    </span>
                </div>

                <!-- Contact Input -->
                <div class="mb-4">
                    <label for="userContact" class="block text-gray-600">Contact No</label>
                    <input type="number" id="userContact" name="userContact"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $userContact; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $contactErrMsg; ?>
                    </span>
                </div>

                <!-- A_positive Input -->
                <div class="mb-4">
                    <label for="A+" class="block text-gray-600">Quantity of A+ Blood</label>
                    <input type="number" id="A+" name="A+"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $APos; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $aPosErrMsg; ?>
                    </span>
                </div>

                <!-- A_nagative Input -->
                <div class="mb-4">
                    <label for="A-" class="block text-gray-600">Quantity of A- Blood</label>
                    <input type="number" id="A-" name="A-"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $ANag; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $aNagErrMsg; ?>
                    </span>
                </div>

                <!-- B_positive Input -->
                <div class="mb-4">
                    <label for="B+" class="block text-gray-600">Quantity of B+ Blood</label>
                    <input type="number" id="B+" name="B+"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $BPos; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $bPosErrMsg; ?>
                    </span>
                </div>

                <!-- B_nagative Input -->
                <div class="mb-4">
                    <label for="B-" class="block text-gray-600">Quantity of B- Blood</label>
                    <input type="number" id="B-" name="B-"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $BNag; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $bNagErrMsg; ?>
                    </span>
                </div>

                <!-- O_positive Input -->
                <div class="mb-4">
                    <label for="O+" class="block text-gray-600">Quantity of O+ Blood</label>
                    <input type="number" id="O+" name="O+"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $OPos; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $oPosErrMsg; ?>
                    </span>
                </div>

                <!-- O_nagative Input -->
                <div class="mb-4">
                    <label for="O-" class="block text-gray-600">Quantity of O- Blood</label>
                    <input type="number" id="O-" name="O-"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $ONag; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $oNagErrMsg; ?>
                    </span>
                </div>

                <!-- AB_positive Input -->
                <div class="mb-4">
                    <label for="AB+" class="block text-gray-600">Quantity of AB+ Blood</label>
                    <input type="number" id="AB+" name="AB+"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $ABPos; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $abPosErrMsg; ?>
                    </span>
                </div>

                <!-- AB_nagative Input -->
                <div class="mb-4">
                    <label for="AB-" class="block text-gray-600">Quantity of AB- Blood</label>
                    <input type="number" id="AB-" name="AB-"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off" value="<?php echo $ABNag; ?>">
                    <span class="text-red-600 text-sm">
                        <?php echo $abNagErrMsg; ?>
                    </span>
                </div>
                <p class="text-red-600 text-sm text-center mb-3">
                    <?php echo $errMsg; ?> 
                </p>
                <!-- Submit Button -->
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md py-2 px-4 w-full">Submit</button>
            </form>

        </div>
    </div>
</body>

</html>