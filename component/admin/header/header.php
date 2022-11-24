<?php
include('../utils/db_config.php');
include('../utils/routes.php');
if (!isset($_SESSION['user_name'])) {
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_name']);
    header("location: login.php");
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
    <!-- SCHEDULER -->
    <script src="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.js"></script>
    <link href="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler_material.css" rel="stylesheet" type="text/css" charset="utf-8" />
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/a1cbcf93f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- FLOWBITE (SIDEBAR) -->
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- DATATABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                scrollX: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                responsive: true
            });

        });
        $(document).ready(function() {
            $('#data-table-audit').DataTable({
                scrollX: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

        });
    </script>
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
            },
            fontFamily: {
                Montserrat: ["Montserrat", "serif"],
                Dancing: ["Dancing Script", "cursive"],
            },
        };
    </script>
    <style>
        html,
        body {
            margin: 0px;
            padding: 0px;
            height: 100%;
            overflow: hidden;
        }

        .dataTables_length select {
            width: 60px;
        }
    </style>
</head>

<body class="bg-defaultwhite block flex">
    <nav class="bg-secondary fixed z-[5]">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"><?php echo $_SESSION['user_name']; ?></span>
            </a>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 ">
                    <li>
                        <a href="logout.php" name="logout" class="block bg-secondary px-4 py-2 text-sm text-white rounded-lg hover:bg-white hover:text-black ">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- top: 0;
    bottom:0;
    position:fixed;
    overflow-y:scroll;
    overflow-x:hidden; -->
    </nav>
    <div class="w-60 min-h-full shadow-md bg-white inset-y-0 fixed overflow-y-auto overflow-x-hidden pt-[100px] z-[4]" id="sidenavSecExample">
        <div class="pt-4 pb-2 px-6">
            <a href="#!">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img src="https://img.icons8.com/fluency/48/null/test-account.png" title="user icons" class="rounded-full w-10" alt="Avatar">
                    </div>
                    <div class="grow ml-3">
                        <p class="text-sm font-semibold text-blue-600"><?php echo  $_SESSION['fname_name'] . " " . $_SESSION['lname_name']; ?></p>
                    </div>
                </div>
            </a>
        </div>
        <ul class="relative">
            <li>
                <a href="admin_dashboard.php" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">
                    <img src="https://img.icons8.com/dusk/512/combo-chart--v1.png" width="30px" height="30px" /> <span class="flex-1 ml-3 text-left whitespace-nowrap">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="relative">
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="https://img.icons8.com/fluency/48/null/overtime.png" width="30px" height="30px" /> <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Appointment</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="admin_appointment.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Appointment</a>
                    </li>
                    <li>
                        <a href="admin_appointment_report.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Report</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100" aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                    <img src="https://img.icons8.com/fluency/48/null/home-salon.png" width="30px" height="30px" />
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Web Information</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                    <li>
                        <a href="admin_customer.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Customers</a>
                    </li>
                    <li>
                        <a href="admin_feedback.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Feedback</a>
                    </li>
                    <li>
                        <a href="admin_product.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Products</a>
                    </li>
                    <li>
                        <a href="admin_promotion.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Promotions</a>
                    </li>
                    <button type="button" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100" aria-controls="dropdown-example4" data-collapse-toggle="dropdown-example4">
                        <span class="flex-1 text-left whitespace-nowrap" sidebar-toggle-item>Services</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-example4" class="hidden py-2  pl-7 space-y-2">
                        <li>
                            <a href="admin_category.php" class="flex items-center p-2 pl-7 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Category</a>
                        </li>
                        <li>
                            <a href="admin_service.php" class="flex items-center p-2 pl-7 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Sub Category</a>
                        </li>
                    </ul>
                    <li>
                        <a href="admin_user.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Users</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100" aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                    <img src="https://img.icons8.com/fluency/48/null/settings.png" width="30px" height="30px" />
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Settings</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example3" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Archive</a>
                    </li>
                    <li>
                        <a href="admin_backup.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Backup</a>
                    </li>
                    <li>
                        <a href="admin_log.php" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100">Logs</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>