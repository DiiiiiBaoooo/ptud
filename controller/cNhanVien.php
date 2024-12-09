<?php
    include_once('../model/mNhanVien.php');

    class cNhanVien{
        public function get1nhanvien($taikhoan, $matkhau){
            $p = new mNhanVien();
            $matkhau = md5($matkhau);
            $con = $p->select1NhanVien($taikhoan, $matkhau);
            if ($con === false) {
                echo "Lỗi truy vấn: " . mysqli_error($p->$con); // Kiểm tra lỗi của truy vấn
            } else {
                if(mysqli_num_rows($con)) {
                    while($r=mysqli_fetch_assoc($con)){
                        session_start();
                        $_SESSION["dn"]=$r["IDRole"];
                        $_SESSION["id"]=$r["IDNhanVien"];
                    }
                    echo "<script>alert('Đăng nhập thành công');</script>";
                    // Sau khi hiện alert, chuyển hướng người dùng
                    echo "<script>window.location.href = '../view/ThongTinChungNV.php';</script>";
                    
                    exit();  // Kết thúc script sau khi chuyển hướng
                } else {
                    echo "<script>alert('Đăng nhập thất bại');</script>";
                    // Sau khi hiện alert, chuyển hướng người dùng về trang đăng nhập
                    echo "<script>window.location.href = 'dangnhap.php';</script>";
                    exit();  // Kết thúc script sau khi chuyển hướng
                }
            }
        }
        public function Query1NV($idnv)
        {
            $p = new mNhanVien();
            
		$kq= $p->queryNhanVien($idnv);
		if(mysqli_num_rows($kq)>0)
		{
			return $kq;
		}
		else
		{
			return false;
		}
        }
        public function getAllNV()
        {
            $p = new mNhanVien();
            
		$kq= $p->SelectAllNV();
		if(mysqli_num_rows($kq)>0)
		{
			return $kq;
		}
		else
		{
			return false;
		}
        }
        public function CapNhat($idnv,$tennv,$sdt,$email,$diachi)
        {
            $p = new mNhanVien();
            $kq= $p->CapNhatTT($idnv,$tennv,$sdt,$email,$diachi);
            return $kq;

        }
        public function getLichByID($idtv)
        {
            $p = new mNhanVien();
		$kq= $p->selectLichByID($idtv);
		if(mysqli_num_rows($kq)>0)
		{
			return $kq;
		}
		else
		{
			return false;
		}
        }

        public function setLich($idLichLamViec,$ngayLamViec, $caLamViec, $trangThai, $idNhanVien){
            
            $p = new mNhanVien();
            $result = $p->insertLich($idLichLamViec,$ngayLamViec, $caLamViec, $trangThai, $idNhanVien);
            if ($result === -1) {
                return -1;
            } elseif ($result === 0) {
                return 0;
            } else {
                return $result;
            }
        }
        
        public function xoaLich($idLichLamViec){
            $p = new mNhanVien();
            $result = $p->xoaLich($idLichLamViec);
            
            if($result){
                return true; // Xóa  thành công
            } else {
                return false; // Xóa thất bại hoặc không tồn tại
            }
        }

        public function getNVByID($gt){
            $p = new mNhanVien();
            $tblSP = $p -> selectNVByID($gt);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP -> num_rows>0){
                    return $tblSP;
                }else{
                    return 0; // la 0 co dong du lieu 
                }
            }
        }

        public function getNVByName($ten){
            $p = new mNhanVien();
            $tblSP = $p->selectNVByName($ten);
            
            if(!$tblSP){
                
                return -1;
            }else{
                if($tblSP -> num_rows>0){
                    return $tblSP;
                }else{
                    return 0; // la 0 co dong du lieu 
                }
            }
        }

        public function setCapNhatLich($idLichLamViec,$ngayLamViec, $caLamViec, $trangThai, $idNhanVien){
            
            $p = new mNhanVien();
            $tblSP = $p->capNhatLich($idLichLamViec,$ngayLamViec, $caLamViec, $trangThai, $idNhanVien);
            
            if ($tblSP === -1) {
                return -1;
            } elseif ($tblSP === 0) {
                return 0;
            } else {
                return $tblSP;
            }
        }

        public function kiemTraLichTrung($ngayLamViec, $caLamViec, $trangThai, $idNhanVien){
            
            
            $p = new mNhanVien();
            $tblSP = $p->kiemTraLichTrung($ngayLamViec, $caLamViec, $trangThai, $idNhanVien);
            
            if ($tblSP === -1) {
                return -1;
            } elseif ($tblSP === 0) {
                return 0;
            } else {
                return 1;
            }
        }
        


    }   
?>