<?php
    include('../component/admin/header/header.php');
    include('../api/post_product.php');
?>
<div class="flex-col w-full min-h-screen overflow-auto pl-[270px] mt-[90px] pr-[20px] pb-[50px]">
    <div id="scheduler_here" class="dhx_cal_container min-w-full min-h-[calc(100vh-100px)]">
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
    <script>
        scheduler.setLoadMode("week");
        scheduler.init("scheduler_here", new Date(), "week");
        scheduler.load("../api/get_appointment.php");

        var dp = scheduler.createDataProcessor({
            url: "../api/get_appointment.php",
            mode: "JSON"
        });
    </script>
</div>
<?php
    include('../component/admin/footer/footer.php');
?>