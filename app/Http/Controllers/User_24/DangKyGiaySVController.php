<?php

namespace App\Http\Controllers\User_24;

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

class DangKyGiaySVController extends Controller

{
    function dangkygiaysv(){

        // return view('user_24.dangkygiay',
        // [
        //     'menu' =>    $this->sidebar(),
        //     'title' => 'Đăng ký giấy xác nhận'
        // ]);
        $id_taikhoan = Auth::guard('loginbygoogles')->id();
        // $id_taikhoan = 12;
        $user = DB::table('account24s')
        ->where('id',$id_taikhoan)->first();
        $thongtincanhan = DB::table('24_thongtincanhan')
        ->where('id_taikhoan',$id_taikhoan)->first();
        $noisinhs = DB::table('l_province')
        ->select('id','name_province as text')
        ->where('active_province',1)
        ->orderBy('id', 'asc')
        ->get();

        $img_slider = DB::select("SELECT 24_image_chuan.id, 24_image_chuan.funtion_id,24_image_chuan.ghichu,24_image_chuan.loaianh,if(image.path_img is null,'/img/test.png',image.path_img) as path_img,if(image.id is null,0,image.id) as test  FROM `24_image_chuan` LEFT JOIN (SELECT * FROM 24_image WHERE id_taikhoan = ".$id_taikhoan." AND loaianh > 1) AS image ON 24_image_chuan.id = image.id_image_chuan ORDER BY thutu ASC");

        if($thongtincanhan){
            foreach ($noisinhs as $noisinh ){
                if( $thongtincanhan ->noisinh == $noisinh->id){
                    $noisinh ->selected = "selected";
                }else{
                    $noisinh ->selected = "";
                }
            }
            if($thongtincanhan->gioitinh == 0){
                $gioitinh = 1;

            }else{
                $gioitinh= 0;
            }
        }else{
            foreach ($noisinhs as $noisinh ){
                $noisinh ->selected = "";
            }
        }

        $ds_tiendo = DB::table('test_tiendo_dkg')
        ->where('id_taikhoan', $id_taikhoan)
        ->get();

        $ds_loaigiay = DB::table('test_loaigiay')
        ->select('id_loaigiay', 'tenloaigiay')
        ->get();
        
        foreach ($ds_tiendo as $tiendo){
            foreach($ds_loaigiay as $thongtin_loaigiay){
                if ($tiendo ->id_loaigiay == $thongtin_loaigiay->id_loaigiay){
                    $tiendo ->tenloaigiay = $thongtin_loaigiay->tenloaigiay;
                }
            }
        }

        return view('user_24.dangkygiaysv',[
            'title' => "CTUT|Hệ thống đăng ký xét tuyển",
            'user'=>  $user,
            'id_taikhoan' => $thongtincanhan->id_taikhoan,
            'hoten'=> $thongtincanhan->hoten,
            'ngaysinh'=> $thongtincanhan->ngaysinh,
            'cccd'=> $thongtincanhan->cccd,
            'email_phu'=> $thongtincanhan->email_phu,
            'dienthoai'=> $thongtincanhan->dienthoai,
            'dienthoai_phu'=> $thongtincanhan->dienthoai_phu,
            'diachi'=> $thongtincanhan->diachi,
            'gioitinh' =>$gioitinh,
            'noisinhs' => $noisinhs,
            'img_slider' =>  $img_slider,
            'ds_tiendo' => $ds_tiendo,
        ]);

    }

    function luudangkygiaysv(Request $r){
        // $id = $r->input('id');

        DB::table('test_tiendo_dkg')
        ->insert([
            'id_taikhoan' => $r->input('id_taikhoan'),
            'id_loaigiay' => $r->input('id_loaigiay'),
            'tiendo' => 0,
        ]);
    }
    
    

}
