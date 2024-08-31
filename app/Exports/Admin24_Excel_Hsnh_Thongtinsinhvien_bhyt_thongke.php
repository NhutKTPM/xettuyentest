<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class Admin24_Excel_Hsnh_Thongtinsinhvien_bhyt_thongke implements FromCollection
{
    use Exportable;

    private $major;
   
    

    public function __construct($major)
    {
        $this->major = $major;
        
        
    }

    public function collection()
{
    $major_fix = $this->major == 0 ? 'c.id_major IS NOT NULL' : 'c.id_major = ' . $this->major;
    

    $sql = 'SELECT 
                c.id_major as major, 
                c.name_major as tenchuyennganh,  
                COUNT(t.id_taikhoan) AS "Tổng số thẻ BHYT", 
                SUM(CASE WHEN bh.bhyt IS NOT NULL AND bh.bhyt != "" THEN 1 ELSE 0 END) AS "Có BHYT", 
                SUM(CASE WHEN t.id_taikhoan IS NOT NULL OR bh.bhyt = "" THEN 1 ELSE 0 END) AS "Chưa có BHYT"
            FROM 
                l_major c
            LEFT JOIN 
                24_thongtincanhan t ON t.major = c.id_major
            LEFT JOIN 
                24_bhyt bh ON t.id_taikhoan = bh.id_taikhoan
            WHERE ' . $major_fix . '
            GROUP BY 
                c.id_major, c.name_major';

    $data = DB::select($sql); // Lấy dữ liệu từ truy vấn SQL

    // Tạo collection dữ liệu xuất excel
    $data_ex = new Collection([
        ['Mã chuyên ngành', 'Tên chuyên ngành', 'Tổng số thẻ BHYT', 'Có BHYT', 'Chưa có BHYT'],
    ]);

    // Đưa dữ liệu vào collection
    foreach ($data as $value) {
        $data_ex->push([
            // $value->major, 
            // $value->tenchuyennganh, 
            // $value->{'Tổng số thẻ BHYT'},
            // $value->{'Có BHYT'},
            // $value->{'Chưa có BHYT'}
            $value->major,
            $value->tenchuyennganh,
            (string)($value->{'Tổng số thẻ BHYT'} ?? '0'), 
            (string)($value->{'Có BHYT'} ?? '0'),         
            (string)($value->{'Chưa có BHYT'} ?? '0')  
        ]);
    }

    return $data_ex;
}

}
