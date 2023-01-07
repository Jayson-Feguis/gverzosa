<?php
include('../component/admin/header/header.php');
include('../api/post_product.php');




function countCustomer($conn)
{
    $sql = "SELECT COUNT(*) as Count FROM tbl_customer WHERE CUSTOMER_STATUS = 0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Count'];
}

function countFeedback($conn)
{
    $sql = "SELECT COUNT(*) as Count FROM tbl_feedback WHERE FEEDBACK_STATUS = 0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Count'];
}
function countProduct($conn)
{
    $sql = "SELECT COUNT(*) as Count FROM tbl_product WHERE PRODUCT_STATUS = 0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Count'];
}
function countPromotion($conn)
{
    $sql = "SELECT COUNT(*) as Count FROM tbl_banner WHERE BANNER_STATUS = 0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Count'];
}
function countCategory($conn)
{
    $sql = "SELECT COUNT(*) as Count FROM tbl_category WHERE CATEGORY_STATUS = 0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Count'];
}

function countService($conn)
{
    $sql = "SELECT COUNT(*) as Count FROM tbl_service WHERE SERVICE_STATUS = 0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Count'];
}
function countUser($conn)
{
    $sql = "SELECT COUNT(*) as Count FROM tbl_user WHERE USER_STATUS = 0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Count'];
}

?>
<style>
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

<div class="flex-row w-full min-h-screen overflow-auto pl-[270px] mt-[90px] pr-[20px] pb-[150px]">
    <div>
        <h1 class="text-[20px] font-bold text-secondary">Archives</h1>
        <div class="w-full flex justify-start gap-[20px] flex-wrap">
            <a href="archive_customer.php">
                <div class="div-center gap-[20px] bg-yellow-500 px-10 py-5 rounded-md text-white flex-1">
                    <div class="text-[48px] div-center">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="div-center flex-col">
                        <h1 class="font-bold">Customers</h1>
                        <h1 class="text-[32px]"><?php echo countCustomer($conn); ?></h1>
                    </div>
                </div>

                <a href="archive_feedback.php">
                    <div class="div-center gap-[20px] bg-green-500 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">Feedbacks</h1>
                            <h1 class="text-[32px]"><?php echo countFeedback($conn); ?></h1>
                        </div>
                    </div>
                </a>
                <a href="archive_product.php">
                    <div class="div-center gap-[20px] bg-red-500 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-scissors" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">Products</h1>
                            <h1 class="text-[32px]"><?php echo countProduct($conn); ?></h1>
                        </div>
                    </div>
                </a>
                <a href="archive_promotion.php">
                    <div class="div-center gap-[20px] bg-yellow-500 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">Promotions</h1>
                            <h1 class="text-[32px]"><?php echo countPromotion($conn); ?></h1>
                        </div>
                    </div>
                </a>
                <a href="archive_category.php">
                    <div class="div-center gap-[20px] bg-green-500 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-scissors" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">Service Category</h1>
                            <h1 class="text-[32px]"><?php echo countCategory($conn); ?></h1>
                        </div>
                    </div>
                </a>
                <a href="archive_service.php">
                    <div class="div-center gap-[20px] bg-red-500 px-10 py-5 rounded-md text-white flex-1">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-scissors" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">Service Sub Category</h1>
                            <h1 class="text-[32px]"><?php echo countService($conn); ?></h1>
                        </div>
                    </div>
                </a>
                <a href="archive_employee.php">
                    <div class="div-center gap-[20px] bg-yellow-500 px-10 py-5 rounded-md text-white ">
                        <div class="text-[48px] div-center">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="div-center flex-col">
                            <h1 class="font-bold">Employees</h1>
                            <h1 class="text-[32px]"><?php echo countUser($conn); ?></h1>
                        </div>
                    </div>
                </a>
        </div>
    </div>
</div>
<?php
include('../component/admin/footer/footer.php');
?>