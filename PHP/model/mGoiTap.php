<?php
    include_once('ketnoi.php');
    
    class mGoiTap {
        // Lấy tất cả các gói tập từ CSDL
        public function selectAllGT() {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * FROM goitap ORDER BY IDGoiTap ASC";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }

        // Lấy 1 gói tập theo ID
        public function select1GT($idgt) {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * FROM goitap WHERE IDGoiTap = '$idgt' LIMIT 1";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }

        // Thêm gói tập mới vào CSDL
        public function insertGoiTap($tenGoi, $gia, $thoiHan) {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            
            // Truy vấn SQL để chèn dữ liệu vào bảng goitap
            $query = "INSERT INTO goitap (TenGoi, Gia, ThoiHan) VALUES ('$tenGoi', '$gia', '$thoiHan')";
            
            // Thực thi truy vấn và kiểm tra kết quả
            if (mysqli_query($con, $query)) {
                $p->DongKetNoi($con);
                return true;  // Nếu lưu thành công
            } else {
                $p->DongKetNoi($con);
                return false;  // Nếu có lỗi khi lưu
            }
        }
         public function suagoitap($idgt,$tenGoi, $gia, $thoiHan)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            
            // Truy vấn SQL để chèn dữ liệu vào bảng goitap
            $query = "update goitap set TenGoi = '$tenGoi', Gia = '$gia', ThoiHan ='$thoiHan' where IDGoiTap =$idgt limit 1;";
            
            // Thực thi truy vấn và kiểm tra kết quả
            if (mysqli_query($con, $query)) {
                $p->DongKetNoi($con);
                return true;  // Nếu lưu thành công
            } else {
                $p->DongKetNoi($con);
                return false;  // Nếu có lỗi khi lưu
            }
        }
        public function xoagoitap($idgt)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            
            // Truy vấn SQL để chèn dữ liệu vào bảng goitap
            $query = "delete from  goitap where IDGoiTap =$idgt  limit 1;";
            
            // Thực thi truy vấn và kiểm tra kết quả
            if (mysqli_query($con, $query)) {
                $p->DongKetNoi($con);
                return true;  // Nếu lưu thành công
            } else {
                $p->DongKetNoi($con);
                return false;  // Nếu có lỗi khi lưu
            }
        }



        public function timkiemgt($timkiem)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from goitap where TenGoi like '%$timkiem%'";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function select2GT() {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * FROM goitap ORDER BY IDGoiTap ASC limit 2";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }

    }
    
?>