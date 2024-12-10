<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gymnast - Gym Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="../assets/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link rel="stylesheet" href="login/css/them.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="stylesheet" href="../assets/css/icon-hover.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/style.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="../index.php" class="navbar-brand">
                <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white">Gymnast</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4 bg-secondary">
                    <a href="../index.php" class="nav-item nav-link active">Trang chủ</a>
                    <a href="about.php" class="nav-item nav-link">Về chúng tôi</a>
                    <a href="feature.php" class="nav-item nav-link">Tin tức</a>
                    <a href="class.php" class="nav-item nav-link">Lớp học</a>

                    <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                    <?php
                    if (!isset($_SESSION['dn'])) {
                        echo '<a href="dieukien.php" class="nav-item nav-link">Đăng nhập</a>';
                        echo '<a href="dangkitapthu.php" class="nav-item nav-link">Đăng ký tập thử</a>';
                    } else {
                        if ($_SESSION['dn'] == 1 || $_SESSION['dn'] == 2 || $_SESSION['dn'] == 3) {
                            echo '<a href="thongtinchungnv.php" class="nav-item nav-link">Hồ sơ</a>';
                        } else {
                            echo '<a href="thongtinchungtv.php" class="nav-item nav-link">Hồ sơ</a>';
                        }
                        echo '<a href="dangxuat.php" class="nav-item nav-link">Đăng xuất</a>';
                    }
                    ?>


                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
            style="min-height: 400px">
            <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">Quản lý</h4>
            <div class="d-inline-flex">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Quản lý</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container pt-5">
        <div class="left">
            <div class="sidebar">
                <div class="menu">
                    <p>Menu</p>
                    <ul>
                        <?php
                        if (!$_SESSION['dn']) {
                            echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
                            echo "<script>window.location.href = '../index.php';</script>";
                        }
                        echo '<li><a href="ThongTinchungNV.php">Thông tin chung</a></li>';
                        switch ($_SESSION['dn']) {
                            case 1: {
                                    echo ' <li><a href="QLNV.php">Quản lý nhân viên</a></li>';
                                    echo  '<li><a href="QLKM.php">Quản lý khuyến mãi</a></li>';
                                    echo  '<li><a href="QLLLV.php">Quản lý lịch làm việc</a></li>';
                                    echo  '<li><a href="QLGT.php">Quản lý Gói tập</a></li>';
                                    break;
                                }
                            case 2: {
                                    echo ' <li><a href="QLTV.php">Quản lý Thành viên</a></li>';
                                    echo  '<li><a href="QLTB.php">Quản lý thiết bị</a></li>';
                                    break;
                                }
                            case 3: {
                                    echo ' <li><a href="QLHD.php">Quản lý hóa đơn</a></li>';
                                    echo  '<li><a href="Capnhattrangthai.php">Cập nhật tình trạng thanh toán</a></li>';
                                    break;
                                }
                        }




                        echo   '<li><a href="dangxuat.php">Logout</a></li>';

                        ?>
                    </ul>
                </div>
            </div>
            <?php
            if ($_SESSION['dn'] != 1) {
                echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
                echo "<script>window.location.href = 'ThongTinChungNV.php';</script>";
            }

            ?>
        </div>
        <?php
        include_once("../controller/cGoiTap.php");
        $p = new cGoiTap();
        $tbl = $p->get1GT($_REQUEST['idgt']);
        if ($tbl) {
            while ($r = mysqli_fetch_assoc($tbl)) {
                $ten = $r['TenGoi'];
                $gia = $r['Gia'];
                $thoihan = $r['ThoiHan'];
            }
        } else {
            echo "<script>alert('Thông tin gói tập không tồn tại');</script>";
            echo "<script>window.location.href = 'QLGT.php';</script>";
        }
        ?>
        <div class="right">
            <div class="update-info-container">
                <h2>Sửa thông tin gói tập

                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="TenGoi">Tên gói</label>
                        <input width="60%"
                            pattern="[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẰẮẲẴẶƠỜỚỞỠỢÙÚỦỤỰỲỴÝỶỸửữựỳỵỷỹ\s0-9]+"
                            type="text" id="TenGoi" name="TenGoi" value="<?php if (isset($ten)) {
                                                                                            echo $ten;
                                                                                        } ?>">

                        <label for="Gia">Giá gói:</label>

                        <input type="decimal" id="Gia" name="Gia" value="<?php if (isset($gia)) {
                                                                                echo $gia;
                                                                            } ?>">
                        <br>
                        <label for="thoihan">chọn Thời hạn</label>

                        <select style="width:calc(60%)" class="form-select" aria-label="Default select example"
                            name="thoihan">
                            <?php
                            if ($thoihan == "1 tháng") {
                                echo ' <option value="1 tháng" selected>1 Tháng</option>
                            <option value="3 tháng">3 Tháng</option>
                            <option value="6 tháng">6 Tháng</option>
                            <option value="12 tháng">12 tháng</option>';
                            } elseif ($thoihan == "3 tháng") {
                                echo ' <option value="1 tháng" >1 Tháng</option>
                            <option value="3 tháng" selected>3 Tháng</option>
                            <option value="6 tháng">6 Tháng</option>
                            <option value="12 tháng">12 tháng</option>';
                            } elseif ($thoihan == "6 tháng") {
                                echo ' <option value="1 tháng" >1 Tháng</option>
                            <option value="3 tháng" >3 Tháng</option>
                            <option value="6 tháng" selected>6 Tháng</option>
                            <option value="12 tháng">12 tháng</option>';
                            } else {
                                echo ' <option value="1 tháng" >1 Tháng</option>
                                    <option value="3 tháng" >3 Tháng</option>
                                    <option value="6 tháng" >6 Tháng</option>
                                    <option value="12 tháng" selected>12 tháng</option>';
                            }
                            ?>


                        </select>


                        <div class="button-group">
                            <input type="submit" class="update-btn" name="btnadd" value="Cập nhật">
                            <input type="button" value="Hủy" class="cancel-btn" onclick="window.history.back();">
                        </div>
                    </form>
            </div>
            <?php

            if (isset($_REQUEST['btnadd']) && $_REQUEST['btnadd'] == "Cập nhật") {
                $insertGT = $p->updateGT($_REQUEST['idgt'], $_REQUEST['TenGoi'], $_REQUEST['Gia'], $_REQUEST['thoihan']);
                if ($insertGT) {
                    echo "<script>alert('cập nhật  thông tin gói tập thành công');</script>";
                    echo "<script>window.location.href = 'QLGT.php';</script>";
                } else {
                    echo "<script>alert('cập nhật  thông tin gói tập không thành công');</script>";
                    echo "<script>window.location.href = 'QLGT.php';</script>";
                }
            }

            ?>

        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <div class="footer container-fluid mt-5 py-5 px-sm-3 px-md-5 text-white">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Features</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Classes</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Popular Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Features</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Classes</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Opening Hours</h4>
                <h5 class="text-white">Monday - Friday</h5>
                <p>8.00 AM - 8.00 PM</p>
                <h5 class="text-white">Saturday - Sunday</h5>
                <p>2.00 PM - 8.00 PM</p>
            </div>
        </div>
        <div class="container border-top border-dark pt-5">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                by
                <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="../assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>