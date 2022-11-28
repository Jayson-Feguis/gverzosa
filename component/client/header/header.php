<?php
if ($_SERVER['REQUEST_URI'] == "/gverzosa/") {
    include('utils/db_config.php');
    include('utils/routes.php');
} else {
    include('../utils/db_config.php');
    include('../utils/routes.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>G Verzosa - Salon & Spa</title>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <!-- SWIPER JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <?php
    if ($_SERVER['REQUEST_URI'] == "/gverzosa/") {
    ?>
        <!-- STYLE -->
        <link rel="stylesheet" type="text/css" href="style/header.css" />
        <!-- SCRIPT -->
        <script src="/script/client.js"></script>
    <?php
    } else {
    ?>
        <!-- STYLE -->
        <link rel="stylesheet" type="text/css" href="../style/header.css" />
        <!-- SCRIPT -->
        <script src="../script/client.js"></script>
    <?php
    }
    ?>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/a1cbcf93f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#4B3D40",
                        secondary: "#7BC228",
                        tertiary: "#A3D469",
                        defaultwhite: "#F7FBF1",
                    },
                },
                fontFamily: {
                    Montserrat: ["Montserrat", "serif"],
                    Dancing: ["Dancing Script", "cursive"],
                },
            },
        };

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 100) {
                $("nav").removeClass("bg-defaultwhite text-primary bg-opacity-0").addClass("bg-primary text-defaultwhite bg-opacity-100");
                $(".nav-container").removeClass("py-10").addClass("py-5");
                if (!$(".nav-items a").hasClass("text-secondary")) {
                    $(".nav-items a").addClass("text-defaultwhite");
                    alert(hello)
                }
            } else {
                $("nav").removeClass("bg-primary text-defaultwhite bg-opacity-100").addClass("bg-defaultwhite text-primary bg-opacity-0");
                $(".nav-container").removeClass("py-5").addClass("py-10");
                $(".nav-items a").removeClass("text-defaultwhite");
                if (!$(".nav-items a").hasClass("text-secondary")) {
                    $(".nav-items a").removeClass("text-defaultwhite");
                }
            }
        });
    </script>

</head>

<body class="bg-defaultwhite block">
    <nav class="div-center fixed z-[9999] transition-all duration-300">
        <div class="nav-container py-10 transition-all duration-300">
            <div class="logo div-center flex-col font-black">
                <h1 class="font-Dancing text-[2rem]">G. Verzosa</h1>
                <h5 class="font-Montserrat text-[1rem]">Salon & Spa</5>
            </div>
            <ul class="nav-items flex justify-center items-center gap-[28px] uppercase">
                <?php
                // HOME PAGE
                if ($_SERVER['REQUEST_URI'] == "/gverzosa/") {
                ?>
                    <a class=" hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#home">Home</a>
                    <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#about">About Us</a>
                    <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#services">Services</a>
                    <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#products">Products</a>
                    <button id="btn-book" onclick="openBookModal()" class="bg-secondary text-defaultwhite text-[20px] font-bold py-[5px] px-[10px] rounded-md font-Montserrat transition-all duration-300 hover:bg-tertiary">Book Now</button>

                <?php
                } else if ($_SERVER['REQUEST_URI'] == "/gverzosa/pages/login.php") {
                ?>
                    <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../">Home</a>
                    <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../#about">About Us</a>
                    <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../#services">Services</a>
                    <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../#products">Products</a>
                    <button id="btn-book" onclick="openBookModal()" class="bg-secondary text-defaultwhite text-[20px] font-bold py-[5px] px-[10px] rounded-md font-Montserrat transition-all duration-300 hover:bg-tertiary">Book Now</button>
                <?php
                }

                ?>
            </ul>
        </div>
    </nav>
    <div id="modal-book-now" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action=<?php
                                    if ($_SERVER['REQUEST_URI'] == "/gverzosa/") {
                                        echo './api/post_book.php';
                                    } else {
                                        echo '../../../gverzosa/api/post_book.php';
                                    }
                                    ?> method="post">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Book an appointment</h1>
                            <label for="fullname">Full Name</label>
                            <input id="fullname" type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="fullname" placeholder="ex. Juan Dela Cruz" required />
                            <label for="email">Email</label>
                            <input id="email" type="email" class="block border border-grey-light w-full p-3 rounded mb-4" name="email" placeholder="ex. youremail@example.com" required />
                            <label for="mobilenumber">Mobile Number</label>
                            <input id="mobilenumber" type="phone" class="block border border-grey-light w-full p-3 rounded mb-4" name="mobilenumber" placeholder="09123456789" pattern="[0,9]{2}[0-9]{9}" required />
                            <label for="date">Appointment Date</label>
                            <input id="date" type="date" class="block border border-grey-light w-full p-3 rounded mb-4" name="date" placeholder="11/17/2022" min="<?php echo date("Y-m-d"); ?>" required />
                            <label for="time">Appointment Time (opening hours 10:00 - 21:00)</label>
                            <input id="time" type="time" list="times" class="block border border-grey-light w-full p-3 rounded mb-4" name="time" placeholder="09:00" required />

                            <datalist id="times">
                                <option>10:00:00</option>
                                <option>10:30:00</option>
                                <option>11:00:00</option>
                                <option>11:30:00</option>
                                <option>12:00:00</option>
                                <option>12:30:00</option>
                                <option>13:00:00</option>
                                <option>13:30:00</option>
                                <option>14:00:00</option>
                                <option>14:30:00</option>
                                <option>15:00:00</option>
                                <option>16:30:00</option>
                                <option>17:00:00</option>
                                <option>17:30:00</option>
                                <option>18:00:00</option>
                                <option>18:30:00</option>
                                <option>19:00:00</option>
                                <option>19:30:00</option>
                                <option>20:00:00</option>
                                <option>20:30:00</option>
                                <option>21:00:00</option>
                            </datalist>
                            <label for="service">What kind of service we'll set up for you?</label>
                            <select name="service" id="service" class="block border border-grey-light w-full p-3 rounded mb-4">
                                <?php
                                $services_query = "SELECT SERVICE_ID, SERVICE_NAME FROM tbl_service Where SERVICE_STATUS = 1";
                                $services_result = $conn->query($services_query);
                                if ($services_result) {
                                    while ($rows = mysqli_fetch_array($services_result)) {
                                        echo '<option value="' . $rows['SERVICE_ID'] . '">' . $rows['SERVICE_NAME'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="book" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                            <button type="button" onclick="closeBookModal()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openBookModal() {
            $("#modal-book-now").removeClass("hidden");
        }

        function closeBookModal() {
            $("#modal-book-now").addClass("hidden");
        }
    </script>