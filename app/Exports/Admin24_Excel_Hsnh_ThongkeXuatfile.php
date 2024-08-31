<?php
namespace App\Exports;

// use App\Invoice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Carbon\Carbon;
class Admin24_Excel_Hsnh_ThongkeXuatfile implements FromCollection
// class UserExport implements WithMultipleSheets

{

    private $nam;
    private $major;


    public function __construct( $major, $nam)
    {

        $this->nam = $nam;
        $this->major = $major;

    }

    public function collection()
    {


        // $nam_ht = Carbon::now()->year;
        $this->nam == 0 ? $nam_fix = 'is not null' : $nam_fix = '='.$this->nam ;
        $this->major == 0 ? $major_fix = 'l_major.id IS NOT NULL' : $major_fix = 'l_major.id='.$this->major;
        // $this->mssv == 0 ? $mssv_fix = 'mssv IS NOT NULL' : $mssv_fix = 'mssv ='.$this->mssv;
        // $this->id_sinhvien == 0 ? $id_sinhvien_fix = 'tt.id_taikhoan IS NOT NULL' : $id_sinhvien_fix = 'tt.id_taikhoan IN ('.$this->id_sinhvien.')';

        $sql = 'SELECT
                    ROW_NUMBER() OVER (ORDER BY l_major.id) AS stt,
                    l_major.id_major, l_major.name_major, if(nvqs.slnvqs is null, "0" ,nvqs.slnvqs) as nvqs ,if(vv.slvv is null, "0" ,vv.slvv) as vayvon
                FROM
                    l_major
                LEFT JOIN
                    (SELECT idnganh,COUNT(*) as slnvqs, Year(l_file_qlsv_nvqs.create_at)
                    FROM l_file_qlsv_nvqs JOIN 24_trungtuyen ON l_file_qlsv_nvqs.id_user = 24_trungtuyen.id_taikhoan
                    WHERE Year(l_file_qlsv_nvqs.create_at) ' .$nam_fix.'
                    GROUP BY 24_trungtuyen.idnganh, Year(l_file_qlsv_nvqs.create_at)) as nvqs ON nvqs.idnganh = l_major.id
                LEFT JOIN
                    (SELECT idnganh,COUNT(*) as slvv,Year(l_file_qlsv_vv.create_at)
                    FROM l_file_qlsv_vv JOIN 24_trungtuyen ON l_file_qlsv_vv.id_user = 24_trungtuyen.id_taikhoan
                    WHERE Year(l_file_qlsv_vv.create_at) ' .$nam_fix.'
                    GROUP BY 24_trungtuyen.idnganh, Year(l_file_qlsv_vv.create_at)) as vv ON vv.idnganh = l_major.id
                WHERE '.$major_fix;
        $data = DB::select($sql);// Data

        $data_ex = new Collection([
            ['STT','Mã ngành', "Tên chuyên ngành",'NVQS','VV'],
        ]);

        foreach ($data as $key => $value) {
           $a = [$value ->stt,$value ->id_major,$value ->name_major,$value ->nvqs, $value->vayvon];
           $data_ex[] = $a;
        }
        return $data_ex;
    }
}



