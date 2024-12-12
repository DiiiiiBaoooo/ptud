<?php
include_once('../model/mNhanVien.php');

class cNhanVien
{
    public function get1nhanvien($taikhoan, $matkhau)
    {
        $p = new mNhanVien();
        $matkhau = md5($matkhau);
        $con = $p->select1NhanVien($taikhoan, $matkhau);
        if ($con === false) {
            echo "Lỗi truy vấn: " . mysqli_error($p->$con); // Kiểm tra lỗi của truy vấn
        } else {
            if (mysqli_num_rows($con)) {
                while ($r = mysqli_fetch_assoc($con)) {
                    session_start();
                    $_SESSION["dn"] = $r["IDRole"];
                    $_SESSION["id"] = $r["IDNhanVien"];
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

        $kq = $p->queryNhanVien($idnv);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function getAllNV()
    {
        $p = new mNhanVien();

        $kq = $p->SelectAllNV();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function CapNhatTTNV($idnv, $tennv, $sdt, $email, $diachi, $idrole)
    {
        $p = new mNhanVien();
        $kq = $p->CapNhatTT($idnv, $tennv, $sdt, $email, $diachi, $idrole);
        return $kq;
    }
    public function getLichByID($idtv)
    {
        $p = new mNhanVien();
        $kq = $p->selectLichByID($idtv);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }

    public function setLich($idLichLamViec, $ngayLamViec, $caLamViec, $trangThai, $idNhanVien)
    {

        $p = new mNhanVien();
        $result = $p->insertLich($idLichLamViec, $ngayLamViec, $caLamViec, $trangThai, $idNhanVien);
        if ($result === -1) {
            return -1;
        } elseif ($result === 0) {
            return 0;
        } else {
            return $result;
        }
    }

    public function xoaLich($idLichLamViec)
    {
        $p = new mNhanVien();
        $result = $p->xoaLich($idLichLamViec);

        if ($result) {
            return true; // Xóa  thành công
        } else {
            return false; // Xóa thất bại hoặc không tồn tại
        }
    }

    public function getNVByID($gt)
    {
        $p = new mNhanVien();
        $tblSP = $p->selectNVByID($gt);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0; // la 0 co dong du lieu 
            }
        }
    }

    public function getNVByName($ten)
    {
        $p = new mNhanVien();
        $tblSP = $p->selectNVByName($ten);

        if (!$tblSP) {

            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0; // la 0 co dong du lieu 
            }
        }
    }

    public function setCapNhatLich($idLichLamViec, $ngayLamViec, $caLamViec, $trangThai, $idNhanVien)
    {

        $p = new mNhanVien();
        $tblSP = $p->capNhatLich($idLichLamViec, $ngayLamViec, $caLamViec, $trangThai, $idNhanVien);

        if ($tblSP === -1) {
            return -1;
        } elseif ($tblSP === 0) {
            return 0;
        } else {
            return $tblSP;
        }
    }

    // public function kiemTraLichTrung($ngayLamViec, $caLamViec, $trangThai, $idNhanVien){


    //     $p = new mNhanVien();
    //     $tblSP = $p->kiemTraLichTrung($ngayLamViec, $caLamViec, $trangThai, $idNhanVien);

    //     if ($tblSP === -1) {
    //         return -1;
    //     } elseif ($tblSP === 0) {
    //         return 0;
    //     } else {
    //         return 1;
    //     }
    // }


    public function Query2NV($idnv)
    {
        $p = new mNhanVien();
        $tbl = $p->select2NV($idnv);
        if (mysqli_num_rows($tbl) > 0) {
            return $tbl;
        } else {
            return false;
        }
    }




    // dang ky tu van
    public function getAllTuVan()
    {
        $p = new mNhanVien();
        $kq = $p->SelectAllTuVan();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }


    public function CapNhat($idnv, $tennv, $sdt, $email, $diachi)
    {
        $p = new mNhanVien();
        $kq = $p->CapNhatTTNV($idnv, $tennv, $sdt, $email, $diachi);
        return $kq;
    }


    public function cThem($tennv, $sdt, $matkhau, $diachi, $email, $ngayvaolam, $idrole)
    {
        $p = new mNhanVien();
        $ar = array();
        $r = $this->getAllNV();
        foreach ($r as $row) {
            $ar[] = $row['SoDienThoai'];
        }
        if (in_array($sdt, $ar)) {
            echo "<script>alert('Số điện thoại đã tồn tại')</script>";
            header("refresh:0;url='../view/QLNV.php'");
            return;
        } else {
            $kq = $p->mThem($tennv, $sdt, $matkhau, $diachi, $email, $ngayvaolam, $idrole);
            if ($kq) {
                return $kq;
            } else {
                return false;
            }
        }
    }



    public function cXoaNV($idnv)
    {
        $p = new mNhanVien();
        if ($idnv == 1) {
            echo "<script>alert('Bạn không thể xóa tài khoản admin')</script>";
            header("refresh:0;url='../view/QLNV.php'");
            return;
        } else {
            $con = $p->mXoaNV($idnv);
            return $con;
        }
    }

    //search
    public function searchNV($keyword)
    {
        include_once("../model/mNhanVien.php");
        $model = new mNhanVien();
        return $model->searchNV($keyword);
    }

    //  dang ky tu van

    public function cTuVan($tentuvan, $sdttv)
    {
        $p = new mNhanVien();
        $ar = array();
        $r = $this->getAllTuVan();

        $kq = $p->mTuVan($tentuvan, $sdttv);
        if ($kq) {
            return $kq;
        } else {
            return false;
        }
    }
    public function searchnhanvien($timkiem)
    {
        $p = new mNhanVien();

        $kq = $p->timkiemnhanvien($timkiem);


        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
}
