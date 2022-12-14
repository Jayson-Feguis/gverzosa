<?php
    include('component/client/header/header.php');
?>
<style>
    #swiper-home {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    #swiper-slide-home {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 300px !important;
    }

    #swiper-slide-home img {
        display: block;
        width: 100%;
    }

    #swiper-service {
        width: 100%;
        height: 100%;
    }


    #swiper-slide-service {
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

    #swiper-slide-service img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #swiper-service {
        margin-left: auto;
        margin-right: auto;
    }

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

    /*event in day or week view*/
    .dhx_cal_event.pending_event div {
        background-color: #EAB308 !important;
        color: white !important;
    }

    .dhx_cal_event.accepted_event div {
        background-color: #22C55E !important;
        color: white !important;
    }

    .dhx_cal_event.rejected_event div {
        background-color: #ED4343 !important;
        color: white !important;
    }

    .dhx_cal_event.canceled_event div {
        background-color: #9CA3AF !important;
        color: white !important;
    }

    /*multi-day event in month view*/
    .dhx_cal_event_line.pending_event div {
        background-color: #EAB308 !important;
        color: white !important;
    }

    .dhx_cal_event_line.accepted_event div {
        background-color: #22C55E !important;
        color: white !important;
    }

    .dhx_cal_event_line.rejected_event div {
        background-color: #ED4343 !important;
        color: white !important;
    }

    .dhx_cal_event_line.canceled_event div {
        background-color: #9CA3AF !important;
        color: white !important;
    }

    /*event with fixed time, in month view*/
    .dhx_cal_event_clear.pending_event div {
        background-color: #EAB308 !important;
        color: white !important;
    }

    .dhx_cal_event_clear.accepted_event div {
        background-color: #22C55E !important;
        color: white !important;
    }

    .dhx_cal_event_clear.rejected_event div {
        background-color: #ED4343 !important;
        color: white !important;
    }

    .dhx_cal_event_clear.canceled_event div {
        background-color: #9CA3AF !important;
        color: white !important;
    }
</style>

<?php
if (isset($_SESSION['alert'])) {
    echo "<script>
                Swal.fire({
                    icon: '" . $_SESSION['alert-icon'] . "',
                    title: '" . $_SESSION['alert-title'] . "',
                    text: '" . $_SESSION['alert-text'] . "',
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
    <section id='home' class="relative div-center lg:justify-end w-[100%] min-h-[100vh] flex-wrap bg-no-repeat bg-cover bg-right" style="background-image: url(./placeholder/main_bg1.jpg);">
        <img src="placeholder/logo.png" alt="Logo" class="px-20 md:w-[700px] lg:w-[40vw] lg:mr-[10vw]"/>
    </section>
    <section id='home' class="div-center bg-tertiary flex-col w-full py-[7rem]">
        <h1 class="font-Dancing text-[64px] font-bold text-defaultwhite">
            Appointment Schedule
        </h1>
        <div id="scheduler_here" class="dhx_cal_container employees-container w-[80%] max-w-[1536] min-h-[800px] px-[10px] sm:px-[30px]">
            <div class="dhx_cal_navline">
                <div class="dhx_cal_prev_button">&nbsp;</div>
                <div class="dhx_cal_next_button">&nbsp;</div>
                <div class="dhx_cal_today_button"></div>
                <div class="dhx_cal_date"></div>
                <div class="dhx_cal_tab" name="day_tab"></div>
                <div class="dhx_cal_tab" name="week_tab"></div>
                <div class="dhx_cal_tab" name="month_tab"></div>
            </div>
            <div class="dhx_cal_header"></div>
            <div class="dhx_cal_data"></div>
        </div>
    </section>
    <section id='home' class="div-center flex-col w-full pt-[7rem]">
        <div class="swiper mySwiper" id="swiper-service">
            <div class="swiper-wrapper" id="swiper-wrapper-service">
                <?php
                $promotion_query = "SELECT BANNER_IMAGE FROM tbl_banner WHERE BANNER_STATUS = 1";
                $promotion_result = $conn->query($promotion_query);
                if ($promotion_result) {
                    while ($row_service = mysqli_fetch_array($promotion_result)) {
                        echo '<div id="swiper-slide-service" class="swiper-slide w-[100%] min-h-[500px] flex-wrap" style="background-image: url(./images/' . $row_service['BANNER_IMAGE'] . '); background-size: auto 100%; background-position: center;"></div>';
                    }
                }
                ?>
            </div>
            <div class="swiper-button-next" id="swiper-button-next-service"></div>
            <div class="swiper-button-prev" id="swiper-button-prev-service"></div>
            <div class="swiper-pagination" id="swiper-pagination-service"></div>
        </div>
    </section>
    <section id='about' class="div-center flex-col w-full py-[7rem]">
        <!-- <div class=" p-10">
            <img src="history_image.jpg" class="w-[400px] h-[400px] " />
        </div> -->
        <div class="swiper mySwiper my-[50px]" id="swiper-home">
            <div class="swiper-wrapper" id="swiper-wrapper-service">
                <div class="swiper-slide div-center" id="swiper-slide-home">
                    <img src="./placeholder/History1.jpg" alt="History1" />
                </div>
                <div class="swiper-slide div-center" id="swiper-slide-home">
                    <img src="./placeholder/History2.jpg" alt="History2" />
                </div>
                <div class="swiper-slide div-center" id="swiper-slide-home">
                    <img src="./placeholder/History3.jpg" alt="History3" />
                </div>
                <div class="swiper-slide div-center" id="swiper-slide-home">
                    <img src="./placeholder/History4.jpg" alt="History4" />
                </div>
                <div class="swiper-slide div-center" id="swiper-slide-home">
                    <img src="./placeholder/History5.jpg" alt="History5" />
                </div>
            </div>
            <div class="swiper-pagination" id="swiper-pagination-home"></div>
        </div>
        <h1 class="font-Dancing text-[64px] font-bold text-primary pb-[50px]">
            History
        </h1>
        <p class="font-Montserrat text-[18px] employees-container max-w-[1536] px-[10px] sm:px-[30px] text-center  w-full">



            G.Verzosa Salon and Spa are operating since 2015 and it was owned by Guiler Verzosa, located at 420 P.Martinez St. Unit C16 City Residences Brgy.

        </p>
    </section>
    <section id='about' class="div-center bg-tertiary flex-col w-full py-[7rem]">
        <div class="employees-container div-center flex-col w-full">
            <h1 class="font-Dancing text-[64px] text-center font-bold text-defaultwhite pb-[50px]">
                Employees Profile
            </h1>
            <div class="div-center flex-wrap gap-[50px]">
                <?php
                $employees_query = "SELECT * FROM tbl_user Where USER_STATUS = 1 && USER_SHOW = 1";
                $employees_result = $conn->query($employees_query);
                if ($employees_result) {
                    while ($rows = mysqli_fetch_array($employees_result)) {
                        $user_type = '';
                        if($rows['USER_TYPE'] == '1' || $rows['USER_TYPE'] == 1){
                            $user_type = 'Administrator';
                        }
                        else if($rows['USER_TYPE'] == '2' || $rows['USER_TYPE'] == 2){
                            $user_type = 'Employee';
                        }
                        else{
                            $user_type = 'Owner';
                        }
                        echo '<div class="card-container w-[300px] h-[300px] bg-defaultwhite rounded-lg p-[20px] div-center flex-col drop-shadow-md">
                                    <img src="./images/' . $rows['USER_PICTURE'] . '" alt="sample" class="rounded-full w-[150px]"/>
                                    <h6 class="text-primary text-[24px] text-center">
                                    ' . $rows['USER_FNAME'] . ' ' . $rows['USER_LNAME'] . '
                                    </h6>
                                    <h6 class="text-primary text-[16px] text-center">
                                    ' . $user_type . '
                                    </h6>
                                </div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section id='about' class="div-center bg-tertiary flex-col w-full py-[7rem]">
        <div class="employees-container div-center flex-col w-full">
            <?php $feedback_query = "SELECT  * FROM tbl_feedback WHERE tbl_feedback.FEEDBACK_STATUS = 1 && tbl_feedback.FEEDBACK_SHOW = 1 LIMIT 3";
            $feedback_result = $conn->query($feedback_query);

            $rows = mysqli_fetch_array($feedback_result);
            if ($rows > 0) {
            ?>

                <h1 class="font-Dancing text-[64px] text-center font-bold text-defaultwhite pb-[50px]">
                    Customers' Feedback
                </h1>
            <?php } ?>
            <div class="div-center flex-wrap gap-[50px]">
                <?php
                $feedback_query = "SELECT  * FROM tbl_feedback WHERE tbl_feedback.FEEDBACK_STATUS = 1 && tbl_feedback.FEEDBACK_SHOW = 1 LIMIT 3";
                $feedback_result = $conn->query($feedback_query);
                if ($feedback_result) {
                    while ($rows = mysqli_fetch_array($feedback_result)) {
                        echo '<div class="card-container bg-defaultwhite rounded-lg p-[20px] div-center flex-col drop-shadow-md max-w-[350px]">
                                    <img src="./images/' . $rows['CUSTOMER_PICTURE'] . '" alt="sample" class="rounded-full w-[100px]"/>
                                    <h6 class="text-primary text-[18px] mb-5">
                                    ' . $rows['CUSTOMER_NAME'] . '
                                    </h6>
                                    <p class="text-primary text-[14px] text-center">
                                    "' . $rows['FEEDBACK_CONTENT'] . '"
                                    </p>
                                </div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <section id='services' class="div-center flex-col w-full py-[7rem]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary">
            Offered Services
        </h1>
        <div class="swiper mySwiper my-[50px]" id="swiper-home">
            <div class="swiper-wrapper" id="swiper-wrapper-service">
                <?php
                $services_query = "SELECT SERVICE_PICTURE FROM tbl_service Where SERVICE_STATUS = 1";
                $services_result = $conn->query($services_query);
                if ($services_result) {
                    while ($rows = mysqli_fetch_array($services_result)) {
                        echo '<div class="swiper-slide div-center" id="swiper-slide-home">
                                    <img src="./images/' . $rows['SERVICE_PICTURE'] . '" alt="Service 1" />
                                </div>';
                    }
                }
                ?>
            </div>
            <div class="swiper-pagination" id="swiper-pagination-home"></div>
        </div>
    </section>
    <section id='services' class="div-center flex-col w-full py-[7rem] max-w-[1536px]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary mb-[70px]">
            Pricelist
        </h1>
        <div class="flex justify-center overflow-x-hidden items-start px-0 md:px-[100px] flex-wrap gap-[100px]">
            <?php
            $category_query = "SELECT CATEGORY_ID, CATEGORY_NAME FROM tbl_category WHERE CATEGORY_STATUS = 1";
            $category_result = $conn->query($category_query);
            if ($category_result) {
                while ($rows = mysqli_fetch_array($category_result)) {
            ?>
                    <div>
                        <div class="w-[100%] md:w-[400px] flex justify-start items-end pt-[24px] pr-[12px]  pb-[12px] pl-[12px] bg-tertiary text-defaultwhite text-[24px] font-bold mb-[20px]">
                            <h1><?php echo $rows['CATEGORY_NAME'] ?></h1>
                        </div>
                        <div class="flex flex-col gap-[10px]">
                            <?php
                            $service_query = "SELECT SERVICE_NAME, SERVICE_PRICE FROM tbl_service WHERE SERVICE_STATUS = 1 AND CATEGORY_ID = " . $rows['CATEGORY_ID'];
                            $service_result = $conn->query($service_query);
                            if ($service_result) {
                                while ($row_service = mysqli_fetch_array($service_result)) {
                                    echo '<div class="w-full flex justify-between text-[20px]">
                                                <h4>' . $row_service['SERVICE_NAME'] . '</h4>
                                                <h4>P ' . $row_service['SERVICE_PRICE'] . '</h4>
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
    <section id='products' class="div-center flex-col overflow-x-hidden w-full py-[7rem] bg-tertiary">
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
                                <div class="aspect-[9/9] h-[250px] w-full" style="background-image: url(./images/<?php echo $rows['PRODUCT_PICTURE'] ?>); background-size: cover; background-position: center;" alt="<?php echo $rows['PRODUCT_NAME'] ?>"></div>
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
    <section id='products' class="div-center flex-col w-full py-[7rem] max-w-[1536px]">
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
                        <div class="aspect-[9/9] h-[250px] w-full" style="background-image: url(./images/<?php echo $rows['PRODUCT_PICTURE'] ?>); background-size: cover; background-position: center;" alt="<?php echo $rows['PRODUCT_NAME'] ?>"></div>
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
    <section id='about_section3' class="div-center flex-col w-full overflow-x-hidden py-[7rem]">
        <div class="getintouch-container div-center flex-col w-full">
            <h1 class="font-Dancing text-[64px] font-bold text-primary pb-[50px]">
                Get in Touch
            </h1>
            <div class="div-center flex-wrap gap-[50px]">
                <div class="div-center w-full flex-wrap">
                    <div class="div-center flex-col gap-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d766.7361757170355!2d121.05217880038407!3d14.580053770809352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c83f5c33f2b5%3A0xae6f16159cb45cce!2sG.%20Verzosa%20Salon%20%26%20Spa%20For%20Men%20And%20Women!5e1!3m2!1sen!2sph!4v1669553316457!5m2!1sen!2sph" class="lg:h-[400px] w-full h-[300px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="flex flex-col gap-[10px]">
                            <div class="flex items-center">
                                <i class="w-[35px] text-center text-secondary text-[24px] fa fa-map-marker"></i>
                                <h6 class="text-[14px]">244 Kalentong Romualdez St., Brgy. Daang Bakal, Mandaluyong City</h6>
                            </div>
                            <div class="flex items-center">
                                <i class="w-[35px] text-center text-secondary text-[24px] fa fa-envelope"></i>
                                <h6 class="text-[14px]">gverzosasalonandspa@gmail.com</h6>
                            </div>
                            <div class="flex items-center">
                                <i class="w-[35px] text-center text-secondary text-[24px] fa fa-phone"></i>
                                <h6 class="text-[14px]">0977 804 9383</h6>
                            </div>
                        </div>
                    </div>
                    <!-- <form action="api/send_email.php" method="post" class="w-full md:w-[500px] px-4 pt-5 pb-4 sm:p-6 sm:pb-4 grow-1 flex flex-col">
                        <input type="text" id="picture" name="picture" value="profile.png" class=" hidden flex grow-1 border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan" required>

                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" class="flex grow-1 border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan" required>
                        <label for="email">Email</label>
                        <input id="email" type="text" pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" class="block border border-grey-light w-full p-3 rounded mb-4" name="email" placeholder="ex. youremail@example.com" required />
                        <label for="mobilenumber">Mobile Number</label>
                        <input id="mobilenumber" type="phone" class="block border border-grey-light w-full p-3 rounded mb-4" name="mobilenumber" placeholder="09123456789" pattern="[0,9]{2}[0-9]{9}"  maxlength="11" required />
                        <label for="feedback">Feedback</label>
                        <textarea type="text" rows="6" id="feedback" name="feedback" class="flex grow-1 border border-grey-light w-full p-3 rounded mb-4" placeholder="Type your feedback here" required></textarea>
                        <button type="submit" name="sendfeedback" class="inline-flex transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto sm:text-sm div-center">Send <i class="fa fa-paper-plane ml-2" aria-hidden="true"></i></button>
                    </form> -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- SWIPER JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- INITIALIZE SWIPER -->

<script>
    var swiper = new Swiper("#swiper-home", {
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
            el: "#swiper-pagination-home",
            dynamicBullets: true,
        },
    });
</script>

<script>
    var swiper = new Swiper("#swiper-service", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: "#swiper-pagination-service",
            clickable: true,
        },
        navigation: {
            nextEl: "#swiper-button-next-service",
            prevEl: "#swiper-button-prev-service",
        },
    });
</script>

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
    // define configs
    const compactHeader = {
        rows: [
            { 
                cols: [
                    "prev",
                    "date",
                    "next",
                ]
            },
            { 
                cols: [
                    "day",
                    "week",
                    "month",
                    "spacer",
                    "today"
                ]
            }
        ]
    };
    
    const fullHeader = [
        "day",
        "week",
        "month",
        "date",
        "prev",
        "today",
        "next"
    ];
    
    // add a switch to select an appropriate config for a current screen size
    
    function resetConfig(){
        let header;
        if (window.innerWidth < 1000) {
            header = compactHeader;
        } else {
            header = fullHeader;
    
        }
        scheduler.config.header = header;
        return true;
    }
    
    // apply the config initially and each time scheduler repaints or resizes:
    
    resetConfig();
    scheduler.attachEvent("onBeforeViewChange", resetConfig);
    scheduler.attachEvent("onSchedulerResize", resetConfig);

    scheduler.setLoadMode("day");
    scheduler.templates.event_class = function(start, end, event) {
        if (event.type == "0") {
            return "pending_event";
        } else if (event.type == "1") {
            return "accepted_event";
        } else if (event.type == "2") {
            return "rejected_event";
        } else if (event.type == "3") {
            return "canceled_event";
        }
    };
    scheduler.init("scheduler_here", new Date(), "day");
    scheduler.load("api/get_schedule.php");

    var dp = scheduler.createDataProcessor({
        url: "api/get_schedule.php",
        mode: "JSON"
    });
</script>
<?php
include('component/client/footer/footer.php');
?>