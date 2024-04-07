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
        // Navbar
        require_once("components/navbar.php");        
    ?>

    <!-- Form -->
    <div class="flex items-center justify-between flex-col bg-gray-100 p-4 m-[0.3rem]">
    <h1 class="font-semibold my-10 text-xl text-red-600 text-center">Change Paasword</h1>
        <div class="mx-auto w-full max-w-[550px]">
            <form action="" method="POST">
                <div class="mb-5">
                    <label for="oldPaaword" class="mb-3 block text-base font-medium text-gray-600"> Old Password </label>
                    <input type="password" name="oldPaaword" id="oldPaaword" placeholder="Old Password" class="w-full rounded-md border border-[#e0e0e0] bg-white p-3 text-base outline-none focus:border-red-600 focus:shadow-md" />
                </div>
                
                <div class="mb-5">
                    <label for="newPassword" class="mb-3 block text-base font-medium text-gray-600"> New Password </label>
                    <input type="password" name="newPassword" id="newPassword" placeholder="New Password" class="w-full rounded-md border border-[#e0e0e0] bg-white p-3 text-base  outline-none focus:border-red-600 focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="confirmNewPassword" class="mb-3 block text-base font-medium text-gray-600"> Confirm New Password </label>
                    <input type="password" name="confirmNewPassword" id="confirmNewPassword" placeholder="Confirm New Password" class="w-full rounded-md border border-[#e0e0e0] bg-white p-3 text-base outline-none focus:border-red-600 focus:shadow-md" />
                </div>

                <div>
                    <button class="hover:shadow-form rounded-md bg-red-600 py-3 px-8 text-base font-semibold text-white outline-none"> Submit </button>
                </div>
            </form>
        </div>
    </div>
    
    <?php
        // Footer
        require_once("components/footer.php")
    ?>
</body>

</html>