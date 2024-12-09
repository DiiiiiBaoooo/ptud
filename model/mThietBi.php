<?php
    include_once('ketnoi.php');
    class mThietBi{
        public function selectAllTB(){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from ThietBi order by IDThietBi ASC";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function insertThietBi($tentb,$tinhtrang,$ngaysx,$noisx)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "INSERT INTO `thietbi` (`IDThietBi`, `TenThietBi`, `TinhTrang`, `NgaySanXuat`, `NoiSanXuat`) VALUES (NULL, '$tentb', '$tinhtrang', '$ngaysx', '$noisx');";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function SuaThietBi($idtb,$tentb,$tinhtrang,$ngaysx,$noisx)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "UPDATE `thietbi` SET `TenThietBi` = '$tentb', `TinhTrang` = '$tinhtrang', `NgaySanXuat` = '$ngaysx', `NoiSanXuat` = '$noisx' WHERE `thietbi`.`IDThietBi` = $idtb;";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function selectAllThietbi(){
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from ThietBi order by IDThietBi ASC";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function select01TB($idtb)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $truyvan = "SELECT * FROM `thietbi` WHERE IDThietBi = '$idtb'";
            $ketqua = mysqli_query($con, $truyvan); 
            $p->DongKetNoi($con);
            return $ketqua;
        }
    
        public function deleteTB($idtb)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $truyvan = "DELETE FROM thietbi  WHERE IDThietBi = '$idtb'";
            $ketqua = mysqli_query($con, $truyvan); 
            $p->DongKetNoi($con);
            return $ketqua;
        }
        
        public function updateTB($idtb, $tentb, $tt, $ngaysx, $noisx)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $truyvan = "UPDATE thietbi SET TenThietBi = '$tentb', TinhTrang = '$tt', NgaySanXuat = '$ngaysx', NoiSanXuat = '$noisx' WHERE IDThietBi = '$idtb'";
            $ketqua = mysqli_query($con, $truyvan); 
            $p->DongKetNoi($con);
            return $ketqua;
        }
    
       
    }
?>