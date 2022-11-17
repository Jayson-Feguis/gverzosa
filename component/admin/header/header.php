
<!-- sssss -->


<?php 

session_start();
if (!isset($_SESSION['user_name'])) {
    
    header('location: login.php');
}

if (isset($_GET['logout'])) {
  //session_destroy();
  unset($_SESSION['user_name']);
  header("location: login.php");
}


    if($_SERVER['REQUEST_URI'] == "/gverzosa/"){
        include('utils/db_config.php');
        include('utils/routes.php');
    }else{
        include('../utils/db_config.php');
        include('../utils/routes.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <title>G Verzosa - Salon & Spa</title>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
   <!-- SWIPER JS -->
   <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
   <?php 
         if($_SERVER['REQUEST_URI'] == "/gverzosa/"){
    ?>
            <!-- STYLE -->
            <link rel="stylesheet" type="text/css" href="style/header.css"/>
             <!-- SCRIPT -->
            <script src="/script/client.js"></script>
            <?php
         }
         else{
            ?>
            <!-- STYLE -->
            <link rel="stylesheet" type="text/css" href="../style/header.css"/>
             <!-- SCRIPT -->
            <script src="../script/client.js"></script>
            <?php
         }
    ?>
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com" ></script>
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

    </script>
</head>
<body class="bg-defaultwhite block">
  
<nav class="bg-secondary">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
  <a  class="flex items-center">
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
</nav>