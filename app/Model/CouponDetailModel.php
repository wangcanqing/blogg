<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CouponDetailModel extends Model
{
    protected $table = 'coupon_details';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
