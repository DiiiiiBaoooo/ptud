<?php
    include_once('ketnoi.php');
    class mKhuyenMai{
        public function SelectAllKM(){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from khuyenmai order by IDKhuyenMai ASC";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function selectDKKM($TongTien)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from khuyenmai where DieuKien <= '$TongTien' ";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function selectKM($idkm)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from khuyenmai where IDKhuyenMai = $idkm  limit 1";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function taokhuyenmai($tenkm,$noidung,$mucgiam,$dieukien)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "insert into khuyenmai (TenKhuyenMai,NoiDung,MucGiamGia,DieuKien) values ('$tenkm','$noidung',$mucgiam,$dieukien);";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function suakhuyenmai($idkm,$tenkm,$noidung,$mucgiam,$dieukien)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "update khuyenmai set TenKhuyenMai = '$tenkm',NoiDung = '$noidung',MucGiamGia = '$mucgiamm',  DieuKien ='$dieukien' where IDKhuyenMai = '$idkm' limit 1;";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function xoakm($idkm)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "delete from khuyenmai where IDKhuyenMai = '$idkm' limit 1;";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function timkiemkm($timkiem)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from khuyenmai where TenKhuyenMai like '%$timkiem%'";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
    }
?>