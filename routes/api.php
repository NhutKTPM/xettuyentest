<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
// use Exception;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('ketquathanhtoan', function(){
    $timezone_string="Asia/Ho_Chi_Minh";
    date_default_timezone_set($timezone_string);
    $jsonWebhookData = file_get_contents("php://input");
    $webhookData = json_decode($jsonWebhookData, true);
    // //Get và remove trường sign ra khỏi dữ liệu
    $baokimSign = $webhookData['sign'];
    unset($webhookData['sign']);
    // //Chuyển dữ liệu đã remove sign về lại dạng json và sử dụng thuật toán hash sha256 để tạo signature với secret key
    $signData = json_encode($webhookData);
    $secret = "U8JzoxNxUUnVEAPC2issEbecoRBKUg4N";
    $mySign = hash_hmac('sha256', $signData, $secret);

    // //So sánh chữ ký bạn tạo ra với chữ ký bảo kim gửi sang, nếu khớp thì verify thành công
    if($baokimSign == $mySign) {
        $order_id = $webhookData['txn']['order_id'];
        $payment_amount = $webhookData['order']['total_amount'];
        $data = DB::table('24_dataresponse')
        ->select('order_id','idnam','id_taikhoan','payment_amount')
        ->where('order_id' ,$order_id)
        ->first();
        if($data){
            DB::beginTransaction();
            try{
                DB::table('24_ketquathanhtoan')
                ->updateOrInsert(
                    [
                        'order_id' => $order_id,
                    ],
                    [
                        'id_dot' => 1,
                        'id_taikhoan' => $data->id_taikhoan,
                        'id_order' => $webhookData['order']['id'],
                        'user_id' => $webhookData['order']['user_id'],
                        'mrc_order_id' => $webhookData['order']['mrc_order_id'],
                        'txn_id' => $webhookData['order']['txn_id'],
                        'ref_no' => $webhookData['order']['ref_no'],
                        'merchant_id' => $webhookData['order']['merchant_id'],
                        'total_amount' => $payment_amount,
                        'description' => $webhookData['order']['description'],
                        'items' => $webhookData['order']['items'],
                        'url_success' => $webhookData['order']['url_success'],
                        'url_cancel' => $webhookData['order']['url_cancel'],
                        'url_detail' => $webhookData['order']['url_detail'],
                        'stat_order' => $webhookData['order']['stat'],
                        'lang' => $webhookData['order']['lang'],
                        'bpm_id' => $webhookData['order']['bpm_id'],
                        'accept_qrpay' => $webhookData['order']['accept_qrpay'],
                        'accept_bank' => $webhookData['order']['accept_bank'],
                        'accept_cc' => $webhookData['order']['accept_cc'],
                        'accept_ib' => $webhookData['order']['accept_ib'],
                        'accept_ewallet' => $webhookData['order']['accept_ewallet'],
                        'accept_installments' => $webhookData['order']['accept_installments'],
                        'email' => $webhookData['order']['email'],
                        'name' => $webhookData['order']['name'],
                        'webhooks' => $webhookData['order']['webhooks'],
                        'customer_name' => $webhookData['order']['customer_name'],
                        'customer_email' => $webhookData['order']['customer_email'],
                        'customer_phone' => $webhookData['order']['customer_phone'],
                        'customer_address' => $webhookData['order']['customer_address'],
                        'created_at_order' => $webhookData['order']['created_at'],
                        'updated_at' => $webhookData['order']['updated_at'],
                        // txn
                        'id_txn' => $webhookData['txn']['id'],
                        'reference_id' => $webhookData['txn']['reference_id'],
                        'order_id' => $webhookData['txn']['order_id'],
                        'amount' => $webhookData['txn']['amount'],
                        'fee_amount' => $webhookData['txn']['fee_amount'],
                        'bank_fee_amount' => $webhookData['txn']['bank_fee_amount'],
                        'bank_fix_fee_amount' => $webhookData['txn']['bank_fix_fee_amount'],
                        'fee_payer' => $webhookData['txn']['fee_payer'],
                        'bank_fee_payer' => $webhookData['txn']['bank_fee_payer'],
                        'auth_code' => $webhookData['txn']['auth_code'],
                        'auth_time' => $webhookData['txn']['auth_time'],
                        'bank_ref_no' => $webhookData['txn']['bank_ref_no'],
                        'bpm_type' => $webhookData['txn']['bpm_type'],
                        'gateway' => $webhookData['txn']['gateway'],
                        'stat_txn' => $webhookData['txn']['stat'],
                        'init_token' => $webhookData['txn']['init_token'],
                        'completed_at' => $webhookData['txn']['completed_at'],
                        'created_at_txn' => $webhookData['txn']['created_at'],
                        'dataToken' => $webhookData['dataToken'],
                        'sign' => $baokimSign,
                        "err_code" => "0",
                        "message"=> "some message",
                        "hinhthuc"=> 3,
                        "id_nguoithu"=> 4179,

                    ]
                );
                $user_agent = $_SERVER['HTTP_USER_AGENT'];
                DB::table('24_lichsu')
                ->updateOrInsert(
                    [
                        'ghichu' =>  $order_id,
                    ],
                    [
                    'id_taikhoan' => $data->id_taikhoan,
                    'noidung'   => "Nhận thanh toán lệ phí (MaHĐ: ".$order_id." - ". $payment_amount." VND )" ,
                    'hienthi'   => 1,
                    'id_nhansu' => 1,
                    'thietbi'   => $user_agent,
                    'ip'        => request()->ip()
                    ]);
                    $res = json_encode(array("err_code" => 0, "message" => 'some message'));
                    DB::table('24_dataresponse')
                    ->where('order_id',$order_id)
                    ->update([
                        'thanhtoan'=> 1
                        ]
                    );
                DB::commit();
                return  $res ;
            }catch(Exception $e){
                DB::rollBack();
                DB::table('24_loithanhtoan')
                ->insert([
                    'order_id' => $order_id,
                    'err_code' => 1,
                    'message' => "",
                ]);
                return 1;
            }
        }else{
            DB::table('24_loithanhtoan')
            ->insert([
                'order_id' => $order_id,
                'err_code' => 2,
                'message' => "Dữ liệu không khớp order_id: ".$webhookData['order']['total_amount'],
            ]);
            return 2;
        }
    }else{
        return 1;
    }
});


