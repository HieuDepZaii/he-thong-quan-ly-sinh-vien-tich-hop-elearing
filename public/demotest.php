<?php
 function kTraDiemDanh($masv, $filename)
{
    $kiemtra = false;
    $handle = fopen($filename, 'r');
    $content = fread($handle, filesize($filename));
    $dssv = explode("\n", $content);
//    print_r($dssv);
    foreach ($dssv as $item) {
        $sinhvien = explode("-", $item);
        if ($masv == $sinhvien[1]) {
            $kiemtra = false;
            break;
        } else {
            $kiemtra = true;
        }
    }
    fclose($handle);
    return $kiemtra;
}
echo kTraDiemDanh(2,'dsdiemdanh/công nghệ pm cs403A 30-12-2020.txt') ? 'true':'false';
