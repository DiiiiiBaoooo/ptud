<?php
    include_once('ketnoi.php');

    class mNhanVien{
        public function select1NhanVien($taikhoan, $matkhau){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from nhanvien where SoDienThoai ='$taikhoan' and Password ='$matkhau' LIMIT 1";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function queryNhanVien($idnv){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from nhanvien n join vaitro v on v.IDRole= n.IDRole where IDNhanVien ='$idnv' LIMIT 1";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function SelectAllNV(){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from nhanvien order by IDNhanVien ASC";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function CapNhatTT($idnv,$tennv,$sdt,$email,$diachi)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "UPDATE `nhanvien` SET `TenNhanVien` = '$tennv', `SoDienThoai` = '$sdt', `DiaChi` = '$diachi', `Email` = '$email' WHERE `nhanvien`.`IDNhanVien` = $idnv;";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }

        // kim nhàn
        public function selectLichByID($idtv){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from lichlamviec l join nhanvien tv on l.IDNhanVien = tv.IDNhanVien where l.IDNhanVien = '$idtv'";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }

        public function selectLichByIDDHT($idtv){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from lichlamviec l join nhanvien tv on l.IDNhanVien = tv.IDNhanVien where l.IDNhanVien = '$idtv' and l.TrangThai=N'Đã hoàn thành'";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }

        public function selectLichByIDCHT($idtv){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from lichlamviec l join nhanvien tv on l.IDNhanVien = tv.IDNhanVien where l.IDNhanVien = '$idtv' and l.TrangThai=N'Chưa hoàn thành'";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }

        public function insertLich($idLichLamViec,$ngayLamViec, $caLamViec, $trangThai, $idNhanVien)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $str = "INSERT INTO `lichlamviec` (`IDLichLamViec`, `NgayLamViec`, `CaLamViec`, `TrangThai`, `IDNhanVien`) VALUES ($idLichLamViec, '$ngayLamViec', '$caLamViec', '$trangThai', $idNhanVien)";
            $kq = $con->query($str);
            $p->DongKetNoi($con);
            if($kq === true){
                return 1;
            }else{
                return -1;
            }
        }

        public function xoaLich($idLichLamViec){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            if($con){
                $str = "DELETE FROM lichlamviec WHERE IDLichLamViec = $idLichLamViec";
                $result = $con->query($str);
                $p->DongKetNoi($con);
                
                if($result){
                    return true; // Xóa thành công
                } else {
                    return false; // Xóa  thất bại
                }
            } else {
                return false; // Không thể kết nối CSDL
            }
        }
        
        public function selectNVByID($gt){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            if($con){
                $str = "select * from nhanvien where IDNhanVien = $gt ";
                $tblSP = $con ->query($str);
                $p->DongKetNoi($con);
                return $tblSP; 
            }else{
                return false; // khong the ket noi CSDL
            }
        }

        public function selectNVByName($ten){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            if($con){
                $str = "select * from nhanvien where TenNhanVien like N'%$ten%' ";
                $tblSP = $con ->query($str);
                $p->DongKetNoi($con);
                return $tblSP; 
            }else{
                return false; // khong the ket noi CSDL
            }
        }

        public function capNhatLich($idLichLamViec,$ngayLamViec, $caLamViec, $trangThai, $idNhanVien){
            
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            if($con){
                
                $str = "UPDATE `lichlamviec` SET `NgayLamViec` = '$ngayLamViec', `CaLamViec` = '$caLamViec', `TrangThai` = '$trangThai'WHERE IDLichLamViec = $idLichLamViec";
                $tblSP = $con->query($str);
                $p->DongKetNoi($con);
                if ($tblSP === true) {
                    return 1; // Sửa thành công
                } else {
                    echo 'Truy vấn không thành công';
                    return -1; // Lỗi khi thực thi truy vấn
                }
            } else {
                echo 'Không thể kết nối CSDL.';
                return -1; // Không thể kết nối CSDL
            }
        }

        public function kiemTraLichTrung($ngayLamViec, $caLamViec, $trangThai, $idNhanVien){
            
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            if($con){
                
                $str = "SELECT * FROM `lichlamviec` WHERE `NgayLamViec` = '$ngayLamViec' AND `CaLamViec` = '$caLamViec' AND `TrangThai` = '$trangThai' AND `IDNhanVien` = $idNhanVien";
                $tblSP = $con->query($str);
                $p->DongKetNoi($con);
                if ($tblSP === true) {
                    return 1; // co du lieu trung
                } else {
                    return -1; // Lỗi khi thực thi truy vấn
                }
            } else {
                echo 'Không thể kết nối CSDL.';
                return -1; // Không thể kết nối CSDL
            }
        }


        
    }

?>