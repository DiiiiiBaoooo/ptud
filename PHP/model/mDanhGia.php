<?php
    include_once('ketnoi.php');

    class mDanhGia{
        
        // kiet
        public function xemdanhgia()
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from `danhgia` d join thanhvien v on v.IDThanhVien = d.ID_ThanhVien ";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function createDanhGia($idtv,$noidung)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "INSERT INTO `danhgia` (`ID_DanhGia`, `NoiDung`, `ID_ThanhVien`) values ('NULL','$noidung',$idtv);";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
    }
?>