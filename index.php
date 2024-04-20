<?php
    session_start();

    if (!(isset($_SESSION["name"]) && isset($_SESSION["email"]) && isset($_SESSION["role"]))) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <?php
        // Navbar
        require_once("navbar.php"); 
        require_once("connection.php");

    ?>
    
    <!-- Slider -->
    <div class="order-2 h-[58vh] w-full overflow-hidden flex flex-nowrap text-center " id="slider">
        <div class="bg-blue-600 text-white space-y-4 flex-none w-full flex flex-col items-center justify-center">
            <img src="images/slider2.png" alt="" class="w-full h-full">    
        </div>
        <div class="bg-pink-400 text-white space-y-4 flex-none w-full flex flex-col items-center justify-center">
            <img src="images/silde3.png" alt="" class="w-full h-full">    
        </div>
        <div class="bg-teal-500 text-white space-y-4 flex-none w-full flex flex-col items-center justify-center">
            <img src="images/slider4.jpeg" alt="" class="w-full h-full">    
        </div>
    </div>

    <!-- Trusted BY -->
    <h2 class="font-semibold my-5 text-secondary-dark text-red-600 text-3xl text-center">Trusted By</h2>
    <div class="w-full max-w-full flex justify-evenly items-center flex-wrap px-3 my-3 mx-auto bg-white">
        
        <div class="relative my-4 bg-[#f52727] text-white flex flex-col w-56 break-words bg-clip-border rounded-2xl draggable shadow-lg shadow-slate-600 hover:shadow-xl hover:bg-red-600 hover:shadow-slate-600 transition-shadow"
            draggable="true">
            <!-- card body  -->
            <div class="flex flex-col items-start justify-between flex-auto py-8 px-9">
                <div class="flex flex-col my-7">
                    <span class="text-secondary-inverse text-4xl tracking-[-0.115rem] font-bold text-center">
                        <?php
                            $sql = "SELECT count(*) FROM user WHERE Role = 'BLOOD BANK'";
                            $result = mysqli_query($connection,$sql);

                            $row = mysqli_fetch_assoc($result);

                            echo $row["count(*)"]."+";
                        ?>
                    </span>
                    <p class="font-medium my-2 text-secondary-dark text-2xl">Blood Banks</p>
                </div>
            </div>
            <!-- end card body  -->
        </div>
        <div class="relative my-4 bg-[#f52727] text-white flex flex-col w-56 break-words bg-clip-border rounded-2xl draggable shadow-lg shadow-slate-600 hover:shadow-xl hover:bg-red-600 hover:shadow-slate-600 transition-shadow"
            draggable="true">
            <!-- card body  -->
            <div class="flex flex-col items-start justify-between flex-auto py-8 px-9">
                <div class="flex flex-col my-7">
                    <span class="text-secondary-inverse text-4xl tracking-[-0.115rem] font-bold text-center">
                        <?php
                            $sql = "SELECT count(*) FROM user WHERE Role = 'CONTRIBUTOR'";
                            $result = mysqli_query($connection,$sql);

                            $row = mysqli_fetch_assoc($result);

                            echo $row["count(*)"]."+";
                        ?>
                    </span>
                    <p class="font-medium my-2 text-secondary-dark text-2xl">Contributors</p>
                </div>
            </div>
            <!-- end card body  -->
        </div>
        <!-- <div class="relative my-4 bg-[#f52727] text-white flex flex-col w-56 break-words bg-clip-border rounded-2xl draggable shadow-lg shadow-slate-600 hover:shadow-xl hover:bg-red-600 hover:shadow-slate-600 transition-shadow"
            draggable="true">
            <div class="flex flex-col items-start justify-between flex-auto py-8 px-9">
                <div class="flex flex-col my-7">
                    <span class="text-secondary-inverse text-4xl tracking-[-0.115rem] font-bold">590k+</span>
                    <p class="font-medium my-2 text-secondary-dark text-2xl">Recievers</p>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Compatible Blood -->
    <div class="flex items-center justify-between flex-col">
        <h2 class="font-semibold my-5 text-secondary-dark text-red-600 text-3xl text-center">Compatible Blood</h2>
        <div class="overflow-x-auto mt-3 mx-1 bg-red-600 rounded-3xl">
            <table class="min-w-full text-base bg-red-600 text-white">
                <thead>
                    <tr class="bg-blue-gray-100 text-gray-700">
                        <th class="py-3 px-4 text-left text-white border-2 border-blue-gray-200">Blood Type</th>
                        <th class="py-3 px-4 text-left text-white border-2 border-blue-gray-200">Donate Blood To</th>
                        <th class="py-3 px-4 text-left text-white border-2 border-blue-gray-200">Receive Blood From</th>
                    </tr>
                </thead>
                <tbody class="text-blue-gray-900 ">
                    <tr class="border-2 border-blue-gray-200" >
                        <td class="py-3 px-4 font-bold border-2 border-blue-gray-200">A+</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">A+ AB+</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">A+ A- O+ O-</td>
                    </tr>
                    <tr class="border-2 border-blue-gray-200">
                        <td class="py-3 px-4 font-bold border-2 border-blue-gray-200">O+</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">O+ A+ B+ AB+</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">O+ O-</td>
                    </tr>
                    <tr class="border-2 border-blue-gray-200">
                        <td class="py-3 px-4 font-bold border-2 border-blue-gray-200">B+</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">B+ AB+</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">B+ B- O+ O-</td>
                    </tr>
                    <tr class="border-2 border-blue-gray-200">
                        <td class="py-3 px-4 font-bold border-2 border-blue-gray-200">AB+</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">AB+</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">Everyone</td>
                    </tr>
                    <tr class="border-2 border-blue-gray-200">
                        <td class="py-3 px-4 font-bold border-2 border-blue-gray-200">A-</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">A+ A- AB+ AB-</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">A- O-</td>
                    </tr>
                    <tr class="border-2 border-blue-gray-200">
                        <td class="py-3 px-4 font-bold border-2 border-blue-gray-200">O-</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">Everyone</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">O-</td>
                    </tr>
                    <tr class="border-2 border-blue-gray-200">
                        <td class="py-3 px-4 font-bold border-2 border-blue-gray-200">B-</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">B+ B- AB+ AB-</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">B- O-</td>
                    </tr>
                    <tr class="border-2 border-blue-gray-200">
                        <td class="py-3 px-4 font-bold border-2 border-blue-gray-200">AB-</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">AB+ AB-</td>
                        <td class="py-3 px-4 border-2 border-blue-gray-200">AB- A- B- O-</td>
                    </tr>
                </tbody>
            </table>        
        </div>
    </div>

    <?php
        // Footer
        require_once("footer.php")
    ?>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.querySelector('#slider');
        setTimeout(function moveSlide() {
            const max = slider.scrollWidth - slider.clientWidth;
            const left = slider.clientWidth;

            if (max === slider.scrollLeft) {
                slider.scrollTo({ left: 0, behavior: 'smooth' })
            } else {
                slider.scrollBy({ left, behavior: 'smooth' })
            }

            setTimeout(moveSlide, 2000)
        }, 2000)
    });
</script>
</html>