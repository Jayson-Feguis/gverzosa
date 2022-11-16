<?php 
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G Verzosa - Salon & Spa</title>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <?php 
         if($_SERVER['REQUEST_URI'] == "/gverzosa/"){
    ?>
            <!-- STYLE -->
            <link rel="stylesheet" type="text/css" href="style/header.css"/>
            <?php
         }
         else{
            ?>
            <!-- STYLE -->
            <link rel="stylesheet" type="text/css" href="../style/header.css"/><?php
         }
    ?>
    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#4B3D40',
            secondary: '#7BC228',
            tertiary: '#A3D469',
            defaultwhite: '#F7FBF1'
          }
        }
      }
    }
  </script>
</head>
<body class="bg-defaultwhite">
    <nav class="div-center bg-defaultwhite sticky">
        <div class="nav-container py-10">
            <div class="logo"> logo</div>
            <ul class="nav-items flex justify-center gap-[28px] uppercase">
                <?php  
                    // HOME PAGE
                    if($_SERVER['REQUEST_URI'] == "/gverzosa/"){
                        ?> 
                        <a class="text-secondary hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">Home</a>
                        <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="<?php echo ABOUT_US ?>">About Us</a>
                        <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="<?php echo SERVICES ?>">Services</a>
                        <?php
                    }
                    // ABOUT US PAGE
                    else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/aboutus.php"){
                        ?>
                        <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../">Home</a>
                        <a class="text-secondary hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">About Us</a>
                        <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../<?php echo SERVICES ?>">Services</a>
                        <?php
                    }
                    // SERVICES PAGE
                    else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/services.php"){
                        ?>
                        <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../">Home</a>
                        <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../<?php echo ABOUT_US ?>">About Us</a>
                        <a class="text-secondary hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">Services</a>
                        <?php
                    }
                ?>
            </ul>
        </div>
    </nav>