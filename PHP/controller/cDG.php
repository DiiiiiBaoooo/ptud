<?php
session_start();

// Bao gồm file kết nối cơ sở dữ liệu
include('../model/ketnoi.php');  // Đảm bảo rằng bạn đã bao gồm đúng file kết nối

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['dn']) || !$_SESSION['dn']) {
    echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
    echo "<script>window.location.href = '../index.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $noidung = $_POST['message'];  // Nội dung phản hồi
    $id_thanhvien = $_SESSION['id'];  // Giả sử ID người dùng lưu trong session

    // Kiểm tra nếu nội dung phản hồi không rỗng
    if (!empty($noidung)) {
        // Tạo đối tượng kết nối và mở kết nối
        $ketnoi = new clsketnoi();
        $conn = $ketnoi->MoKetNoi();  // Mở kết nối cơ sở dữ liệu

        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng "danhgia"
        $sql = "INSERT INTO danhgia (NoiDung, ID_ThanhVien) VALUES (?, ?)";

        // Sử dụng chuẩn bị câu lệnh SQL để tránh SQL Injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $noidung, $id_thanhvien);  // "si" là kiểu dữ liệu (s - string, i - integer)

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            echo "<script>alert('Phản hồi của bạn đã được gửi thành công!');</script>";
            echo "<script>window.location.href = 'http://localhost/ptud/view/danhgia.php';</script>";
        } else {
            echo "<script>alert('Có lỗi xảy ra khi gửi phản hồi!');</script>";
            echo "<script>window.location.href = 'http://localhost/ptud/view/danhgia.php';</script>";
        }

        // Đóng kết nối
        $ketnoi->DongKetNoi($conn);  // Đóng kết nối cơ sở dữ liệu

    } else {
        echo "<script>alert('Vui lòng nhập nội dung phản hồi!');</script>";
    }
} else {
    echo "<script>window.location.href = 'DanhGia.php';</script>";
}
