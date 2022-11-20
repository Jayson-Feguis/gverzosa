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
        <button onclick="openModalAdd()" class="addAppointment bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded">
            Add Appointment
        </button>
    </div>
    <div id="modal-add" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_appointment.php" method="post">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Add an appointment</h1>
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
                                min="10:00:00" max="21:00:00"
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
                            <button type="submit" name="addappointment" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                            <button type="button" onclick="closeModalAdd()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-edit" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_appointment.php" method="post">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <input type="text" id="appointmentid" name="appointmentid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="appointmentid" required>
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Edit Appointment</h1>
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
                                <label for="date">Booked Date</label>
                                <input 
                                    id="date"
                                    type="date"
                                    class="block border border-grey-light w-full p-3 rounded mb-4"
                                    name="date"
                                    placeholder="11/17/2022"
                                    min="<?php echo date("Y-m-d"); ?>"
                                    required
                                />
                                <label for="time">Booked Time</label>
                                <input 
                                    id="time"
                                    type="time"
                                    class="block border border-grey-light w-full p-3 rounded mb-4"
                                    name="time"
                                    min="10:00:00" max="21:00:00"
                                    placeholder="09:00:00"
                                    required
                                />
                                <label for="service">Service</label>
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
                            <label for="remarks">Remarks</label>
                            <textarea type="text" id="appointmentremarks" name="appointmentremarks" rows="4" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Type here ..." required></textarea>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="editappointment" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                                <button type="button" onclick="closeModal()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-delete" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_appointment.php" method="post">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure do want to delete this appointment?</h1>
                        <input type="text" type="text" id="appointmentidDelete" name="appointmentidDelete" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>

                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="deleteappointment" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800">Delete</button>
                            <button type="button" onclick="closeModaldel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-accept" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_appointment.php" method="post" class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure you want to accept this appointment?</h1>
                        <input type="text" type="text" id="appointmentidAccept" name="appointmentidAccept" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <input type="text" type="text" id="appointmentfullnameAccept" name="appointmentfullnameAccept" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <input type="text" type="text" id="appointmentemailAccept" name="appointmentemailAccept" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <label for="remarks">Remarks</label>
                        <textarea type="text" id="appointmentremarksAccept" name="appointmentremarksAccept" rows="4" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="(Optional) Type here ..."></textarea>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="acceptappointment" class="text-white bg-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:blue-blue-800">Yes</button>
                            <button type="button" onclick="closeModalAccept()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-reject" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_appointment.php" method="post" class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure you want to reject this appointment?</h1>
                        <input type="text" type="text" id="appointmentidReject" name="appointmentidReject" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <input type="text" type="text" id="appointmentfullnameReject" name="appointmentfullnameReject" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <input type="text" type="text" id="appointmentemailReject" name="appointmentemailReject" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <label for="remarks">Remarks</label>
                        <textarea type="text" id="appointmentremarksReject" name="appointmentremarksReject" rows="4" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Type here ..." required></textarea>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="rejectappointment" class="text-white bg-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:blue-blue-800">Yes</button>
                            <button type="button" onclick="closeModalReject()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-cancel" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_appointment.php" method="post" class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure you want to cancel this appointment?</h1>
                        <input type="text" type="text" id="appointmentidCancel" name="appointmentidCancel" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <input type="text" type="text" id="appointmentfullnameCancel" name="appointmentfullnameCancel" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <input type="text" type="text" id="appointmentemailCancel" name="appointmentemailCancel" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <label for="remarks">Remarks</label>
                        <textarea type="text" id="appointmentremarksCancel" name="appointmentremarksCancel" rows="4" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Type here ..." required></textarea>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="cancelappointment" class="text-white bg-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:blue-blue-800">Yes</button>
                            <button type="button" onclick="closeModalCancel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
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
                <th>Status</th>
                <th>Service</th>
                <th style="display: none;">Service ID</th>
                <th>Remarks</th>
                <th>Actions</th>
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
                    <td><?php echo $row['APP_APPLY_DATE']; ?> </td>
                    <td><?php echo $row['START_DATE']; ?> </td>
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
                    <td>
                        <?php if($row['APP_STATUS'] == 0){
                            echo '<button type="button" title="Accept" class="acceptAppointment bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2   border border-gray-500 hover:border-border-gray-300 rounded">
                                    <i class="fa fa-check text-[16px]" aria-hidden="true"></i>
                                </button>
                                <button type="button" title="Reject" class="rejectAppointment bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2   border border-gray-500 hover:border-border-gray-300 rounded">
                                    <i class="fa fa-ban text-[16px]" aria-hidden="true"></i>
                                </button>';
                        }else if($row['APP_STATUS'] == 1){
                            echo '<button type="button" title="Cancel" class="cancelAppointment bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2   border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-times-circle-o text-[16px]" aria-hidden="true"></i>
                                </button>';
                        }else if($row['APP_STATUS'] == 2){
                            // echo '<button type="button" title="Cancel" class="cancelAppointment bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2   border border-gray-500 hover:border-border-gray-300 rounded">
                            //     <i class="fa fa-times-circle-o text-[16px]" aria-hidden="true"></i>
                            //     </button>';
                        }
                        else if($row['APP_STATUS'] == 3){
                        } 
                        else if($row['APP_STATUS'] == 4){
                            echo '<button type="button" title="Restore" class="restoreAppointment bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                    <i class="fa fa-undo text-[16px]" aria-hidden="true"></i>
                                </button>';
                        } ?> 
                        <button type="button" title="Edit" class="editAppointment bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                            <i class="fa fa-pencil text-[16px]" aria-hidden="true"></i>
                        </button>
                    </td>
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
        function openModal() {
            $("#modal-edit").removeClass("hidden");
        }

        function closeModal() {
            $("#modal-edit").addClass("hidden");
        }

        function openModalAdd() {
            $("#modal-add").removeClass("hidden");
        }

        function closeModaldel() {
            $("#modal-delete").addClass("hidden");
        }

        function closeModalAdd() {
            $("#modal-add").addClass("hidden");
        }

        function closeModalAccept() {
            $("#modal-accept").addClass("hidden");
        }

        function closeModalReject() {
            $("#modal-reject").addClass("hidden");
        }

        function closeModalCancel() {
            $("#modal-cancel").addClass("hidden");
        }
        // EDIT
        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.editAppointment', function () {
                var data = table.row($(this).parents('tr')).data();
                const [date, time] = data[5].split(" ");
                $("#modal-edit").removeClass("hidden");
                $('#appointmentid').val(data[0]);
                $('#fullname').val(data[1]);
                $('#email').val(data[2]);
                $('#mobilenumber').val('0'+data[3]);
                $('#date').val(date);
                $('#time').val(time);
                $('#service').val(data[8]).change();
                $('#appointmentremarks').val(data[9]);
            });
        });
        // DELETE
        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.deleteAppointment', function () {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-delete").removeClass("hidden");
                $('#appointmentidDelete').val(data[0]);
            });
        });
        // ACCEPT
        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.acceptAppointment', function () {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-accept").removeClass("hidden");
                $('#appointmentidAccept').val(data[0]);
                $('#appointmentfullnameAccept').val(data[1]);
                $('#appointmentemailAccept').val(data[2]);
                $('#appointmentremarksAccept').val(data[9]);
            });
        });
        // REJECT
        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.rejectAppointment', function () {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-reject").removeClass("hidden");
                $('#appointmentidReject').val(data[0]);
                $('#appointmentfullnameReject').val(data[1]);
                $('#appointmentemailReject').val(data[2]);
                $('#appointmentremarksReject').val(data[9]);
                
            });
        });
        // CANCEL
        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.cancelAppointment', function () {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-cancel").removeClass("hidden");
                $('#appointmentidCancel').val(data[0]);
                $('#appointmentfullnameCancel').val(data[1]);
                $('#appointmentemailCancel').val(data[2]);
                $('#appointmentremarksCancel').val(data[9]);
            });
        });
        // ADD
        $(document).ready(function() {
            $('.addProduct').on('click', function() {
                $("#modal-add").removeClass("hidden");
            });
        });
    </script>
</div>