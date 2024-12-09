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
    <link rel="stylesheet" href="login/css/qltb.css">
    <link rel="stylesheet" href="login/css/style.css">
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
                    }
                    else{
                        if($_SESSION['dn']== 1 || $_SESSION['dn']==2 ||$_SESSION['dn']==3)
                        {
                            echo '<a href="thongtinchungnv.php" class="nav-item nav-link">Hồ sơ</a>';
                        }
                        else{
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
                <p class="m-0 text-white">Quản lý thiết bị</p>
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
                       if(!$_SESSION['dn'])
                       {
                        echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
                        echo "<script>window.location.href = '../index.php';</script>";
                       }
                       echo '<li><a href="ThongTinchungNV.php">Thông tin chung</a></li>';
                       switch($_SESSION['dn'])
                       {
                        case 1:
                            {
                                echo' <li><a href="QLNV.php">Quản lý nhân viên</a></li>';
                                echo  '<li><a href="QLKM.php">Quản lý khuyến mãi</a></li>';
                                echo  '<li><a href="QLLLV.php">Quản lý lịch làm việc</a></li>';
                                echo  '<li><a href="QLGT.php">Quản lý Gói tập</a></li>';
                                break;
                            }
                            case 2:
                                {
                                    echo' <li><a href="QLTV.php">Quản lý Thành viên</a></li>';
                                    echo  '<li><a href="QLTB.php">Quản lý thiết bị</a></li>';
                                    break;
                                }
                            case 3: 
                                {
                                    echo' <li><a href="QLHD.php">Quản lý hóa đơn</a></li>';
                                    echo  '<li><a href="Capnhattrangthai.php">Cập nhật tình trạng thanh toán</a></li>';
                                    break;
                                }
                       }
                       
                        
                       

                     echo   '<li><a href="dangxuat.php">Logout</a></li>';

                        ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="right">
            <div class="qltv">
                <h1 align="center">Quản lý Gói tập</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Tìm gói tập">
                    <button class="search-btn">&#128269;</button>
                </div>

                <!-- Nút tạo gói tập mới -->
                <div class="create-package-btn" align="center">
                    <button id="createPackageBtn" class="btn btn-primary">Tạo Gói Tập Mới</button>
                </div>

                <!-- Form tạo gói tập mới ẩn đi -->
                <div id="createPackageForm" class="create-package-form" style="display: none; margin-top: 20px;">
                    <h3>Thêm Gói Tập Mới</h3>
                    <form method="POST" action="add_goitap.php">
                        <!-- Thay đổi backend script -->
                        <div class="form-group">
                            <label for="packageName">Tên Gói Tập</label>
                            <input type="text" id="packageName" name="TenGoi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="packagePrice">Giá Gói Tập</label>
                            <input type="number" id="packagePrice" name="Gia" class="form-control" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="packageDuration">Thời Gian (Tháng)</label>
                            <input type="number" id="packageDuration" name="ThoiHan" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Lưu</button>
                        <button type="button" id="cancelCreate" class="btn btn-danger">Hủy</button>
                    </form>
                </div>


                <!-- Bảng danh sách gói tập -->
                <div class="package-list" style="margin-top: 20px;">
                    <h3>Danh Sách Gói Tập</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Gói</th>
                                <th>Giá</th>
                                <th>Thời Gian (Tháng)</th>
                                <th>Hành Động</th>
                            </tr>


                        </thead>





                        <tbody id="packageTableBody">


                            <!-- Dữ liệu sẽ được hiển thị ở đây -->
                            <div id="editPackageForm" class="create-package-form"
                                style="display: none; margin-top: 20px;">
                                <h3>Sửa Gói Tập</h3>

                                <form method="POST" action="edit_goitap.php" id="editForm">
                                    <!-- Thay đổi backend script -->
                                    <input type="hidden" id="editPackageId" name="id">
                                    <!-- Thêm trường id để xác định gói tập cần sửa -->
                                    <div class="form-group">
                                        <label for="editPackageName">Tên Gói Tập</label>
                                        <input type="text" id="editPackageName" name="TenGoi" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPackagePrice">Giá Gói Tập</label>
                                        <input type="number" id="editPackagePrice" name="Gia" class="form-control"
                                            step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPackageDuration">Thời Gian (Tháng)</label>
                                        <input type="number" id="editPackageDuration" name="ThoiHan"
                                            class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                    <button type="button" id="cancelEdit" class="btn btn-danger">Hủy</button>
                                </form>
                            </div>
                        </tbody>
                    </table>
                </div>

                <!-- JavaScript -->





                <!-- Removed redundant JavaScript code -->





                <!-- JavaScript để hiển thị form -->
                <script>
                // Lắng nghe sự kiện nhấn vào nút tạo gói tập mới
                document.getElementById('createPackageBtn').addEventListener('click', function() {
                    // Hiển thị form tạo gói tập
                    document.getElementById('createPackageForm').style.display = 'block';
                });

                // Lắng nghe sự kiện nhấn vào nút hủy
                document.getElementById('cancelCreate').addEventListener('click', function() {
                    // Ẩn form tạo gói tập
                    document.getElementById('createPackageForm').style.display = 'none';
                });




                //scrip cua sua
                $(document).on('click', '.edit-package-btn', function() {
                    var packageId = $(this).data('id');
                    var packageName = $(this).data('name');
                    var packagePrice = $(this).data('price');
                    var packageDuration = $(this).data('duration');

                    // Điền dữ liệu vào form sửa
                    $('#editPackageId').val(packageId);
                    $('#editPackageName').val(packageName);
                    $('#editPackagePrice').val(packagePrice);
                    $('#editPackageDuration').val(packageDuration);

                    // Hiển thị form sửa
                    $('#editPackageForm').show();
                });

                //
                </script>

            </div>


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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // Khi form được submit
    $("form#createPackageForm").submit(function(event) {
        event.preventDefault(); // Ngừng hành động mặc định của form

        // Lấy dữ liệu từ form
        var formData = $(this).serialize();

        // Gửi dữ liệu qua Ajax
        $.ajax({
            url: "add_goitap.php", // File xử lý dữ liệu
            type: "POST",
            data: formData,
            success: function(response) {
                // Sau khi lưu thành công, tải lại danh sách gói tập
                loadPackageList();
                alert("Gói tập đã được lưu thành công!");
            },
            error: function() {
                alert("Có lỗi xảy ra khi lưu gói tập.");
            }
        });
    });

    // Hàm tải lại danh sách gói tập từ cơ sở dữ liệu
    function loadPackageList() {
        $.ajax({
            url: "get_goitap_list.php", // Tạo file này để lấy dữ liệu
            success: function(response) {
                // Cập nhật bảng danh sách gói tập
                $("#packageTableBody").html(response);
            }
        });
    }

    // Gọi hàm loadPackageList khi trang được tải
    $(document).ready(function() {
        loadPackageList();
    });
    </script>

</body>




</html>