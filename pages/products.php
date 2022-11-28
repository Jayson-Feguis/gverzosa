<?php
include('../component/client/header/header.php');
?>
<style>
    #swiper-product {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    #swiper-slide-product {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 300px !important;
    }

    #swiper-slide-product img {
        display: block;
        width: 100%;
    }
</style>
<div class="div-center flex-col w-full">
    <section id='products_section2' class="div-center flex-col w-full py-[7rem] bg-tertiary">
        <h1 class="font-Dancing text-[64px] font-bold text-defaultwhite mb-[70px] mt-[50px]">
            Latest Products
        </h1>
        <div class="swiper mySwiper my-[10px] max-w-[1536px]" id="swiper-product">
            <div class="swiper-wrapper" id="swiper-wrapper-product">
                <?php
                $product_query = "SELECT * FROM tbl_product WHERE PRODUCT_STATUS = 1 ORDER BY PRODUCT_DATETIME_CREATED DESC LIMIT 10";
                $product_result = $conn->query($product_query);
                if ($product_result) {
                    while ($rows = mysqli_fetch_array($product_result)) {
                ?>
                        <div class="swiper-slide div-center bg-transparent" id="swiper-slide-product">
                            <div class="flex flex-col justify-center bg-defaultwhite rounded-lg text-defaultwhite max-w-[250px] transition-all duration-200 drop-shadow-md hover:drop-shadow-xl hover:-translate-y-2">
                                <div class=" w-full h-[50px] div-center p-2">
                                    <h1 class="font-[18px] text-primary text-center"><?php echo $rows['PRODUCT_NAME'] ?></h1>
                                </div>
                                <div class="aspect-[9/9] h-[250px] w-full" style="background-image: url(../images/<?php echo $rows['PRODUCT_PICTURE'] ?>); background-size: cover; background-position: center;" alt="<?php echo $rows['PRODUCT_NAME'] ?>"></div>
                                <div class=" w-full h-[60px] flex justify-end items-end p-2">
                                    <h1 class="font-[18px] text-secondary text-center font-bold">P<span class="text-[24px]"><?php echo $rows['PRODUCT_PRICE'] ?></span></h1>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
            <div class="swiper-pagination" id="swiper-pagination-product"></div>
        </div>
    </section>
    <section id='products_section1' class="div-center flex-col w-full py-[7rem] max-w-[1536px]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary mb-[70px]">
            Products
        </h1>
        <div class="flex flex-wrap justify-center gap-[50px] p-2 overflow-auto">
            <?php
            $product_query = "SELECT * FROM tbl_product WHERE PRODUCT_STATUS = 1";
            $product_result = $conn->query($product_query);
            if ($product_result) {
                while ($rows = mysqli_fetch_array($product_result)) {
            ?>
                    <div class="flex flex-col justify-center bg-tertiary rounded-lg text-defaultwhite max-w-[250px] transition-all duration-200 drop-shadow-md hover:drop-shadow-xl hover:-translate-y-2">
                        <div class=" w-full h-[50px] div-center p-2">
                            <h1 class="font-[18px] text-center"><?php echo $rows['PRODUCT_NAME'] ?></h1>
                        </div>
                        <div class="aspect-[9/9] h-[250px] w-full" style="background-image: url(../images/<?php echo $rows['PRODUCT_PICTURE'] ?>); background-size: cover; background-position: center;" alt="<?php echo $rows['PRODUCT_NAME'] ?>"></div>
                        <div class=" w-full h-[60px] flex justify-end items-end p-2">
                            <h1 class="font-[18px] text-center font-bold">P<span class="text-[24px]"><?php echo $rows['PRODUCT_PRICE'] ?></span></h1>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

</div>
<!-- SWIPER JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper("#swiper-product", {
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
            el: "#swiper-pagination-product",
            dynamicBullets: true,
        },
    });
</script>
<?php
include('../component/client/footer/footer.php');
?>