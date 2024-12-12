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
    <link href="../assets/img/logo.png" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="../assets/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link rel="stylesheet" href="login\css\them.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="stylesheet" href="../assets/css/icon-hover.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/style.min.css" rel="stylesheet">
    <style>
        .confirmation {
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            width: 100%;
            height: 300px;
            margin: auto;
            border-radius: 10px;
            align-content: center;
        }

        button {
            margin: 10px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left,
        .right {
            margin: 10px;
        }

        .left {
            margin-right: 30px;
            /* Adjust for spacing between the menu and confirmation form */
        }

        .confirmation {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 500px;
            height: 500px;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .confirmation form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .confirmation input[type="number"],
        .confirmation textarea {
            width: 100%;
            /* Đảm bảo các ô điền có cùng độ rộng với ô cha */
            box-sizing: border-box;
            /* Đảm bảo padding không làm thay đổi kích thước */
            padding: 8px;
            /* Khoảng cách bên trong ô điền */
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .confirmation table {
            width: 100%;
        }
    </style>
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

    <?php
    if ($_SESSION['dn'] != 1) {
        echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
        echo "<script>window.location.href = 'ThongTinChungNV.php';</script>";
    }

    ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
            style="min-height: 400px">
            <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">Quản lý khuyến mãi</h4>
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
                                    echo  '<li><a href="QLDG.php">Quản lý đánh giá khách hàng</a></li>';
                                    break;
                                }
                            case 2: {
                                    echo ' <li><a href="QLTV.php">Quản lý Thành viên</a></li>';
                                    echo  '<li><a href="QLTB.php">Quản lý thiết bị</a></li>';
                                    echo  '<li><a href="QLTBloi.php">Quản lý lỗi thiết bị</a></li>';
                                    break;
                                }
                            case 3: {
                                    echo ' <li><a href="QLHD.php">Quản lý hóa đơn</a></li>';

                                    break;
                                }
                        }




                        echo   '<li><a href="dangxuat.php">Đăng xuất</a></li>';

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
        <div class="right">
            <div class="confirmation">
                <h2>Sửa Khuyến Mãi</h2>
                <?php
                include_once("../controller/cKhuyenMai.php");
                $p = new cKhuyenMai();
                $tbl = $p->get1KM($_REQUEST['idkm']);
                if ($tbl) {
                    while ($r = mysqli_fetch_assoc($tbl)) {
                        $tenkm = $r['TenKhuyenMai'];
                        $nd = $r['NoiDung'];
                        $mucgiam = $r['MucGiamGia'];
                        $dieukien = $r['DieuKien'];
                    }
                } else {
                    echo "<script>alert('Thông tin khuyến mãi không tồn tại');</script>";
                    echo "<script>window.location.href = 'QLKM.php';</script>";
                }
                ?>


                <form action="" method="post">

                    <table>
                        <tr>
                            <td><label for="txtTenKM">Tên Khuyến Mãi:</label></td>
                            <td>
                                <input type="text"
                                    pattern="^[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯàáâãèéêìíòóôõùúăđĩũơưĂẮẰẲẶẴẸẺẼỀỀỂỆỄẾÌÍỊỈÒÓỌỎỐỒỔỘỚỜỞỢÙÚỤỦƯỪỨỮỰỳỵỷỹẠạẢảẤấẦầẨẩẬậẪẫẮắẰằẲẳẶặẸẹẺẻẼẽỀềỂểỆệỄễỐốỒồỔổỘộỚớỜờỞởỢợỤụỦủỨứỪừỬửỮữự\s0-9]+$"
                                    name="txtTenKM" id="txtTenKM" value="<?php if (isset($tenkm)) {
                                                                                echo $tenkm;
                                                                            } ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="txtNoiDung">Nội Dung:</label></td>
                            <td>
                                <input type="text"
                                    pattern="[A-Za-zÀỌÁÂÃẤắÈÉậÊờÌẪÍÒÓÔÕÙÚÒĂĐẬêĨợŨƠỄàảáạệẠồỄỆâỠãèÔéỂẹỎẽôếêìíỐòẵóưôõùúỒụựăđỗĩũơƯĂẰẮẲậẴỘẶộƠỜỚỞồịỠễỡỏừỢÙặềÚỦỤỰốỲỴÝỶỸửểữựỳỵỷỹ\s0-9]+$"
                                    name="txtNoiDung" id="txtNoiDung"
                                    value="<?php if (isset($nd)) {
                                                echo $nd;
                                            } ?>"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="txtMucGiamGia">Mức Giảm Giá:</label></td>
                            <td>
                                <input type="number" step="0.01" name="txtMucGiamGia" id="txtMucGiamGia" value="<?php if (isset($mucgiam)) {
                                                                                                                    echo $mucgiam;
                                                                                                                } ?>"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="txtDieuKien">Điều Kiện Áp Dụng:</label></td>
                            <td>
                                <input type="number" name="txtDieuKien" id="txtDieuKien" value="<?php if (isset($dieukien)) {
                                                                                                    echo $dieukien;
                                                                                                } ?>" required>
                            </td>
                        </tr>
                        <tr>

                            <td colspan="2">
                                <button name="btnupdate" class="update-btn">Cập nhật </button>
                                <input type="button" value="Hủy" class="cancel-btn" onclick="window.history.back();">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
            if (isset($_REQUEST['btnupdate'])) {
                $updatekm = $p->updateKM($_REQUEST['idkm'], $_REQUEST['txtTenKM'], $_REQUEST['txtNoiDung'], $_REQUEST['txtMucGiamGia'], $_REQUEST['txtDieuKien']);
                if ($updatekm) {
                    echo "<script>alert('Cập nhật thông tin khuyến mãi thành công');</script>";
                    echo "<script>window.location.href = 'QLKM.php';</script>";
                } else {
                    echo "<script>alert('Cập nhật thông tin khuyến mãi không  thành công');</script>";
                    echo "<script>window.location.href = 'QLKM.php';</script>";
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
                <h4 class="text-primary mb-4">Gymnast</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>4 Nguyễn Văn Bảo, Gò Vấp, Thành phố Hồ Chí Minh</p>
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
                <h4 class="text-primary mb-4">Liên kết</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="./index.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                    <a class="text-white mb-2" href="./view/about.php"><i class="fa fa-angle-right mr-2"></i>Về chúng
                        tôi</a>
                    <a class="text-white mb-2" href="./view/class.php"><i class="fa fa-angle-right mr-2"></i>Lớp học</a>
                    <a class="text-white" href="./view/contact.php"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Phổ biến</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="./index.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                    <a class="text-white mb-2" href="./view/about.php"><i class="fa fa-angle-right mr-2"></i>Về chúng
                        tôi</a>
                    <a class="text-white mb-2" href="./view/class.php"><i class="fa fa-angle-right mr-2"></i>Lớp học</a>
                    <a class="text-white" href="./view/contact.php"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Giờ mở cửa</h4>
                <h5 class="text-white">Monday - Friday</h5>
                <p>8.00 AM - 8.00 PM</p>
                <h5 class="text-white">Saturday - Sunday</h5>
                <p>2.00 PM - 8.00 PM</p>
            </div>
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