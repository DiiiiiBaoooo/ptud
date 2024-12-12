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
        public function selectAllThietBiLoi()
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from thietbi_loi tbl join thietbi t on t.IDThietBi=tbl.IDThietBi";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
    
        public function queryThietBi($idtb)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            // $query = "SELECT * FROM thietbi  where IDThietBi ='$idtb' LIMIT 1";
            $query = "SELECT * FROM thietbi n join thietbi_loi tbl WHERE n.IDThietBi = tbl.IDThietBi WHERE IDThietBi = '$idtb'  LIMIT 1";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
    
    
        public function select2ThietBi($idtb)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * FROM thietbi n join thietbi_loi tbl WHERE n.IDThietBi = tbl.IDThietBi WHERE IDThietBi = '$idtb' LIMIT 1";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function mBaoCaoLoi($ngayxayraloi, $ttloi, $chiphi, $ketqua, $idtb)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
    
            // Kiểm tra nếu thiết bị đã có lỗi
            $checktruyvan = "SELECT * FROM thietbi_loi WHERE IDThietBi = '$idtb'";
            $checkresult = mysqli_query($con, $checktruyvan);
            if (mysqli_num_rows($checkresult) > 0) {
                $p->DongKetNoi($con);
                return false; // Thiết bị đã có báo cáo lỗi
            }
    
            // Thêm báo cáo lỗi
            $truyvan = "INSERT INTO thietbi_loi(NgayXayRaLoi, ThongTinLoi, ChiPhiBaoTri, KetQuaBaoTri, IDThietBi) 
                        VALUES ('$ngayxayraloi', '$ttloi', '$chiphi', '$ketqua', '$idtb')";
            $kq = mysqli_query($con, $truyvan);
    
            if (!$kq) {
                $error = "Lỗi SQL: " . mysqli_error($con);
                $p->DongKetNoi($con);
                return $error; // Trả về lỗi chi tiết để xử lý
            }
    
            $p->DongKetNoi($con);
            return true; // Báo cáo lỗi thành công
        }
        public function searchTB($timkiem)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from  thietbi where TenThietBi like '%$timkiem%' ;";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function searchTBloi($timkiem)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * from  thietbi_loi tbl join thietbi tb on tbl.IDThietBi =tb.IDThietBi where TenThietBi like '%$timkiem%' ;";
            $kq = mysqli_query($con, $query);
            $p->DongKetNoi($con);
            return $kq;
        }
       
       
    }
?>