<?php 
    include('../component/client/header/header.php');
?>
<style>
    .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper {
        margin-left: auto;
        margin-right: auto;
      }
</style>
<div class="flex flex-col w-full">
    <section id='services_section1' class="div-center flex-col w-full pt-[7rem]">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide w-[100%] min-h-[500px] flex-wrap bg-no-repeat bg-contain bg-center" style="background-image: url(../images/ads1.jpg);"></div>
        <div class="swiper-slide w-[100%] min-h-[500px] flex-wrap bg-no-repeat bg-contain bg-center" style="background-image: url(../images/ads2.jpg);"></div>
        <div class="swiper-slide w-[100%] min-h-[500px] flex-wrap bg-no-repeat bg-contain bg-center" style="background-image: url(../images/ads3.jpg);"></div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
    </section>
    <section id='services_section1' class="div-center flex-col w-full py-[7rem]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary">
            Price List
        </h1>
    </section>
</div> 
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
<?php 
    include('../component/client/footer/footer.php');
?>