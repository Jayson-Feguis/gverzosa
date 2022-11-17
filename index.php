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
<div class="div-center flex-col w-full">
    <section id='home-section1' class="div-center w-[100%] min-h-[100vh] flex-wrap bg-no-repeat bg-cover bg-right" style="background-image: url(./images/main_bg.jpg);"></section>
    <section id='home-section2' class="div-center flex-col w-full py-[7rem]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary">
            Services Offered
        </h1>
        <div class="swiper mySwiper my-[50px]">
            <div class="swiper-wrapper">
                <div class="swiper-slide div-center">
                    <img src="./images/services_1.jpg" alt="Service 1" />
                </div>
                <div class="swiper-slide div-center">
                    <img src="./images/services_2.jpg" alt="Service 2" />
                </div>
                <div class="swiper-slide div-center">
                    <img src="./images/services_3.jpg" alt="Service 3" />
                </div>
                <div class="swiper-slide div-center">
                    <img src="./images/services_4.jpg" alt="Service 4" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
</div>
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
      rotate: 50,
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

    
