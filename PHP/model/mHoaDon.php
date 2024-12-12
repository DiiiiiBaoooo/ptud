<?php
    include_once('ketnoi.php');
    class mHoaDon{
        public function InsertHD($tongtien,$ngayLapHD,$idtv)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $truyvan = "INSERT INTO `hoadon` (`IDHoaDon`, `SoTien`, `TinhTrangThanhToan`, `NgayLapHoaDon`, `IDThanhVien`, `IDNhanVien`) VALUES (NULL,'$tongtien', 'Chưa Thanh Toán', '$ngayLapHD', '$idtv', '1');";
			$ketqua = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $ketqua;
        }
        public function selectAllHoaDon($idtv)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $truyvan = "SELECT * FROM `hoadon` hd join thanhvien tv on hd.IDThanhVien = tv.IDThanhVien  WHERE `TinhTrangThanhToan` not LIKE 'Chưa Thanh Toán'  AND  hd.`IDThanhVien` = '$idtv'  ";
			$ketqua = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $ketqua;
        }
        public function selectAllHDChTT($idtv)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $truyvan = "SELECT * FROM `hoadon` WHERE `TinhTrangThanhToan` LIKE 'Chưa Thanh Toán' AND `IDThanhVien` = '$idtv' ORDER BY `TinhTrangThanhToan` DESC";
			$ketqua = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $ketqua;
        }
        public function select1HD($idhd)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $truyvan = "SELECT * FROM `hoadon` WHERE  `IDHoaDon` = '$idhd' ";
			$ketqua = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $ketqua;
        }
        public function UpdateHDTV($idhd,$sotien,$HTTT,$ngayThanhToan)
        {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $truyvan = "UPDATE `hoadon` SET `SoTien`= '$sotien',`TinhTrangThanhToan` = 'Chờ xác nhận', `HinhThucThanhToan` = '$HTTT', `NgayThanhToan` = '$ngayThanhToan' WHERE `hoadon`.`IDHoaDon` = $idhd;";
			$ketqua = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $ketqua;
        }
        // trinh
        

        public function UpdateTT($idhd, $trangThai) {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $con->set_charset('utf8');
            $truyvan = "UPDATE hoadon SET TinhTrangThanhToan = '$trangThai' WHERE IDHoaDon = $idhd";
            $ketqua = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $ketqua;
        }

        public function selectChiTietHD($idhd) {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $con->set_charset('utf8');
            $truyvan = "SELECT hd.*, tv.TenThanhVien, nv.TenNhanVien
                        FROM hoadon hd 
                        LEFT JOIN thanhvien tv ON hd.IDThanhVien = tv.IDThanhVien
                        LEFT JOIN nhanvien nv ON hd.IDNhanVien = nv.IDNhanVien
                        WHERE hd.IDHoaDon = $idhd";
            $ketqua = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $ketqua;
        }

        public function selectHDByName($keyword, $status = '') {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $con->set_charset('utf8');
            if ($con) {
                $truyvan = "SELECT hd.*, tv.TenThanhVien, nv.TenNhanVien
                            FROM hoadon hd
                            LEFT JOIN thanhvien tv ON hd.IDThanhVien = tv.IDThanhVien
                            LEFT JOIN nhanvien nv ON hd.IDNhanVien = nv.IDNhanVien
                            WHERE 1";
                if (!empty($keyword)) {
                    $truyvan .= " AND tv.TenThanhVien LIKE '%" . $con->real_escape_string($keyword) . "%'";
                }
                if (!empty($status)) {
                    $truyvan .= " AND hd.TinhTrangThanhToan = '" . $con->real_escape_string($status) . "'";
                }
                $ketqua = mysqli_query($con, $truyvan);
                $p->dongKetNoi($con);
                return $ketqua;
            } else {
                return false;
            }
        }

        public function getallhd() {
            $p = new clsketnoi();
            $con = $p->MoKetNoi();
            $query = "SELECT * FROM hoadon h join thanhvien v on h.IDThanhVien= v.IDThanhVien";
            $result = mysqli_query($con, $query);
            return $result;
        }

        public function getNextIDHoaDon() {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT MAX(IDHoaDon) AS MaxID FROM hoadon";
                $result = $con->query($sql);
                if ($result) {
                    $row = $result->fetch_assoc();
                    $nextID = $row['MaxID'] + 1;
                    return $nextID;
                }
                $p->dongketnoi($con);
            }
            return 1;
        }

        public function themdulieu($sql) {
            $p = new clsketnoi();
            $con = $p->moketnoi();  
            $con->set_charset('utf8');
            if ($con->query($sql)) {
                $p->dongketnoi($con);
                return true;
            } else {
                return false;
            }
        }
        
        public function xoadulieu($sql)
        {
            $p = new clsketnoi();
            $con = $p->moketnoi();  
           
            if($con->query($sql)){
            $p->dongketnoi($con);
                return 1;}
            else
                return 0;
      }
        
    }
?>