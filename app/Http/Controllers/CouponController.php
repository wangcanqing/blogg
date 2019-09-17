<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CouponModel;
use App\Model\CouponDetailModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
//        $uid = Auth::id();   //获取用户的id
//        echo "UID:".$uid;echo '<hr>';
//
//        $user = Auth::user();    //获取用户的信息
//        echo '<pre>';print_r($user);echo '</pre>';
        $data = [];
        return view('coupon.index',$data);
    }
    public function getCoupon(request $request){
        $now = time();
        //$id = $_GET['id'];   //券id
        $id = $request->get('id');
        echo 'id: '.$id;echo '</br>';

        $coupon_info = CouponModel::find($id);

        if($coupon_info){
            //判断有效期
            $expire_at = strtotime($coupon_info->expire_at);
            if($now>$expire_at){   //有效
                die("活动已经结束了");
            }
            //发券
            $code = Str::random(8);
            $data = [
                'code' => $code,
                'uid' => Auth::id(),
                'get_time' => $now,
                'expire_at' => $expire_at
            ];
            $id = CouponDetailModel::insertGetId($data);
            if($id>0){
                echo "领券成功  ！ 券码：".$code;
            }
        }

        echo '<pre>';print_r($coupon_info->toArray());echo '</pre>';
        // echo "领取成功";
    }

}
