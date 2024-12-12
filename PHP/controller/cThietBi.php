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
    public function getALLThietBiLoi()
    {
        $p = new mThietBi();
        $tbl = $p->selectAllThietBiLoi();
        if (mysqli_num_rows($tbl) > 0) {
            return $tbl;
        } else {
            return false;
        }
    }

    public function get2ThietBi($idtb)
    {
        $p = new mThietBi();
        $tbl = $p->select2ThietBi($idtb);
        if (mysqli_num_rows($tbl) > 0) {
            return $tbl;
        } else {
            return false;
        }
    }

    public function Query1TB($idtb)
    {
        $p = new mThietBi();
        $kq = $p->queryThietBi($idtb);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }

    public function cBaoCaoLoi($ngayxayraloi, $ttloi, $chiphi, $ketqua, $idtb)
    {
        $p = new mThietBi();
        $r = $this->getALLThietBiLoi();

        // Duyệt qua danh sách các thiết bị

        // Gọi hàm mBaoCaoLoi để thêm thông tin lỗi
        $kq = $p->mBaoCaoLoi($ngayxayraloi, $ttloi, $chiphi, $ketqua, $idtb);
        if ($kq) {
            return "Báo cáo lỗi thành công.";
        } else {
            return "Lỗi khi thêm báo cáo.";
        }
    }
    public function timkiemtb($timkiem)
    {
        $p = new mThietBi();
        
        $kq= $p->searchTB($timkiem);
        if(mysqli_num_rows($kq)>0)
        {
            return $kq;
        }
        else
        {
            return false;
        }
    }
    public function timkiemtbloi($timkiem)
    {
        $p = new mThietBi();
        
        $kq= $p->searchTBloi($timkiem);
        if(mysqli_num_rows($kq)>0)
        {
            return $kq;
        }
        else
        {
            return false;
        }
    }
    // Nếu không tìm thấy thiết bị
    }
?>