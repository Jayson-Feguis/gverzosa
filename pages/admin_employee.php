<?php
include('../component/admin/header/header.php');
?>
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


function userType($num)
{
    if ($num == 1) {
        return "Administrator";
    } else {
        return "Employee";
    }
}
?>
<div class="flex-col w-full min-h-screen pl-[270px] mt-[90px] pr-[20px] pb-[150px] overflow-auto">
    <div class="text-left w-full mb-5">
        <button class="addUser bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded">
            Add Employee
        </button>
    </div>
    <div id="modal-add" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_user.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Add User</h1>
                            <label for="adduserimage">User Image</label>
                            <input type="file" name="adduserimage" id="adduserimage" accept="image/*" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <label for="adduserfname">Firstname</label>
                            <input type="text" id="adduserfname" name="adduserfname" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan" required>
                            <label for="adduserlname">Lastname</label>
                            <input type="text" id="adduserlname" name="adduserlname" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Dela Cruz" required>
                            <label for="adduseremail">Email</label>
                            <input type="email" id="adduseremail" name="adduseremail" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. juandelacruz@gmail.com" required>
                            <label for="addusernumber">Mobile Number</label>
                            <input type="number" pattern="(9)\d{9}" id="addusernumber" name="addusernumber" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. 09261905272" required>
                            <label for="addusername">Username</label>
                            <input type="text" id="addusername" name="addusername" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan1" required>
                            <label for="adduserpassword">Password</label>
                            <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,26}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" id="adduserpassword" name="adduserpassword" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Password" required>
                            <label for="adusertype">User Type</label>
                            <select name="adusertype" id="adusertype" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                                <option value="" disabled selected>Select User Type</option>
                                <option value="1">Admin</option>
                                <option value="2">Employee</option>
                            </select>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="adduser" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                                <button type="button" onclick="closeModalAdd()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
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
                    <form action="../api/post_user.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <input type="text" id="edituserid" name="edituserid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Edit User</h1>
                            <label for="edituserimage">User Image</label>
                            <img id="img_edituserimage" src="" class="w-[200px]">
                            <input type="file" name="edituserimage" id="edituserimage" accept="image/*" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <input type="text" id="edituserimagetext" name="edituserimagetext" class="hidden border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan" required>
                            <label for="edituserfname">Firstname</label>
                            <input type="text" id="edituserfname" name="edituserfname" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan" required>
                            <label for="edituserlname">Lastname</label>
                            <input type="text" id="edituserlname" name="edituserlname" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Dela Cruz" required>
                            <label for="edituseremail">Email</label>
                            <input type="email" id="edituseremail" name="edituseremail" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. juandelacruz@gmail.com" required>
                            <label for="editusernumber">Mobile Number</label>
                            <input type="number" pattern="(9)\d{9}" id="editusernumber" name="editusernumber" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. 09261905272" required>
                            <label for="editusername">Username</label>
                            <input type="text" id="editusername" name="editusername" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan1" required>
                            <label for="edituserpassword">Password</label>
                            <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,26}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" id="edituserpassword" name="edituserpassword" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Password" required>
                            <label for="editusertype">User Type</label>
                            <select name="editusertype" id="editusertype" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                                <option value="" disabled selected>Select User Type</option>

                                <option value="1">Admin</option>
                                <option value="2">Employee</option>
                            </select>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="edituser" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
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
                    <form action="../api/post_user.php" method="post">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure do want to delete this user?</h1>
                        <input type="text" type="text" id="userDelete" name="userDelete" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="deleteuser" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800">Delete</button>
                            <button type="button" onclick="closeModaldel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM tbl_user WHERE USER_STATUS = 1 ORDER BY USER_ID DESC";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Firstname</th>
                <th style="display: none;">Picture</th>
                <th>Lastname</th>
                <th>Picture</th>
                <th>Username</th>
                <th style="display: none;">Password</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>User Type</th>
                <th style="display: none;">User Type</th>
                <th>Date Created</th>
                <th style="display: none;">User Show</th>
                <th>Show User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td><?php echo $row['USER_ID']; ?> </td>
                        <td><?php echo $row['USER_FNAME']; ?> </td>
                        <td style="display: none;"><?php echo $row['USER_PICTURE']; ?> </td>
                        <td><?php echo $row['USER_LNAME']; ?> </td>
                        <td>
                            <div class="w-[200px] h-[40px] bg-contain bg-no-repeat" style="background-image: url('../images/<?php echo $row['USER_PICTURE']; ?>');"></div>
                        </td>
                        <td><?php echo $row['USER_USERNAME']; ?> </td>
                        <td style="display: none;"><?php echo $row['USER_PASSWORD']; ?></td>
                        <td><?php echo $row['USER_EMAIL']; ?> </td>
                        <td><?php echo $row['USER_MOBILE_NUMBER']; ?> </td>
                        <td><?php echo userType($row['USER_TYPE']); ?></td>
                        <td style="display: none;"><?php echo $row['USER_TYPE']; ?> </td>
                        <td><?php echo $row['USER_DATETIME_CREATED']; ?> </td>
                        <td style="display: none;"><?php echo $row['USER_SHOW']; ?> </td>
                        <td id="user-show-<?php echo $row['USER_ID']; ?>">
                            <?php if ($row['USER_SHOW'] == 0) {
                                echo '<span class="bg-gray-200 p-2 text-[14px] border border-gray-500 rounded-sm">Deactivated</span>';
                            } else if ($row['USER_SHOW'] == 1) {
                                echo '<span class="bg-green-500 text-white p-2 text-[14px] border border-gray-500 rounded-sm">Activated</span>';
                            } ?>
                        </td>
                        <td class="text-center flex items-center gap-1"><label class="inline-flex relative items-center cursor-pointer">
                                <?php if ($row['USER_SHOW'] == 0) {
                                    echo ' <input type="checkbox" value="" id="showuser" name="showuser" onclick="showUser(' . $row['USER_ID'] . ',' . $row['USER_SHOW'] . ')" class="showUser sr-only peer">';
                                } else if ($row['USER_SHOW'] == 1) {
                                    echo ' <input type="checkbox" value="" id="showuser" name="showuser" onclick="showUser(' . $row['USER_ID'] . ',' . $row['USER_SHOW'] . ')" class="showUser sr-only peer" checked>';
                                } ?>

                                <div class="w-11 h-6 peer-focus:outline-none dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                            <button type="button" class="editUser bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-pencil text-[16px]" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="deleteUser bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-trash-o text-[16px]" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
            <?php
                }
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

        function closeModaldel() {
            $("#modal-delete").addClass("hidden");
        }

        function closeModalAdd() {
            $("#modal-add").addClass("hidden");
        }

        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.editUser', function() {
                var data = table.row($(this).parents('tr')).data();
                const dT = new ClipboardEvent('').clipboardData || new DataTransfer();
                dT.items.add(new File(['foo'], data[2]));
                $("#modal-edit").removeClass("hidden");
                edituserimage.files = dT.files;
                $('#img_edituserimage').attr("src", "../images/" + data[2]);
                $('#edituserid').val(data[0]);
                $('#edituserimagetext').val(data[2]);
                $('#edituserlname').val(data[3]);
                $('#edituserfname').val(data[1]);
                $('#edituseremail').val(data[7]);
                $('#editusernumber').val(data[8]);
                $('#editusertype').val(data[10]);
                $('#editusername').val(data[5]);
                $('#edituserpassword').val(data[6]);
                console.log(data);
            });

            $("#edituserimage").change(function() {
                $('#edituserimagetext').val($("#edituserimage").val());
            });
        });

        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.deleteUser', function() {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-delete").removeClass("hidden");
                $('#userDelete').val(data[0]);
            });
        });

        $(document).ready(function() {
            $('.addUser').on('click', function() {
                $("#modal-add").removeClass("hidden");
            });
        });

        function showUser(id, status) {
            $.ajax({
                url: '../api/post_user.php',
                type: "POST",
                data: {
                    userid: id,
                    showstatus: status
                },
                success: function(data) {
                    window.location = location;
                }
            });
        }
    </script>
</div>