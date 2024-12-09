<?php
    include_once('../model/mThietBi.php');
    class cThietBi{
        public function getAllTB()
        {
            $p = new mThietBi();
            
            $kq= $p->selectAllThietbi();
            if(mysqli_num_rows($kq)>0)
            {
                return $kq;
            }
            else
            {
                return false;
            }
        }
        public function themthietbi($tentb,$tinhtrang,$ngaysx,$noisx)
        {
            $p = new mThietBi();
            
            $kq= $p->insertThietBi($tentb,$tinhtrang,$ngaysx,$noisx);
            return $kq;
        }
        public function suathietbi($idtb,$tentb,$tinhtrang,$ngaysx,$noisx)
        {
            $p = new mThietBi();
            
            $kq= $p->SuaThietBi($idtb,$tentb,$tinhtrang,$ngaysx,$noisx);
            return $kq;
        }
        public function get01TB($idtb)
{
    $p = new mThietBi();
    $kq = $p->select01TB($idtb);
    if(mysqli_num_rows($kq)>0)
		{
			return $kq;
		}
		else
		{
			return false;
		}
}

    public function deleteTB($idtb) {
        $p = new mThietBi();
        $kq = $p->deleteTB($idtb);
        return $kq;
    }

    public function updateTB($idtb, $tentb, $tt, $ngaysx, $noisx)
    {
        $p = new mThietBi();
        $kq = $p->updateTB($idtb, $tentb, $tt, $ngaysx, $noisx);
        return $kq;
    }
    }
?>