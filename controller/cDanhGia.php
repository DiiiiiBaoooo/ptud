<?php
    include_once('model/mDanhGia.php');

    class cDanhGia{
      
        
        public function getDanhgia()
        {
        $p = new mDanhGia();
            
		$kq= $p->xemdanhgia();
		if(mysqli_num_rows($kq)>0)
		{
			return $kq;
		}
		else
		{
			return false;
		}
        }
        public function TaoDanhGia($idtv,$noidung)
        {
            $p = new mDanhGia();
            
		$kq= $p->createDanhGia($idtv,$noidung);
        return $kq;

        }


    }   
?>