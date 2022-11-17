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

      $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
          $("nav").removeClass("bg-defaultwhite text-primary bg-opacity-0").addClass("bg-primary text-defaultwhite bg-opacity-100");
          $(".nav-container").removeClass("py-10").addClass("py-5");
          if(!$(".nav-items a").hasClass("text-secondary")){
            $(".nav-items a").addClass("text-defaultwhite");
            alert(hello)
          }
        }
        else{
          $("nav").removeClass("bg-primary text-defaultwhite bg-opacity-100").addClass("bg-defaultwhite text-primary bg-opacity-0");
          $(".nav-container").removeClass("py-5").addClass("py-10");
          $(".nav-items a").removeClass("text-defaultwhite");
          if(!$(".nav-items a").hasClass("text-secondary")){
            $(".nav-items a").removeClass("text-defaultwhite");
          }
        }
      });
    </script>
</head>
<body class="bg-defaultwhite block">
    <nav class="div-center fixed z-[9999] transition-all duration-300">
        <div class="nav-container py-10 transition-all duration-300">
            <div class="logo"> logo</div>
            <ul class="nav-items flex justify-center gap-[28px] uppercase">
                <?php  
                    // HOME PAGE
                    if($_SERVER['REQUEST_URI'] == "/gverzosa/"){
                        ?> 
                        <a class="text-secondary hover:cursor-pointer hover:text-secondary transition-color duration-300" href="">Home</a>
                        <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="<?php echo ABOUT_US ?>">About Us</a>
                        <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="<?php echo SERVICES ?>">Services</a>
                        <?php
                    }
                    // ABOUT US PAGE
                    else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/aboutus.php"){
                        ?>
                        <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../">Home</a>
                        <a class="text-secondary hover:cursor-pointer hover:text-secondary transition-color duration-300" href="">About Us</a>
                        <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../<?php echo SERVICES ?>">Services</a>
                        <?php
                    }
                    // SERVICES PAGE
                    else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/services.php"){
                        ?>
                        <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../">Home</a>
                        <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../<?php echo ABOUT_US ?>">About Us</a>
                        <a class="text-secondary hover:cursor-pointer hover:text-secondary transition-color duration-300" href="">Services</a>
                        <?php
                    }
                    else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/login.php"){
                      ?>
                      <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../">Home</a>
                      <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../<?php echo ABOUT_US ?>">About Us</a>
                      <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="">Services</a>
                      <?php
                  }
                    
                ?>
            </ul>
        </div>
    </nav>