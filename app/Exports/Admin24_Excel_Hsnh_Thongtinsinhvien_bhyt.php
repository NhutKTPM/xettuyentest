<?php
namespace App\Exports;

// use App\Invoice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Admin24_Excel_Hsnh_Thongtinsinhvien_bhyt implements FromCollection
// class UserExport implements WithMultipleSheets

{
    private $major;
    private $cccd;
    private $mssv;
    private $id_sinhvien;


    public function __construct($major,$cccd,$mssv, $id_sinhvien)
    {
        $this->major = $major;
        $this->cccd = $cccd;
        $this->mssv = $mssv;
        $this->id_sinhvien = $id_sinhvien;
    }

    // 
    public function collection()
{
    // Xác định điều kiện lọc
    $major_fix = $this->major == 0 ? 'major IS NOT NULL' : 'major = ' . $this->major;
    $cccd_fix = $this->cccd == 0 ? 'cccd IS NOT NULL' : 'cccd = "' . $this->cccd.'"';
    $mssv_fix = $this->mssv == 0 ? 'mssv.mssv IS NOT NULL' : 'mssv.mssv = "' . $this->mssv.'"';
    $id_sinhvien_fix = $this->id_sinhvien == 0 ? 'tt.id_taikhoan IS NOT NULL' : 'tt.id_taikhoan IN (' . $this->id_sinhvien . ')';

    // Truy vấn SQL để lấy dữ liệu
    $sql = 'SELECT 
                    tt.id_taikhoan, tt.noisinh, tt.hoten, tt.dienthoai, tt.ngaysinh, mssv.mssv, tt.gioitinh, tt.cccd, b.bhyt, c.tenchuyennganh,
                    CONCAT( hs.duoi_xa_ttru, ", ",xa.name_province3, ", ", huyen.name_province2, ", ", tinh.name_province) AS diachi
                FROM 24_thongtincanhan tt
                JOIN 
                    24_hosonhaphoc hs ON tt.id_taikhoan = hs.id_taikhoan
                JOIN 
                    24_mssv mssv ON tt.id_taikhoan = mssv.id_taikhoan
                JOIN 
                    l_province tinh ON hs.id_tinh_ttru = tinh.id 
                JOIN 
                    l_province2 huyen ON hs.id_huyen_ttru = huyen.id 
                JOIN 
                    l_province3 xa ON hs.id_xa_ttru = xa.id 
                LEFT JOIN 
                    24_bhyt b ON tt.id_taikhoan = b.id_taikhoan 
                JOIN 
                    24_chuyennganh c ON tt.major = c.machuyennganh 
            WHERE 
                ' . $major_fix . '
                AND ' . $cccd_fix . '
                AND ' . $mssv_fix . '
                AND ' . $id_sinhvien_fix;
    
    $data = DB::select($sql); // Lấy dữ liệu từ truy vấn SQL

    // Tạo collection dữ liệu xuất excel
    $data_ex = new Collection([
        ['ID','MSVV', 'CMND/TCC', 'Họ tên','Chuyên ngành', 'Ngày sinh', 'Giới tính', 'Địa chỉ', 'Số thẻ BHYT'],
    ]);

    // Đưa dữ liệu vào collection
    foreach ($data as $value) {
        $gioitinh = $value->gioitinh == 1 ? "Nữ" : "Nam";
        $data_ex->push([
            $value->id_taikhoan,
            $value->mssv, 
            $value->cccd, 
            $value->hoten,
            $value->tenchuyennganh, 
            $value->ngaysinh, 
            $gioitinh, 
            $value->diachi, 
            $value->bhyt
        ]);
    }

    return $data_ex;
}

}



