<?php 
    include('component/client/header/header.php');
?>
<style>
    .swiper {
    width: 100%;
    padding-top: 50px;
    padding-bottom: 50px;
    }
    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 300px !important;
    }
    .swiper-slide img {
    display: block;
    width: 100%;
    }
</style>
<?php 
    if(isset($_SESSION['alert'])){
        echo "<script>
                Swal.fire({
                    icon: '".$_SESSION['alert-icon']."',
                    title: '".$_SESSION['alert-title']."',
                    text: '".$_SESSION['alert-text']."',
                    showConfirmButton: false
                })
            </script>";
    }
    unset($_SESSION['alert']);
    unset($_SESSION['alert-icon']);
    unset($_SESSION['alert-title']);
    unset($_SESSION['alert-text']);
?>
<div class="div-center flex-col w-full">
    <section id='home-section1' class="relative div-center w-[100%] min-h-[100vh] flex-wrap bg-no-repeat bg-cover bg-right" style="background-image: url(./images/main_bg.jpg);">
    </section>
    <section id='home-section2' class="div-center flex-col w-full py-[7rem]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary">
            Offered Services
        </h1>
        <div class="swiper mySwiper my-[50px]">
            <div class="swiper-wrapper">
                <?php
                    $services_query = "SELECT SERVICE_PICTURE FROM tbl_service Where SERVICE_STATUS = 1";
                    $services_result = $conn -> query($services_query );
                    if($services_result){
                        while($rows = mysqli_fetch_array($services_result)){
                          echo '<div class="swiper-slide div-center">
                                    <img src="./images/'.$rows['SERVICE_PICTURE'].'" alt="Service 1" />
                                </div>';
                        }
                    }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
</div>
<section id='about_section2' class="div-center bg-tertiary flex-col w-full py-[7rem]">
        <div class="employees-container div-center flex-col w-full">
            <h1 class="font-Dancing text-[64px] font-bold text-defaultwhite pb-[50px]">
                Customers' Feedback
            </h1>
            <div class="div-center flex-wrap gap-[50px]">
                <?php
                    $feedback_query = "SELECT tbl_customer.CUSTOMER_PICTURE, tbl_customer.CUSTOMER_NAME, tbl_feedback.FEEDBACK_CONTENT FROM tbl_feedback INNER JOIN tbl_customer ON tbl_feedback.CUSTOMER_ID = tbl_customer.CUSTOMER_ID LIMIT 3";
                    $feedback_result = $conn -> query($feedback_query);
                    if($feedback_result){
                        while($rows = mysqli_fetch_array($feedback_result)){
                            echo '<div class="card-container bg-defaultwhite rounded-lg p-[20px] div-center flex-col drop-shadow-md max-w-[350px]">
                                    <img src="./images/'.$rows['CUSTOMER_PICTURE'].'" alt="sample" class="rounded-full w-[100px]"/>
                                    <h6 class="text-primary text-[18px] mb-5">
                                    '.$rows['CUSTOMER_NAME'].'
                                    </h6>
                                    <p class="text-primary text-[14px] text-center">
                                    "'.$rows['FEEDBACK_CONTENT'].'"
                                    </p>
                                </div>';
                        }
                    }
                ?>
            </div>
        </div>
    </section>
<!-- SWIPER JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- INITIALIZE SWIPER -->
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
    });
</script>
<?php 
    include('component/client/footer/footer.php');
?>

    
