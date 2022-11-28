<?php
include('../component/client/header/header.php');
?>
<style type="text/css">
    #map {
        width: 100px;
        height: 100px;
    }
</style>
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
                $employees_result = $conn->query($employees_query);
                if ($employees_result) {
                    while ($rows = mysqli_fetch_array($employees_result)) {
                        echo '<div class="card-container bg-defaultwhite rounded-lg p-[50px] div-center flex-col drop-shadow-md">
                                    <img src="../images/' . $rows['USER_PICTURE'] . '" alt="sample" class="rounded-full w-[150px]"/>
                                    <h6 class="text-primary text-[24px]">
                                    ' . $rows['USER_FNAME'] . ' ' . $rows['USER_LNAME'] . '
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d766.7361757170355!2d121.05217880038407!3d14.580053770809352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c83f5c33f2b5%3A0xae6f16159cb45cce!2sG.%20Verzosa%20Salon%20%26%20Spa%20For%20Men%20And%20Women!5e1!3m2!1sen!2sph!4v1669553316457!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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