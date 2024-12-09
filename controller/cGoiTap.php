<?php
    include_once('../model/mGoiTap.php');

    class cGoiTap {
        // Lấy tất cả các gói tập
        public function getAllGT() {
            $p = new mGoiTap();
            $kq = $p->selectAllGT();
            if (mysqli_num_rows($kq) > 0) {
                return $kq;
            } else {
                return false;
            }
        }

        // Lấy 1 gói tập theo ID
        public function get1GT($idgt) {
            $p = new mGoiTap();
            $kq = $p->select1GT($idgt);
            if (mysqli_num_rows($kq) > 0) {
                return $kq;
            } else {
                return false;
            }
        }

        // Thêm gói tập mới vào CSDL
        public function addGoiTap($tenGoi, $gia, $thoiHan) {
            $p = new mGoiTap();
            $kq = $p->insertGoiTap($tenGoi, $gia, $thoiHan);
            if ($kq) {
                return true;  // Thêm thành công
            } else {
                return false; // Thêm thất bại
            }
        }
        public function updateGT($idgt,$tenGoi, $gia, $thoiHan)
        {
            $p = new mGoiTap();
            $kq = $p->suagoitap($idgt,$tenGoi, $gia, $thoiHan);
            if ($kq) {
                return true;  // Thêm thành công
            } else {
                return false; // Thêm thất bại
            }
        }
        public function deletegt($idgt)
        {
            $p = new mGoiTap();
            $kq = $p->xoagoitap($idgt);
            if ($kq) {
                return true;  // Thêm thành công
            } else {
                return false; // Thêm thất bại
            }
        }
    }


    
?>