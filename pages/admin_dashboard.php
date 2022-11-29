<?php
    include('../component/admin/header/header.php');
    include('../api/post_product.php');
?>
<style>
    /*event in day or week view*/
    .dhx_cal_event.pending_event div{
        background-color: #EAB308 !important;
        color: white !important;
    }
    .dhx_cal_event.accepted_event div{
        background-color: #22C55E !important;
        color: white !important;
    }
    .dhx_cal_event.rejected_event div{
        background-color: #ED4343 !important;
        color: white !important;
    }
    .dhx_cal_event.canceled_event div{
        background-color: #9CA3AF !important;
        color: white !important;
    }
    /*multi-day event in month view*/
    .dhx_cal_event_line.pending_event div{
        background-color: #EAB308 !important;
        color: white !important;
    }
    .dhx_cal_event_line.accepted_event div{
        background-color: #22C55E !important;
        color: white !important;
    }
    .dhx_cal_event_line.rejected_event div{
        background-color: #ED4343 !important;
        color: white !important;
    }
    .dhx_cal_event_line.canceled_event div{
        background-color: #9CA3AF !important;
        color: white !important;
    }
    /*event with fixed time, in month view*/
    .dhx_cal_event_clear.pending_event div{
        background-color: #EAB308 !important;
        color: white !important;
    }
    .dhx_cal_event_clear.accepted_event div{
        background-color: #22C55E !important;
        color: white !important;
    }
    .dhx_cal_event_clear.rejected_event div{
        background-color: #ED4343 !important;
        color: white !important;
    }
    .dhx_cal_event_clear.canceled_event div{
        background-color: #9CA3AF !important;
        color: white !important;
    }
</style>

<div class="flex-col w-full min-h-screen overflow-auto pl-[270px] mt-[90px] pr-[20px] pb-[150px]">
    <div>
        <h1 class="text-[20px] font-bold text-secondary">Appointments</h1>
        <div class="w-full flex justify-start gap-[20px] flex-wrap">
            <?php
                $appointment_query = "SELECT APP_STATUS, COUNT(*) FROM tbl_appointment GROUP BY APP_STATUS";
                $appointment_result = $conn -> query($appointment_query );
                $pending = 0;
                $accepted = 0;
                $rejected = 0;
                $canceled = 0;
                if($appointment_result){
                    while($rows = mysqli_fetch_array($appointment_result)){
                        // PENDING
                        if($rows['APP_STATUS'] == 0){
                            $pending = $rows['COUNT(*)'];
                        }
                        // ACCEPTED
                        else if($rows['APP_STATUS'] == 1){
                            $accepted = $rows['COUNT(*)'];
                        }
                        // REJECTED
                        else if($rows['APP_STATUS'] == 2){
                            $rejected = $rows['COUNT(*)'];
                        }
                        // CANCELED
                        else if($rows['APP_STATUS'] == 3){
                            $canceled = $rows['COUNT(*)'];
                        }
                    }
                }
                echo '<div class="div-center gap-[20px] bg-yellow-500 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">PENDING</h1>
                            <h1 class="text-[32px]">'.$pending.'</h1>
                        </div>
                    </div>
                    <div class="div-center gap-[20px] bg-green-500 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">ACCEPTED</h1>
                            <h1 class="text-[32px]">'.$accepted.'</h1>
                        </div>
                    </div>
                    <div class="div-center gap-[20px] bg-red-500 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">REJECTED</h1>
                            <h1 class="text-[32px]">'.$rejected.'</h1>
                        </div>
                    </div>
                    <div class="div-center gap-[20px] bg-gray-400 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">CANCELED</h1>
                            <h1 class="text-[32px]">'.$canceled.'</h1>
                        </div>
                    </div>';
            ?>
        </div>
    </div>
    <h1 class="text-[20px] font-bold text-secondary mt-[50px]">Schedule</h1>
    <div id="scheduler_here" class="dhx_cal_container min-w-full min-h-[800px]">
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
        scheduler.setLoadMode("day");
        scheduler.templates.event_class = function (start, end, event) {
            if (event.type == "0") {
                return "pending_event";
            }
            else if(event.type == "1"){
                return "accepted_event";
            }
            else if(event.type == "2"){
                return "rejected_event";
            }
            else if(event.type == "3"){
                return "canceled_event";
            } 
        };
        scheduler.init("scheduler_here", new Date(), "day");
        scheduler.load("api/get_appointment.php");

        var dp = scheduler.createDataProcessor({
            url: "api/get_appointment.php",
            mode: "JSON"
        });
    </script>
</div>
<?php
    include('../component/admin/footer/footer.php');
?>