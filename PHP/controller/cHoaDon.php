<?php
    include_once('../model/mHoaDon.php');
    class cHoaDon{
        public function createHD($tongtien,$ngayLapHD,$idtv)
        {
            $p = new mHoaDon();
            $kq= $p->InsertHD($tongtien,$ngayLapHD,$idtv);
            return $kq;
        }
        public function selectallhd() {
            $p = new mHoaDon();
            
		$kq= $p->getallhd();
        if(mysqli_num_rows($kq)>0)
		{
			return $kq;
		}
		else
		{
			return false;
		}
        }

        public function getallhdbytv($idtv)
        {
            $p = new mHoaDon();
            
		$kq= $p->selectAllHoaDon($idtv);
		if(mysqli_num_rows($kq)>0)
		{
			return $kq;
		}
		else
		{
			return false;
		}
        }
        public function getallhdctt($idtv)
        {
            $p = new mHoaDon();
            
		$kq= $p->selectAllHDChTT($idtv);
		if(mysqli_num_rows($kq)>0)
		{
			return $kq;
		}
		else
		{
			return false;
		}
        }
      
        public function CapNhatHD($idhd,$sotien,$HTTT,$ngayThanhToan)
        { $p = new mHoaDon();
            
            $kq= $p->UpdateHDTV($idhd,$sotien,$HTTT,$ngayThanhToan);
            return $kq;

        }
		public function getHDByName($keyword, $status = '') {
            $p = new mHoaDon();
            return $p->selectHDByName($keyword, $status);
        }

        public function updateTT($idhd, $trangThai) {
            $p = new mHoaDon();
            return $p->UpdateTT($idhd, $trangThai);
        }

        public function getChiTietHoaDon($idhd) {
            $p = new mHoaDon();
            return $p->selectChiTietHD($idhd);
        }

        

        public function get1HD($idhd)
        {
            $p = new mHoaDon();
            $kq= $p->select1HD($idhd);
            if(mysqli_num_rows($kq)>0)
            {
                return $kq;
            }
            else
            {
                return false;
            }
        }


        public function themHoaDon($sql) {
            $p = new mHoaDon();
            return $p->themdulieu($sql);
        }
        public function xoahoadon($id)
        {        $p = new mHoaDon();
            $sql="delete from hoadon where IDHOADON='$id'";
           
            if( $p->xoadulieu($sql))
                return 1;
            else
                return 0;
        }
    public function suahoadon($sql)
    {   $p = new mHoaDon();
        return $p->suadulieu($sql);
    }
        
    }
?>