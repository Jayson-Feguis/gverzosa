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
<div class="div-center flex-col w-full">
    <section id='services_section1' class="div-center flex-col w-full pt-[7rem]">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php 
                    $promotion_query = "SELECT BANNER_IMAGE FROM tbl_banner WHERE BANNER_STATUS = 1";
                    $promotion_result = $conn -> query($promotion_query);
                    if($promotion_result){
                        while($row_service = mysqli_fetch_array($promotion_result)){
                        echo '<div class="swiper-slide w-[100%] min-h-[500px] flex-wrap" style="background-image: url(../images/'.$row_service['BANNER_IMAGE'].'); background-size: auto 100%; background-position: center;"></div>';
                        }
                    }
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section id='services_section2' class="div-center flex-col w-full py-[7rem] max-w-[1536px]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary mb-[70px]">
            Pricelist
        </h1>
        <div class="flex justify-center items-start flex-wrap gap-[100px]">
          <?php
                $category_query = "SELECT CATEGORY_ID, CATEGORY_NAME FROM tbl_category WHERE CATEGORY_STATUS = 1";
                $category_result = $conn -> query($category_query);
                if($category_result){
                    while($rows = mysqli_fetch_array($category_result)){
                    ?>
                        <div>
                            <div class="w-[400px] flex justify-start items-end pt-[24px] pr-[12px]  pb-[12px] pl-[12px] bg-tertiary text-defaultwhite text-[24px] font-bold mb-[20px]">
                                <h1><?php echo $rows['CATEGORY_NAME'] ?></h1>
                            </div>
                            <div class="flex flex-col gap-[10px] w-[500px]">
                                <?php 
                                    $service_query = "SELECT SERVICE_NAME, SERVICE_PRICE FROM tbl_service WHERE SERVICE_STATUS = 1 AND CATEGORY_ID = ".$rows['CATEGORY_ID'];
                                    $service_result = $conn -> query($service_query);
                                    if($service_result){
                                        while($row_service = mysqli_fetch_array($service_result)){
                                        echo '<div class="w-full flex justify-between text-[20px]">
                                                <h4>'.$row_service['SERVICE_NAME'].'</h4>
                                                <h4>P '.$row_service['SERVICE_PRICE'].'</h4>
                                            </div>';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                }
            ?>
        </div>
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