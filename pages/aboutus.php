<?php 
    include('../component/client/header/header.php');
?>
<div class="div-center flex-col w-full">
    <section id='about_section1' class="div-center flex-col w-full py-[7rem]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary pb-[50px]">
            History
        </h1>
        <p class="font-Montserrat text-[18px]">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, temporibus ratione pariatur magnam asperiores eos iusto perferendis, voluptatibus blanditiis, iure consequatur molestiae necessitatibus corporis a quasi provident recusandae expedita officia!
            <br />
            <br />
            malesuada non non Morbi nulla, lacus vitae dolor dignissim, tincidunt leo. Ut tempor vehicula, Sed efficitur. Cras Praesent Praesent Nullam volutpat tincidunt 
            <br />
            <br />
            ex facilisis Morbi in elit placerat. porta commodo elit. dolor urna Cras eget diam elit ullamcorper sodales. at maximus lacus, quis faucibus Praesent placerat 
            <br />
            <br />
            orci faucibus efficitur. nisi convallis. libero, vitae maximus quis commodo non massa sit dolor nec nibh vel diam tortor. nec nibh ex nec convallis. at, Nam
        </p>
    </section>
    <section id='about_section2' class="div-center bg-tertiary flex-col w-full py-[7rem]">
        <div class="employees-container div-center flex-col w-full">
            <h1 class="font-Dancing text-[64px] font-bold text-defaultwhite pb-[50px]">
                Employee's Profile
            </h1>
            <div class="div-center flex-wrap gap-[50px]">
                <?php
                    $employees_query = "SELECT * FROM tbl_user Where USER_STATUS = 1";
                    $employees_result = $conn -> query($employees_query);
                    if($employees_result){
                        while($rows = mysqli_fetch_array($employees_result)){
                            echo '<div class="card-container bg-defaultwhite rounded-lg p-[50px] div-center flex-col drop-shadow-md">
                                    <img src="../images/'.$rows['USER_PICTURE'].'" alt="sample" class="rounded-full w-[150px]"/>
                                    <h6 class="text-primary text-[24px]">
                                    '.$rows['USER_FNAME'].' '.$rows['USER_LNAME'].'
                                    </h6>
                                </div>';
                        }
                    }
                ?>
            </div>
        </div>
    </section>
    <section id='about_section3' class="div-center flex-col w-full py-[7rem]">
        <div class="getintouch-container div-center flex-col w-full">
            <h1 class="font-Dancing text-[64px] font-bold text-primary pb-[50px]">
                Get in Touch
            </h1>
            <div class="div-center flex-wrap gap-[50px]">
                <div>
                    <img src="../images/map.png" alt="Location">
                </div>
                <div class="flex flex-col gap-[40px]">
                    <div class="flex items-center">
                        <i class="w-[50px] text-center text-secondary text-[32px] fa fa-map-marker"></i>
                        <h6 class="text-[20px]">244 Kalentong Romualdez St., Brgy. Daang Bakal, Mandaluyong City</h6>
                    </div>
                    <div class="flex items-center">
                        <i class="w-[50px] text-center text-secondary text-[32px] fa fa-envelope"></i>
                        <h6 class="text-[20px]">gverzosasalonandspa@gmail.com</h6>
                    </div>
                    <div class="flex items-center">
                        <i class="w-[50px] text-center text-secondary text-[32px] fa fa-phone"></i>
                        <h6 class="text-[20px]">0977 804 9383</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
<?php 
    include('../component/client/footer/footer.php');
?>