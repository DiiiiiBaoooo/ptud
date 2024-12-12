<?php
    include_once('../model/mKhuyenMai.php');
    class cKhuyenMai{
        public function getAllKM()
        {
            $p = new mKHuyenMai();
            
            $kq= $p->SelectAllKM();
            if(mysqli_num_rows($kq)>0)
            {
                return $kq;
            }
            else
            {
                return false;
            }
        }
        public function  getDKKM($TongTien)
        {
            $p = new mKhuyenMai();
            
            $kq= $p->selectDKKM($TongTien);
            if(mysqli_num_rows($kq)>0)
            {
                return $kq;
            }
            else
            {
                return false;
            }
        }
        public function get1KM($idkm)
        {
            $p = new mKhuyenMai();
            
            $kq= $p->SelectKM($idkm);
            if(mysqli_num_rows($kq)>0)
            {
                return $kq;
            }
            else
            {
                return false;
            }
        }
        public function creatKM($tenkm,$noidung,$mucgiam,$dieukien)
        { $p = new mKhuyenMai();
            
            $kq= $p->taokhuyenmai($tenkm,$noidung,$mucgiam,$dieukien);
            return $kq;
        }
        public function updateKM($idkm,$tenkm,$noidung,$mucgiam,$dieukien)
        { $p = new mKhuyenMai();
            
            $kq= $p->suakhuyenmai($idkm,$tenkm,$noidung,$mucgiam,$dieukien);
            return $kq;
        }
        public function deletekm($idkm)
        { $p = new mKhuyenMai();
            
            $kq= $p->xoakm($idkm);
            return $kq;
        }
        public function searchkm($timkiem)
        {
            $p = new mKhuyenMai();
            
            $kq= $p->timkiemkm($timkiem);
            if(mysqli_num_rows($kq)>0)
            {
                return $kq;
            }
            else
            {
                return false;
            }
        }
    }
?>