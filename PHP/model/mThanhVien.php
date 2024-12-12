<?php
include_once('ketnoi.php');

class mThanhVien
{
    public function select1ThanhVien($taikhoan, $matkhau)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "SELECT * from thanhvien where SoDienThoai ='$taikhoan' and Password ='$matkhau' LIMIT 1";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function queryTV($idtv)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "SELECT * from thanhvien where IDThanhVien ='$idtv' LIMIT 1";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function SelectAllTV()
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "SELECT * from thanhvien order by IDThanhVien ASC";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function CapNhatTT($idtv, $tentv, $sdt, $email, $diachi)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "UPDATE `thanhvien` SET `TenThanhVien` = '$tentv', `SoDienThoai` = '$sdt', `DiaChi` = '$diachi', `email` = '$email' WHERE `thanhvien`.`IDThanhVien` = $idtv;";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function  deletetv($idtv)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "delete from  `thanhvien`  WHERE `thanhvien`.`IDThanhVien` = $idtv;";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function createGhiDanh($idtv, $date)
    {

        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "INSERT INTO `lichsutapluyen` (`NgayTap`, `IDThanhVien`) VALUES ('$date', '$idtv');";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function DangKyTV($tentv, $sdt, $diachi, $email, $ngaythamgia, $password)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "INSERT INTO `thanhvien` (`IDThanhVien`, `TenThanhVien`, `SoDienThoai`, `DiaChi`, `email`, `NgayThamGia`, `Password`) VALUES (NULL, '$tentv', '$sdt', '$diachi', '$email', '$ngaythamgia', '$password');";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    // kiet
    public function xemdanhgia()
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "SELECT * from `danhgia` limit 3 order by noidung asc ";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function xemlichsutap($idtv)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "SELECT * from lichsutapluyen where IDThanhVien =$idtv";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function thoigiantap($idtv)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "SELECT t.TenThanhVien, count(t.IDThanhVien) as SoLan from lichsutapluyen l join thanhvien t on l.IDThanhVien =t.IDThanhVien  where l.IDThanhVien =$idtv  
GROUP BY t.IDThanhVien, t.TenThanhVien;";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function searchTV($timkiem)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "SELECT * from  thanhvien where TenThanhVien like '%$timkiem%' OR SoDienThoai like '$timkiem' ;";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function ktdk($sdt)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "SELECT * from  thanhvien where  SoDienThoai = '$sdt' ;";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }
}
