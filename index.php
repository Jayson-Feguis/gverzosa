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
        <div class="w-full min-h-screen flex justify-center items-end pb-[30vh]">
            <button id="btn-book-now" onclick="openModal()" class="bg-secondary text-defaultwhite text-[32px] font-bold py-[10px] px-[20px] rounded-md font-Montserrat transition-all duration-300 hover:bg-tertiary">Book Now  <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></button>
        </div>
        <div id="modal-book" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <form action="api/post_book.php" method="post">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Book an appointment</h1>
                                <label for="fullname">Full Name</label>
                                <input 
                                    id="fullname"
                                    type="text"
                                    class="block border border-grey-light w-full p-3 rounded mb-4"
                                    name="fullname"
                                    placeholder="ex. Juan Dela Cruz"
                                    required
                                />
                                <label for="email">Email</label>
                                <input 
                                    id="email"
                                    type="email"
                                    class="block border border-grey-light w-full p-3 rounded mb-4"
                                    name="email"
                                    placeholder="ex. youremail@example.com"
                                    required
                                />
                                <label for="mobilenumber">Mobile Number</label>
                                <input 
                                    id="mobilenumber"
                                    type="phone"
                                    class="block border border-grey-light w-full p-3 rounded mb-4"
                                    name="mobilenumber"
                                    placeholder="09123456789"
                                    pattern="[0,9]{2}[0-9]{9}"
                                    required
                                />
                                <label for="date">Appointment Date</label>
                                <input 
                                    id="date"
                                    type="date"
                                    class="block border border-grey-light w-full p-3 rounded mb-4"
                                    name="date"
                                    placeholder="11/17/2022"
                                    min="<?php echo date("Y-m-d"); ?>"
                                    required
                                />
                                <label for="time">Appointment Time (opening hours 10:00 - 21:00)</label>
                                <input 
                                    id="time"
                                    type="time"
                                    class="block border border-grey-light w-full p-3 rounded mb-4"
                                    name="time"
                                    min="10:00" max="21:00"
                                    placeholder="09:00"
                                    required
                                />
                                <label for="service">What kind of service we'll set up for you?</label>
                                <select name="service" id="service" class="block border border-grey-light w-full p-3 rounded mb-4">
                                    <?php
                                        $services_query = "SELECT SERVICE_ID, SERVICE_NAME FROM tbl_service Where SERVICE_STATUS = 1";
                                        $services_result = $conn -> query($services_query );
                                        if($services_result){
                                            while($rows = mysqli_fetch_array($services_result)){
                                            echo '<option value="'.$rows['SERVICE_ID'].'">'.$rows['SERVICE_NAME'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="book" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                                <button type="button" onclick="closeModal()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id='home-section2' class="div-center flex-col w-full py-[7rem]">
        <h1 class="font-Dancing text-[64px] font-bold text-primary">
            Services Offered
        </h1>
        <div class="swiper mySwiper my-[50px]">
            <div class="swiper-wrapper">
                <?php
                    $services_query = "SELECT SERVICE_PICTURE FROM tbl_service Where SERVICE_STATUS = 1";
                    $services_result = $conn -> query($services_query );
                    if($services_result){
                        while($rows = mysqli_fetch_array($services_result)){
                          echo '<div class="swiper-slide div-center">
                                    <img src="'.$rows['SERVICE_PICTURE'].'" alt="Service 1" />
                                </div>';
                        }
                    }
                ?>
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

    function openModal(){
        $("#modal-book").removeClass("hidden");
    }
    function closeModal(){
        $("#modal-book").addClass("hidden");
    }
</script>
<?php 
    include('component/client/footer/footer.php');
?>

    
