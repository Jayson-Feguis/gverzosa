<?php
    include('../component/admin/header/header.php');
?>
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
<div class="flex-col w-full min-h-screen pl-[270px] mt-[90px] pr-[20px] pb-[150px] overflow-auto">
    <div class="text-left w-full mb-5">
        <button onclick="generateReport()" class="addAppointment bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded">
            Generate Report
        </button>
    </div>
    <div class="flex gap-10">
        <div>
        <label for="fromDate" class="flex w-[270px] grow">From Date</label>
        <input 
            id="fromDate"
            type="date"
            class="block border border-grey-light w-full p-3 rounded mb-4 grow-0"
            name="fromDate"
            placeholder="11/17/2022"
            required
        />
        </div>
        <div>
        <label for="toDate" class="flex w-[350px] grow">To Date</label>
        <input 
            id="toDate"
            type="date"
            class="block border border-grey-light w-full p-3 rounded mb-4 grow-0"
            name="toDate"
            placeholder="11/20/2022"
            required
        />
        </div>
    </div>
    <?php
        $query = "SELECT tbl_appointment.*, tbl_service.SERVICE_NAME, tbl_service.SERVICE_ID FROM tbl_appointment INNER JOIN tbl_service ON tbl_appointment.SERVICE_ID = tbl_service.SERVICE_ID ORDER BY tbl_appointment.APP_APPLY_DATE DESC";
        $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table" class="responsive-table display" style="width:100%">
        <thead>
            <tr>
                <th style="display: none;">Appointment ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Apply Date</th>
                <th>Booked Date</th>
                <th style="display: none;">DateTime</th>
                <th>Status</th>
                <th>Service</th>
                <th style="display: none;">Service ID</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                    <td style="display: none;"><?php echo $row['APP_ID']; ?> </td>
                    <td><?php echo $row['APP_NAME']; ?> </td>
                    <td><?php echo $row['APP_EMAIL']; ?> </td>
                    <td><?php echo $row['APP_MOBILE_NUMBER']; ?> </td>
                    <td><?php echo date('F j, Y, g:i a', strtotime($row['APP_APPLY_DATE'])); ?> </td>
                    <td><?php echo date('F j, Y, g:i a', strtotime($row['START_DATE'])); ?> </td>
                    <td style="display: none;"><?php echo $row['START_DATE']; ?> </td>
                    <td><?php if($row['APP_STATUS'] == 0){
                        echo '<span class="bg-yellow-200 p-2 text-[14px] border border-gray-500 rounded-sm">Pending</span>';
                    }else if($row['APP_STATUS'] == 1){
                        echo '<span class="bg-green-500 text-white p-2 text-[14px] border border-gray-500 rounded-sm">Accepted</span>';
                    }else if($row['APP_STATUS'] == 2){
                        echo '<span class="bg-red-800 text-white p-2 text-[14px] border border-gray-500 rounded-sm">Rejected</span>';
                    }
                    else if($row['APP_STATUS'] == 3){
                        echo '<span class="bg-gray-200 p-2 text-[14px] border border-gray-500 rounded-sm">Cancelled</span>';
                    } 
                    else if($row['APP_STATUS'] == 4){
                        echo '<span class="p-2 text-[14px] border text-gray-400 border-gray-300 rounded-sm">Deleted</span>';
                    } ?> </td>
                    <td><?php echo $row['SERVICE_NAME']; ?> </td>
                    <td style="display: none;"><?php echo $row['SERVICE_ID']; ?> </td>
                    <td><?php echo $row['REMARKS']; ?> </td>
                </tr>
            <?php
                }
            } else {
                echo "No record found";
            }
            ?>
        </tbody>
    </table>
    <script>
        function generateReport() {
            var from = document.getElementById('fromDate').value;
            var to = document.getElementById('toDate').value;
            window.open(`http://localhost/gverzosa/pages/print_appointment_report.php?from=${from}&to=${to}`);
        }
    </script>
</div>