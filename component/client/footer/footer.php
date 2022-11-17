
        <footer class="bg-primary div-center font-Montserrat text-defaultwhite py-[100px]">
            <div class="footer-container flex w-full max-w-[1536px]">
                <div class="logo w-[33%] div-center">LOGO</div>
                <div class="links w-[33%] flex justify-start items-center flex-col">
                    <div class="flex justify-start items-start flex-col gap-[25px]">
                        <h6 class="font-bold">Links</h6>
                        <ul class="nav-link flex flex-col gap-[10px]">
                        <?php  
                            // HOME PAGE
                            if($_SERVER['REQUEST_URI'] == "/gverzosa/"){
                                ?> 
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">Home</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="<?php echo ABOUT_US ?>">About Us</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="<?php echo SERVICES ?>">Services</a>
                                <?php
                            }
                            // ABOUT US PAGE
                            else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/aboutus.php"){
                                ?>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../">Home</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">About Us</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../<?php echo SERVICES ?>">Services</a>
                                <?php
                            }
                            // SERVICES PAGE
                            else if($_SERVER['REQUEST_URI'] == "/gverzosa/pages/services.php"){
                                ?>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../">Home</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="../<?php echo ABOUT_US ?>">About Us</a>
                                <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300" href="">Services</a>
                                <?php
                            }
                        ?>
                        </ul>
                        <h6 class="font-bold pt-[20px]">Are you an admin?</h6>
                        <ul class="nav-link flex flex-col gap-[10px]">
                            <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300">Login as admin</a>
                        </ul>
                    </div>
                </div>
                <div class="links w-[33%] flex justify-center items-start">
                    <div class="flex justify-center items-start flex-col gap-[25px]">
                        <h6 class="font-bold">Social Media</h6>
                        <ul class="social-media  flex flex-col gap-[10px]">
                            <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300">Facebook</a>
                            <a class="hover:cursor-pointer hover:text-secondary transition-all duration-300">Instagram</a>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>