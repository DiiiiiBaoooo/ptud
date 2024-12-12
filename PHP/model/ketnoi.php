
<?php
class clsketnoi {
    public function MoKetNoi() {
        // Kết nối tới MySQL
        $conn = mysqli_connect("localhost", "root", "", "ptud");

        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        // Thiết lập mã hóa ký tự UTF-8
        mysqli_set_charset($conn, "utf8mb4");

        return $conn;
    }

    public function DongKetNoi($conn) {
        // Kiểm tra xem kết nối có tồn tại hay không trước khi đóng
        if ($conn) {
            mysqli_close($conn);
        }
    }
}
?>

