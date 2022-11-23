<?php 
function loginUrl(){
    if($_SERVER['REQUEST_URI'] == "/gverzosa/"){
        return "gverzosa/pages/login.php";
    }
    else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/login.php") {
        return "pages/login.php";
    }
    else {
        return "pages/login.php";
    }
    
}

?>

        <footer class="bg-primary div-center font-Montserrat text-defaultwhite md:py-[100px]">
            <div class="footer-container flex flex-wrap w-full max-w-[1536px] py-[30px]">
                <div class="logo w-full md:w-[33%] div-center flex-col font-black">
                    <h1 class="font-Dancing text-[2rem]">G. Verzosa</h1>
                    <h5 class="font-Montserrat text-[2rem]">Salon & Spa</h5>
                    <button id="btn-book" onclick="openBookModal()" class="bg-secondary mt-5 text-defaultwhite text-[20px] font-bold py-[5px] px-[10px] rounded-md font-Montserrat transition-all duration-300 hover:bg-tertiary">Book Now</button>
                </div>
                <div class="links w-full sm:w-[50%] md:w-[33%] flex justify-start items-center flex-col py-[30px]">
                    <div class="flex justify-start items-start flex-col gap-[25px] w-[170px]">
                        <h6 class="font-bold">Links</h6>
                        <ul class="nav-link flex flex-col gap-[10px]">
                        <?php  
                            // HOME PAGE
                            if($_SERVER['REQUEST_URI'] == "/gverzosa/"){
                                ?> 
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">Home</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="<?php echo ABOUT_US ?>">About Us</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="<?php echo SERVICES ?>">Services</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../<?php echo PRODUCTS ?>">Products</a>
                                <?php
                            }
                            // ABOUT US PAGE
                            else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/aboutus.php"){
                                ?>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../">Home</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">About Us</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../<?php echo SERVICES ?>">Services</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../<?php echo PRODUCTS ?>">Products</a>
                                <?php
                            }
                            // SERVICES PAGE
                            else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/services.php"){
                                ?>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../">Home</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../<?php echo ABOUT_US ?>">About Us</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">Services</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../<?php echo PRODUCTS ?>">Products</a>
                                <?php
                            }
                            else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/products.php"){
                                ?>
                                <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../">Home</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../<?php echo ABOUT_US ?>">About Us</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="../<?php echo SERVICES ?>">Services</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-color duration-300" href="">Products</a>
                                <?php
                              }
                        ?>
                        </ul>
                        <h6 class="font-bold pt-[20px]">Are you an admin?</h6>
                        <ul class="nav-link flex flex-col gap-[10px]">
                            <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300 " href="../<?php echo loginUrl();?>">Login as admin</a>
                        </ul>
                    </div>
                </div>
                <div class="links w-full sm:w-[50%] md:w-[33%] flex justify-center items-start py-[30px]">
                    <div class="flex justify-center items-start flex-col gap-[25px] w-[170px]">
                        <h6 class="font-bold">Social Media</h6>
                        <ul class="social-media  flex flex-col gap-[10px]">
                            <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300">
                                <i class="fa fa-facebook w-[20px] text-center" aria-hidden="true"></i>
                                <span>Facebook</span>
                            </a>
                            <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300">
                                <i class="fa fa-instagram w-[20px] text-center" aria-hidden="true"></i>
                                <span>Instagram</span>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>