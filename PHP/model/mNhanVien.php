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
        public function CapNhatTT($idnv,$tennv,$sdt,$email,$diachi,$idrole)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "UPDATE `nhanvien` SET `TenNhanVien` = '$tennv', `SoDienThoai` = '$sdt', `DiaChi` = '$diachi', `Email` = '$email', `IDrole` = '$idrole' WHERE `nhanvien`.`IDNhanVien` = $idnv;";
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

        public function SelectAllTuVan(){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from TuVan";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
            public function CapNhatTTNV($idnv, $tennv, $sdt, $email, $diachi)
            {
                $p = new clsketnoi();
                $con = $p->MoKetNoi();
                $query = "UPDATE nhanvien SET TenNhanVien = '$tennv', SoDienThoai = '$sdt', DiaChi = '$diachi', Email = '$email' WHERE IDNhanVien = '$idnv' ";
                $kq = mysqli_query($con, $query);
                $p->DongKetNoi($con);
                return $kq;
            }
    
        public function select2NV($idnv)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from nhanvien  nv join  vaitro v on nv.IDRole = v.IDRole where nv.IDNhanVien ='$idnv'";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
    
        // them nv
       public function mThem($tennv,$sdt,$matkhau,$diachi,$email, $ngayvaolam, $idrole){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $checktruyvan = "SELECT * FROM nhanvien WHERE TenNhanVien = '$tennv'";
            $checkresult =  mysqli_query($con, $checktruyvan);
            if(mysqli_num_rows($checkresult) > 0){
                $p->DongKetNoi($con);
                return "tai khoan da ton tai";
            }else{
                $truyvan = "INSERT INTO nhanvien(TenNhanVien, SoDienThoai, Password, DiaChi, Email, NgayVaoLam, IDRole)
                VALUES ('$tennv','$sdt','$matkhau','$diachi','$email','$ngayvaolam','$idrole')";
                $con = $p->MoKetNoi();
                $kq = mysqli_query($con, $truyvan);
                $p->DongKetNoi($con);
                return $kq;
            }
       }
    
       public function mXoaNV($idnv)
       {
           $p = new clsketnoi();
           $con = $p->MoKetNoi();
           // Sửa câu lệnh SQL
           $query = "DELETE FROM nhanvien WHERE IDNhanVien = '$idnv'";
           $kq = mysqli_query($con, $query);
           $p->DongKetNoi($con);
           return $kq;
       }
       
    
        // search 
        public function searchNV($keyword) {
            // Kết nối cơ sở dữ liệu
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            
            // Xử lý từ khóa tìm kiếm
            $keyword = "%" . $keyword . "%";  // Thêm dấu "%" vào trước và sau từ khóa tìm kiếm
            $query = "SELECT * FROM nhanvien WHERE TenNhanVien LIKE ?";
            
            // Chuẩn bị và thực thi câu lệnh SQL
            if ($stmt = mysqli_prepare($con, $query)) {
                mysqli_stmt_bind_param($stmt, "s", $keyword);  // "s" là kiểu dữ liệu cho string
                mysqli_stmt_execute($stmt);
                
                // Lấy kết quả
                $result = mysqli_stmt_get_result($stmt);
                
                // Kiểm tra kết quả
                if (mysqli_num_rows($result) > 0) {
                    return $result;  // Trả về danh sách kết quả
                } else {
                    return null;  // Không tìm thấy kết quả
                }
            }
            $p->DongKetNoi($con);  // Đóng kết nối
        }
        //  đăng ký tư vấn
    
        public function mTuVan ( $tentuvan, $sdttv){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $checktruyvan = "SELECT * FROM TuVan WHERE HoTen = '$tentuvan'";
            $checkresult =  mysqli_query($con, $checktruyvan);
            if(mysqli_num_rows($checkresult) > 0){
                $p->DongKetNoi($con);
                return "tai khoan da ton tai";
            }else{
                $truyvan = "INSERT INTO TuVan(HoTen, SoDienThoaiTV)
                VALUES ('$tentuvan','$sdttv')";
                $con = $p->MoKetNoi();
                $kq = mysqli_query($con, $truyvan);
                $p->DongKetNoi($con);
                return $kq;
            
        }
    }
        public function timkiemnhanvien($timkiem)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from  nhanvien where TenNhanVien like '%$timkiem%'  or SoDienThoai like '%$timkiem%' ;";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        
    }
        
    

?>