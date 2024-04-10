<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Blood Bank</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <!-- component -->
    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="images/background.png" alt="Placeholder Image" class="object-cover w-full h-full">
        </div>
        <!-- Right: Login Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4 text-red-600">Sign up</h1>
            <form action="#" method="POST">
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="userName" class="block text-gray-600">Name</label>
                    <input type="text" id="userName" name="userName" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600" autocomplete="off">
                </div>
                <!-- Email Input -->
                <div class="mb-4">
                    <label for="userEmail" class="block text-gray-600">Email</label>
                    <input type="email" id="userEmail" name="userEmail" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600" autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>
                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <label for="confirmPassword" class="block text-gray-600"> Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>
                <!-- As Blood bank Checkbox -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="accent-red-600">
                    <label for="remember" class="text-gray-600 ml-2">As blood bank</label>
                </div>
                <!-- Login Button -->
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md py-2 px-4 w-full">Sign up</button>
            </form>
            <!-- Sign up  Link -->
            <div class="mt-6 text-red-600 text-center">
                <a href="login.html" class="hover:underline">Login Here</a>
            </div>
        </div>
    </div>
</body>
</html>