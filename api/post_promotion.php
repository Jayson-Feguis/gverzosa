<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');

if (isset($_POST['editpromotion'])) {
    $promotionid = $_POST['promotionid'];
    $promotionimage = $_POST['promotionimage'];
    $promotionname = $_POST['promotionname'];
    $promotionstatus = 1;

    $old_image = '';

    $sql_image = "SELECT BANNER_IMAGE FROM tbl_banner WHERE BANNER_ID = '$proMOTIONid'";
    $res_image = mysqli_query($conn, $sql_image);
    if ($sql_image == TRUE) {
        $count_image = mysqli_num_rows($res_image);
    }
    if ($count_image > 0) {
        while ($rows_image = mysqli_fetch_assoc($res_image)) {
            $old_image = $rows_image['BANNER_IMAGE'];
        }
    }
    // CHECK IF THE EXISTING IMAGE IS EQUAL TO IMAGE PAYLOAD, IF YES, DONT UPDATE IMAGE
    if ($old_image ==   $promotionimage && $promotionimage != "") {
        $sql = "UPDATE tbl_banner SET BANNER_NAME = '$promotionname',  BANNER_STATUS = '$promotionstatus' WHERE PRODUCT_ID = '$productid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Promotion updated successfully";
            header("Location: ../pages/admin_promotion.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_promotion.php");
        }
    }
    // ELSE, UPDATE ALL INFORMATION TOGETHER WITH PRODUCT PICTURE
    else {
        // CHECK IF THERE'S AN IMAGE IN THE PAYLOAD
        if (isset($_FILES['promotionimage']['name'])) {
            // UPLOAD IMAGE
            $upload_image = uploadImage($_FILES['promotionimage']['name'], $_FILES['promotionimage']['tmp_name'], "Promotion");

            if (!$upload_image) {
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Failed to upload image";
                header("Location: ../pages/admin_promotion.php");
            }

            $sql = "UPDATE tbl_banner SET BANNER_NAME = '$promotionname', BANNER_IMAGE = '$upload_image', BANNER_STATUS = '$promotionstatus' WHERE BANNER_ID = '$promotionid'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // SUCCESS
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "success";
                $_SESSION['alert-title'] = "Success";
                $_SESSION['alert-text'] = "Promotion updated successfully" . $promotionimage;
                header("Location: ../pages/admin_promotion.php");
            } else {
                // ERROR
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Something went wrong";
                header("Location: ../pages/admin_promotion.php");
            }
        } else {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "info";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Please upload an image | " . $promotionimage;
            header("Location: ../pages/admin_promotion.php");
        }
    }
} else if (isset($_POST['deletepromotion'])) {
    $promotionid = $_POST['promotionidDelete'];
    $promotionstatus = 0;

    $sql = "UPDATE tbl_banner SET BANNER_STATUS = '$promotionstatus' WHERE BANNER_ID = '$promotionid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Promotion deleted successfully";
        header("Location: ../pages/admin_promotion.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_promotion.php");
    }
} else if (isset($_POST['addpromotion'])) {
    $promotionname = $_POST['addpromotionname'];
    $promotiontprice = $_POST['addpromotionprice'];
    $promotionstatus = 1;
    if (isset($_FILES['addpromotionimage']['name'])) {
        $upload_image = uploadImage($_FILES['addpromotionimage']['name'], $_FILES['addpromotionimage']['tmp_name'], "Proromotion");

        if (!$upload_image) {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Failed to upload image";
            header("Location: ../pages/admin_promotion.php");
        }

        $sql = "INSERT INTO tbl_banner (BANNER_NAME, BANNER_IMAGE, BANNER_STATUS ) VALUES ('$promotionname', '$upload_image', '$promotionstatus')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = 'Promotion added successfully';
            header("Location: ../pages/admin_promotion.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_promotion.php");
        }
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "info";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Please upload an image";
        header("Location: ../pages/admin_promotion.php");
    }
} else if (isset($_POST['retrieveproduct'])) {
    $productid = $_POST['productidArchive'];
    $productstatus = 1;

    $sql = "UPDATE tbl_product SET PRODUCT_STATUS = '$productstatus' WHERE PRODUCT_ID = '$productid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Product retrieved successfully";
        header("Location: ../pages/admin_product.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_product.php");
    }
}
