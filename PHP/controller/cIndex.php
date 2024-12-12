<?php
    include_once('model/mGoiTap.php');

    class cIndex {
        // Lấy tất cả các gói tập
       
        public function get2GT() {
            $p = new mGoiTap();
            $kq = $p->select2GT();
            if (mysqli_num_rows($kq) > 0) {
                return $kq;
            } else {
                return false;
            }
        }
    }