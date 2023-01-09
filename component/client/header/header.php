<?php
    if ($_SERVER['REQUEST_URI'] == "") {
        include('utils/db_config.php');
        include('utils/routes.php');
        include('utils/utils.php');
    } else {
        include('../utils/db_config.php');
        include('../utils/routes.php');
        include('../utils/utils.php');
    }
    echo $_SERVER['REQUEST_URI'];
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
    if ($_SERVER['REQUEST_URI'] == "/") {
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
    <!-- FLOWBITE -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    <!-- SCHEDULER -->
    <script src="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.js"></script>
    <link href="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler_material.css" rel="stylesheet" type="text/css" charset="utf-8" />
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
                $(".nav-mobile").removeClass("bg-defaultwhite text-primary bg-opacity-0").addClass("bg-primary text-defaultwhite bg-opacity-100");
                $(".nav-container").removeClass("py-10").addClass("py-5");
                // if (!$(".nav-items a").hasClass("text-secondary")) {
                //     $(".nav-items a").addClass("text-defaultwhite");
                //     $(".burger-menu").addClass("text-defaultwhite");
                // }
            } else {
                $("nav").removeClass("bg-primary text-defaultwhite bg-opacity-100").addClass("bg-defaultwhite text-primary bg-opacity-0");
                $(".nav-mobile").removeClass("bg-primary text-defaultwhite bg-opacity-100").addClass("bg-defaultwhite text-primary");
                $(".nav-container").removeClass("py-5").addClass("py-10");
                $(".nav-items a").removeClass("text-defaultwhite");
                // if (!$(".nav-items a").hasClass("text-secondary")) {
                //     $(".nav-items a").removeClass("text-defaultwhite");
                //     $(".burger-menu").removeClass("text-defaultwhite");
                // }
            }
        });
    </script>

    <style>
        * {
            font-family: "Montserrat", sans-serif;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }
        nav .nav-container ul li.active a {
            color: #7BC228;
        }
    </style>

</head>
<body data-spy="scroll" data-target="mainNav" data-offset="50 class=" bg-defaultwhite block">
    <nav class=" mainNav div-center fixed z-[9999] transition-all duration-300">
        <div class="nav-container justify-between px-5 py-10 transition-all duration-300">
            <div class="logo div-center sm:pl-[50px] flex-col font-black">
                <h1 class="drop-shadow font-Dancing text-[2rem]">G. Verzosa</h1>
                <h5 class="drop-shadow font-Montserrat text-[1rem]">Salon & Spa</5>
            </div>
            <button data-collapse-toggle="navbarr" type="button" onclick="openDrawer()" class="inline-flex sm:pr-[50px] items-center p-2 ml-3 text-md text-gray-500 rounded-lg lg:hidden focus:outline-none" aria-controls="navbarr" aria-expanded="false">
                <i class="fa fa-bars burger-menu text-[24px]" aria-hidden="true"></i>
            </button>
            <ul class="nav-items justify-center items-center gap-[28px] pr-[40px] uppercase hidden lg:flex">
                <?php
                // HOME PAGE
                if ($_SERVER['REQUEST_URI'] == "/") {
                ?>

                    <li class="active home"> <a href="#home" class=" home  hover:cursor-pointer hover:text-secondary transition-color duration-300">Home</a> </li>
                    <li class="about"> <a class="about  hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#about">About Us</a> </li>
                    <li class="services"> <a class="services hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#services">Services</a> </li>
                    <li class="products"> <a class="products hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#products">Products</a> </li>
                    <button id="btn-book" onclick="openBookModal()" class="bg-secondary text-defaultwhite text-[20px] font-bold py-[5px] px-[10px] rounded-md font-Montserrat transition-all duration-300 hover:bg-tertiary">Book Now</button>

                <?php
                } else if ($_SERVER['REQUEST_URI'] == "/pages/login.php") {
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
    <div id="navbarr" class="hidden nav-mobile div-center z-[10] text-[24px] lg:hidden fixed top-0 left-0 bg-white w-screen h-screen">
        <ul class="nav-items justify-center items-center gap-[28px] uppercase flex flex-col h-screen lg:hidden">
            <?php
            // HOME PAGE
            if ($_SERVER['REQUEST_URI'] == "/") {
            ?>
                <li class="active home"> <a onclick="closeDrawer()" class="home hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#home">Home</a></li>
                <li class="about"> <a onclick="closeDrawer()" class="about hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#about">About Us</a></li>
                <li class="services"> <a onclick="closeDrawer()" class="services hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#services">Services</a></li>
                <li class="products"> <a onclick="closeDrawer()" class="products hover:cursor-pointer hover:text-secondary transition-color duration-300" href="#products">Products</a></li>
                <button id="btn-book" onclick="openBookModal1()" class="bg-secondary text-defaultwhite text-[20px] font-bold py-[5px] px-[10px] rounded-md font-Montserrat transition-all duration-300 hover:bg-tertiary">Book Now</button>

            <?php
            } else if ($_SERVER['REQUEST_URI'] == "/pages/login.php") {
            ?>
                <a onclick="closeDrawer()" class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../">Home</a>
                <a onclick="closeDrawer()" class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../#about">About Us</a>
                <a onclick="closeDrawer()" class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../#services">Services</a>
                <a onclick="closeDrawer()" class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../#products">Products</a>
                <button id="btn-book" onclick="openBookModal1()" class="bg-secondary text-defaultwhite text-[20px] font-bold py-[5px] px-[10px] rounded-md font-Montserrat transition-all duration-300 hover:bg-tertiary">Book Now</button>
            <?php
            }
            ?>
        </ul>
    </div>
    <div id="modal-book-now" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action=<?php
                                    if ($_SERVER['REQUEST_URI'] == "/") {
                                        echo './api/post_book.php';
                                    } else {
                                        echo '../../..'.'/api/post_book.php';
                                    }
                                    ?> method="post">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div id="warning" class="mx-5 hidden bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                <p class="font-bold">Be Warned</p>
                                <p id="idp"></p>
                            </div>
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Book an appointment</h1>
                            <label for="fullname">Full Name</label>
                            <input id="fullname" type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="fullname" placeholder="ex. Juan Dela Cruz" required />
                            <label for="email">Email</label>
                            <input id="email" type="email" onkeyup="handleOnChange(this.value)" class="block border border-grey-light w-full p-3 rounded mb-4" name="email" placeholder="ex. youremail@example.com" required />
                            <label for="mobilenumber">Mobile Number</label>
                            <div class='relative w-full'>
                                <div class='absolute top-0 left-0 h-full div-center pl-3 pr-2'>
                                    +63
                                </div>
                                <input id="mobilenumber" type="phone" class="block border border-grey-light w-full p-3 rounded mb-4 pl-12" name="mobilenumber" placeholder="9123456789" pattern="[9]{1}[0-9]{9}" maxlength="10" required />
                            </div>                                                                          
                            <label for="date">Appointment Date</label>
                            <input id="date" type="date" class="block border border-grey-light w-full p-3 rounded mb-4" name="date" placeholder="11/17/2022" min="<?php echo date("Y-m-d"); ?>" required />
                            <label for="time">Appointment Time <br/>(Opening Hours 10:00 am - 9:00 pm)</label>
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
        function handleOnChange(value) {
            // Email validation REGEX
            var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!pattern.test(value)){
                document.getElementById('email').setCustomValidity("Please enter a valid email address (e.g. juan@example.com)");
            }
            else{
                document.getElementById('email').setCustomValidity("");
            }
        }
        function openBookModal() {
            $("#modal-book-now").removeClass("hidden");
        }

        function openBookModal1() {
            $("#modal-book-now").removeClass("hidden");
            $('#navbarr').toggle();
        }

        function closeBookModal() {
            $("#modal-book-now").addClass("hidden");
        }
        function openDrawer() {
            $('#navbarr').toggle();
        }
        function closeDrawer(){
            $('#navbarr').toggle();
           
            //console.log($('#navbarr').attr('aria-expanded'));
            // $("#navbarr").addClass("hidden");
        }
        const pElement = document.querySelector('p');
        const pId = pElement.getAttribute('idp');
        const divElement = document.querySelector('#warning');
        var path = '';
        if (window.location.pathname == "/") {
            path = 'check_time.php';
            
        } else {
            path = '../check_time.php';
            
        }

        document.getElementById('date').addEventListener('change', function() {
            var selectedDate = this.value;
            var selectedTime = document.getElementById('time').value;
            
            if (selectedTime) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', path);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {

                    if (xhr.responseText === "true") {
                        pElement.textContent = "Warning: There are customers who selected this appointment date and time.";
                        divElement.classList.remove('hidden');
                    } else {
                        pElement.textContent = "wala";
                        divElement.classList.add('hidden');
                    }
                };
                xhr.send('selectedDate=' + encodeURIComponent(selectedDate) + '&selectedTime=' + encodeURIComponent(selectedTime));
            }
        });

        document.getElementById('time').addEventListener('change', function() {
            var selectedDate = document.getElementById('date').value;
            var selectedTime = this.value;
            if (selectedDate) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', path);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status == 200) {

                        if (xhr.responseText === "true") {
                            pElement.textContent = "Warning: There are customers who selected this appointment date and time. ";
                            divElement.classList.remove('hidden');
                        } else {
                            pElement.textContent = "";
                            divElement.classList.add('hidden');
                        }


                    }
                };
                xhr.send('selectedDate=' + encodeURIComponent(selectedDate) + '&selectedTime=' + encodeURIComponent(selectedTime));
            }
        });
    </script>


    <script>
        // $(document).ready(function() {
        //     $(window).scroll(function() {
        //         var scroll = $(window).scrollTop();

        //         console.log(scroll)
        //         if (scroll == 0) {
        //             $(".home").css("color", "#7BC228");
        //             $(".services").css("color", "#4B3D40");
        //             $(".products").css("color", "#4B3D40");
        //             $(".about").css("color", "#4B3D40");
        //         } else if (scroll >= 1 && scroll <= 2316) {
        //             $(".home").css("color", "#7BC228");
        //             $(".services").css("color", "#F7FBF1");
        //             $(".products").css("color", "#F7FBF1");
        //             $(".about").css("color", "#F7FBF1");
        //         } else if (scroll >= 3203 && scroll <= 4833) {
        //             $(".home").css("color", "#F7FBF1");
        //             $(".services").css("color", "#F7FBF1");
        //             $(".products").css("color", "#F7FBF1");
        //             $(".about").css("color", "#7BC228");
        //         } else if (scroll >= 4834 && scroll <= 6427) {
        //             $(".home").css("color", "#F7FBF1");
        //             $(".about").css("color", "#F7FBF1");
        //             $(".services").css("color", "#7BC228");
        //             $(".products").css("color", "#F7FBF1");
        //         } else if (scroll >= 6428 && scroll <= 10685) {
        //             $(".home").css("color", "#F7FBF1");
        //             $(".about").css("color", "#F7FBF1");
        //             $(".services").css("color", "#F7FBF1");
        //             $(".products").css("color", "#7BC228");
        //         }
        //     })
        // })


        // const sections = document.querySelectorAll("section");
        // const navLi = document.querySelectorAll("nav .nav-container ul li");
        // window.addEventListener("scroll", () => {
        //     let current = "";
        //     sections.forEach((section) => {
        //         const sectionTop = section.offsetTop;
        //         const sectionHeight = section.clientHeight;
        //         if (pageYOffset >= sectionTop - sectionHeight / 3) {
        //             current = section.getAttribute("id");
        //         }
        //     });

        //     navLi.forEach((li) => {
        //         li.classList.remove("active");
        //         if (li.classList.contains(current)) {
        //             li.classList.add("active");
        //         }
        //     });
        // });


        // $(window).scroll(example);

        // function example() {
        //     var tempScrollTop = $(window).scrollTop();
        //     console.log("Scroll from Top: " + tempScrollTop.toString());
        // };  


        // $(window).scroll(function() {
        //     var position = window.pageYOffset;
        //     $('section').each(function() {
        //         var target = $(this).offset().top;
        //         var id = $(this).attr('id');
        //         var navLinks = $('#navigation ul li a');
        //         console.log('labas', id)
        //         if (position >= target) {
        //             console.log('loob', id)
        //             if (id == 'services2' || id == 'home-section3' || id == 'home' || position == 0) {

        //                 $(".home").css("color", "#7BC228");
        //                 $(".services").css("color", "#F7FBF1");
        //                 $(".products").css("color", "#F7FBF1");
        //                 $(".about").css("color", "#F7FBF1");
        //             } else if (id == 'about' || id == 'about_section2') {
        //                 $(".home").css("color", "#F7FBF1");
        //                 $(".services").css("color", "#F7FBF1");
        //                 $(".products").css("color", "#F7FBF1");
        //                 $(".about").css("color", "#7BC228");
        //             } else if (id == 'services' || id == 'services_section2') {
        //                 $(".home").css("color", "#F7FBF1");
        //                 $(".about").css("color", "#F7FBF1");
        //                 $(".services").css("color", "#7BC228");
        //                 $(".products").css("color", "#F7FBF1");
        //             } else if (id == 'products' || id == 'products_section1') {
        //                 $(".home").css("color", "#F7FBF1");
        //                 $(".about").css("color", "#F7FBF1");
        //                 $(".services").css("color", "#F7FBF1");
        //                 $(".products").css("color", "#7BC228");
        //             } else {
        //                 $(".home").css("color", "#F7FBF1");
        //                 $(".about").css("color", "#F7FBF1");
        //                 $(".services").css("color", "#F7FBF1");
        //                 $(".products").css("color", "#F7FBF1");
        //             }
        //         }
        //     });
        // });
        $(window).scroll(function() {
            const sections = document.querySelectorAll("section");
            const navLi = document.querySelectorAll("nav .nav-container ul li");
            window.addEventListener("scroll", () => {
                let current = "";
                sections.forEach((section) => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (pageYOffset >= sectionTop - sectionHeight / 3) {
                        current = section.getAttribute("id");
                    }
                });

                navLi.forEach((li) => {
                    li.classList.remove("active");
                    if (li.classList.contains(current)) {
                        li.classList.add("active");
                    }
                });
            });

        });
    </script>