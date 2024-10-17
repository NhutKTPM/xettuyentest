<?php

namespace App\Http\Controllers\User_24\Admin\CongMotCua\GiayXacNhan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PhpOption\Option;
use Carbon\Carbon;
use PhpParser\Node\Expr\FuncCall;
use \App\Http\Controllers\User\Main\InfoUserController;
use \App\Http\Controllers\User\Main\RegisterWishController;
use Exception;

use function PHPUnit\Framework\countOf;

class DotTuyenSinhController extends Controller

{

    //Thư viên

    function load_seclectbox($table, $feild_id, $feild_text, $seclected_id, $text_0)
    {
        $data0 = new Collection([
            'id' => 0,
            'text' => $text_0,
            'selected' => 'selected'
        ]);
        $data = DB::table($table)->select($feild_id . " as id", $feild_text . " as text")->get();
        $i = 0;
        foreach ($data as $value) {
            if ($value->$feild_id == $seclected_id) {
                $value->selected =  'selected';
                $i++;
            } else {
                $value->selected =  '';
            }
        }
        if ($i == 1) {
            $data[] = new Collection([
                'id' => 0,
                'text' => $text_0,
                'selected' => ''
            ]);
        } else {
            $data[] = new Collection([
                'id' => 0,
                'text' => $text_0,
                'selected' => 'selected'
            ]);
        }
        return $data;
    }

    function datasidebar($menus, $parent_id = 0, $level = 0, &$html)
    {
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id === $parent_id) {
                $menu->level = $level;
                if ($menu->level == 0) {
                    $html .= '<li class = "nav-item">';
                    if ($menu->link == 'main') {
                        $html .= '<a href="' . $menu->link . '" style="background-color: rgba(255, 255, 255, .1);" class="nav-link">';
                    } else {
                        $html .= '<a style="background-color: rgba(255, 255, 255, .1);" class="nav-link">';
                    }

                    $html .= '<i class="nav-icon ' . $menu->icon . '" style="font-size: 14px;color:white"></i>';
                    $html .=  '<p id = levelpr' . $menu->IDMN . '>' . $menu->name;
                    if ($menu->link != 'main') {
                        $html .= '<i class="fas fa-angle-left right"></i>';
                    }
                    $html .= '</p>';
                    $html .= '</a>';
                } else {
                    $html .= "<ul id = level" . $menu->IDMN . " class='nav nav-treeview'>";
                    $html .= '<li class="nav-item">';
                    $html .= "<a href=" . $menu->link . " class='nav-link'>";
                    $html .= '&nbsp;&nbsp&nbsp;<i class="nav-icon ' . $menu->icon . '" style="font-size: 14px;color:white"></i>';
                    $html .= '<p>' . $menu->name . '</p>';
                    $html .= '</a>';
                    $html .= '</li>';
                }

                unset($menus[$key]);
                self::datasidebar($menus, $menu->IDMN, $level + 1, $html);
                $html .= '</li>';
                $html .= '</ul>';
            }
        }
    }
    public function sidebar()
    {
        $admin = Auth::guard('loginadmin')->user()->admin;
        $id_nguoidung = Auth::guard('loginadmin')->user()->id;
        switch ($admin) {
            case '2':
                // $menus = DB::select('SELECT * FROM 24_menu INNER JOIN 24_phanquyen ON 24_phanquyen.id_manhinh = 24_menu.IDMN  ORDER BY stt asc');
                $menus = DB::table('24_menu')
                    ->get();
                break;
            case '1':
                $menus = DB::table('24_menu')
                    ->join('24_phanquyen', '24_menu.IDMN', '24_phanquyen.id_manhinh')
                    ->where('24_phanquyen.id_nguoidung', $id_nguoidung)
                    ->where('id_chucnang', 1)
                    ->orderBy('24_menu.stt')
                    ->get();
                break;
            default:
                $menus = [];
                break;
        }
        # root
        $this->datasidebar($menus, 0, 0, $result);
        return $result;
    }


    function dottuyensinh()
    {

        return view(
            'user_24.admin24.manage.congmotcua.giayxacnhan.dottuyensinh',
            [
                'menu' =>    $this->sidebar(),
                'title' => 'Đăng ký giấy xác nhận'
            ]
        );
    }



    function bang_ds_dottuyensinh()
    {
        $data = DB::table('24_dottuyensinh')
            ->select("*")

            ->get();




        $json_data['data'] = $data;
        $res = json_encode($json_data);
        return  $res;
        // return $data;
    }

    function them_dottuyensinh(Request $r)
    {
        $validator = Validator::make(
            $r->all(),
            [
                // 'id' => 'required|integer|min:1'
                'madot' => 'required',
                'tendot' => 'required',
                'trangthai' => 'required|integer',
                'khoadot' => 'required|integer',
            ],
            [
                // 'id.min' => "Vui lòng chọn loại giấy"
                'madot.required' => "Vui lòng nhập mã đợt",
                'tendot.required' => "Vui lòng nhập tên đợt",
                'trangthai.required' => "Vui lòng nhập trạng thái",
                'khoadot.required' => "Vui lòng nhập khóa đợt",
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors()); // Nếu không có lỗi, lưu dữ liệu vào cơ sở dữ liệu
        } else {
            try {
                DB::table('24_dottuyensinh')
                    ->insert(
                        [
                            'madot' => $r->input('madot'),
                            'tendot' => $r->input('tendot'),
                            'trangthai' => $r->input('trangthai'),
                            'khoadot' => $r->input('khoadot')
                        ]
                    );
                return  1;
            } catch (Exception $e) {
                return  0;
            }
        }

        //     $id_loaigiay = $r ->input('id');
        //     $id_taikhoan = Auth::guard('loginbygoogles')->id();
        //     $tiendoxyly = 1;


        //     $validator = Validator::make($r->all(), 
        //     [
        //         'id' => 'required|integer|min:1'
        //     ],
        //     [
        //         'id.min' => "Vui lòng chọn loại giấy"
        //     ]

        // );

        //     if ($validator->fails()) {
        //         return response()->json($validator->errors());// Nếu không có lỗi, lưu dữ liệu vào cơ sở dữ liệu
        //     }else{
        //         try{
        //             DB::table('24_cmc_dangkygiay')
        //             ->insert(
        //                 [
        //                     'id_taikhoan' => $id_taikhoan,
        //                     'id_loaigiay' => $id_loaigiay,
        //                     'tiendoxyly' => $tiendoxyly,
        //                 ]
        //             );
        //             return  1;
        //         }catch(Exception $e){
        //             return  0;
        //         }
        //     }
    }
}
