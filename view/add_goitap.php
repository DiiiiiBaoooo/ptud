<?php
session_start();
require_once('../model/ketnoi.php'); // Kết nối cơ sở dữ liệu

// Khởi tạo đối tượng kết nối
$p = new clsketnoi();
$conn = $p->MoKetNoi(); // Mở kết nối

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten_goi = $_POST['TenGoi'];
    $gia = $_POST['Gia'];
    $thoi_han = $_POST['ThoiHan'];

    // Kiểm tra dữ liệu trước khi insert vào cơ sở dữ liệu
    if (!empty($ten_goi) && !empty($gia) && !empty($thoi_han)) {
        // Sử dụng kết nối đã kiểm tra
        $sql = "INSERT INTO goitap (TenGoi, Gia, ThoiHan) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Kiểm tra nếu statement được tạo thành công
        if ($stmt) {
            $stmt->bind_param("sdi", $ten_goi, $gia, $thoi_han);
        
            if ($stmt->execute()) {
                echo "<script>alert('Thêm gói tập thành công!'); window.location.href = 'qlgoitap.php';</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại!');</script>";
            }
        } else {
            echo "<script>alert('Không thể chuẩn bị câu truy vấn.');</script>";
        }
    } else {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
    }
}
?>