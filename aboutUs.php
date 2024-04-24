<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Blood Bank - About Us</title>
</head>

<body>
    <?php
        if(isset($_SESSION["email"]))
        {
            // Navbar
            require_once("navbar.php");        
        }
        else
        {
            header("Location:login.php");
        }

    ?>

    <section class="bg-gray-100 py-14 pb-0">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">About Us</h2>
            <p class="text-gray-700 leading-relaxed text-lg">
                Welcome to Homo-Track, your trusted partner in saving lives through efficient blood management. We are
                dedicated to ensuring a seamless process for blood donation, collection, storage, and distribution. Our
                mission is to connect donors with recipients, ensuring timely access to safe blood products.
            </p>
            <p class="text-gray-700 leading-relaxed text-lg mt-4">
                With cutting-edge technology and a passionate team, we strive to make a meaningful impact in healthcare
                by bridging the gap between blood donors and patients in need. Join us in our mission to make a
                difference and save lives.
            </p>
        </div>


    </section>
    <section class="bg-gray-100 px-14 py-14">
        <div class="container mx-auto ">
            <div >
                <p class="text-gray-700 leading-relaxed text-lg">
                    Have questions or inquiries? Feel free to reach out to us through the following channels:
                </p>
                <div class="mt-8">
                    <p class="text-lg font-bold">Email:</p>
                    <p class="text-gray-700">tirthptl2894@gmail.com</p>
                </div>
                <div class="mt-4">
                    <p class="text-lg font-bold">Phone:</p>
                    <p class="text-gray-700">+91 9924062681</p>
                </div>
            </div>
        </div>
    </section>

    <?php
        // Footer
        require_once("footer.php")
    ?>
</body>

</html>