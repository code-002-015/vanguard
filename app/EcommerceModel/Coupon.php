<?php

namespace App\EcommerceModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;
use Carbon\Carbon;

use App\EcommerceModel\Product;
use App\EcommerceModel\CouponSale;

use App\ActivityLog;


class Coupon extends Model
{
	use SoftDeletes;

    protected $fillable = [ 'coupon_code', 'name', 'description', 'terms_and_conditions', 'activation_type', 'customer_scope', 'scope_customer_id', 'location','location_discount_type','location_discount_amount', 'amount', 'percentage', 'free_product_id', 'status', 'start_date', 'end_date', 'start_time', 'end_time', 'event_name', 'event_date', 'repeat_annually', 'purchase_product_id', 'purchase_product_cat_id', 'purchase_product_brand', 'purchase_amount', 'purchase_amount_type', 'amount_discount_type', 'purchase_qty', 'purchase_qty_type', 'purchase_combination_counter','purchase_combination', 'activity_type', 'customer_limit', 'usage_limit', 'usage_limit_no', 'combination', 'availability', 'user_id','product_discount', 'discount_product_id'];
    
    public $timestamps = true;

    public static function generate_unique_code()
    {
        $randomString = self::generate_random_string();
        $couponCode = Coupon::where('coupon_code', $randomString)->get();
        while ($couponCode->count()) {
            $randomString = self::generate_random_string();
            $couponCode = Coupon::where('coupon_code', $randomString)->first();
        }

        return $randomString;
    }

    private static function generate_random_string($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function coupon_total_usage($couponid)
    {
        $total = CouponSale::where('coupon_id',$couponid)->count();

        return $total;
    }

    public static function coupon_usage($couponid)
    {
        $coupon = Coupon::find($couponid);
        $totalUsage = CouponSale::where('coupon_id',$couponid)->where('customer_id',Auth::id())->count();

        if(isset($coupon->usage_limit)){
            if($coupon->usage_limit == 'single_use'){
                if($totalUsage == 1){
                    $usability = 0;
                } else {
                    $usability = 1;
                }
            }

            if($coupon->usage_limit == 'multiple_use'){
                if($totalUsage <= $coupon->usage_limit_no){
                    $usability = 1;
                } else {
                    $usability = 0;
                }
            }
        } else {
            $usability = 1;
        }
        
        return $usability;
    }

    public static function collectible_usage($couponid)
    {
        $totalUsage = CouponSale::where('coupon_id',$couponid)->where('customer_id',Auth::id())->count();

        return $totalUsage;
    }

    public static function purchaseMinValue($purchase_field,$purchase_type,$purchase_value)
    {
        $coupons = 
            Coupon::where('status','ACTIVE')
            ->where('purchase_combination_counter',1)
            ->where('activation_type','auto')
            ->whereNotNull($purchase_field)->where($purchase_type,'min')->where($purchase_field,'<=',$purchase_value)->get();

        return $coupons;
    }

    public static function purchaseMaxValue($purchase_field,$purchase_type,$purchase_value)
    {
        $coupons = 
            Coupon::where('status','ACTIVE')
            ->where('purchase_combination_counter',1)
            ->where('activation_type','auto')
            ->whereNotNull($purchase_field)->where($purchase_type,'max')->where($purchase_field,'>=',$purchase_value)->get();

        return $coupons;
    }

    public static function purchaseExactValue($purchase_field,$purchase_type,$purchase_value)
    {
        $coupons = 
            Coupon::where('status','ACTIVE')
            ->where('purchase_combination_counter',1)
            ->where('activation_type','auto')
            ->whereNotNull($purchase_field)->where($purchase_type,'exact')->where($purchase_field,$purchase_value)->get();

        return $coupons;
    }
    
    







    // ******** AUDIT LOG ******** //
    // Need to change every model
    static $oldModel;
    static $tableTitle = 'coupon';
    static $name = 'name';
    static $unrelatedFields = ['id', 'coupon_code', 'scope_customer_id', 'free_product_id', 'repeat_annually', 'amount_discount_type', 'purchase_qty_type', 'purchase_combination_counter', 'purchase_combination', 'activity_type', 'usage_limit', 'usage_limit_no', 'availability', 'product_discount', 'discount_product_id', 'created_at', 'updated_at', 'deleted_at'];
    static $logName = [
        'name' => 'name',
        'description' => 'description',
        'terms_and_conditions' => 'terms and conditions',
        'activation_type' => 'activation type',
        'customer_scope' => 'customer scope',
        'location' => 'location',
        'location_discount_type' => 'shipping fee discount',
        'location_discount_amount' => 'shipping fee discount amount',
        'amount' => 'amount',
        'percentage' => 'percentage',
        'status' => 'status',
        'start_date' => 'start date',
        'end_date' => 'end date',
        'start_time' => 'start time',
        'end_time' => 'end time',
        'event_name' => 'event name',
        'event_date' => 'event date',
        'purchase_product_id' => 'purchase products',
        'purchase_product_cat_id' => 'purchase product categories',
        'purchase_product_brand' => 'purchase product brands',
        'purchase_amount' => 'purchase amount',
        'purchase_amount_type' => 'amount type',
        'purchase_qty' => 'purchase qty',
        'customer_limit' => 'customer limit',
        'combination' => 'coupon combination'


    ];
    // END Need to change every model

    public static function boot()
    {
        parent::boot();

        self::created(function($model) {
            $name = $model[self::$name];

            ActivityLog::create([
                'log_by' => auth()->id(),
                'activity_type' => 'insert',
                'dashboard_activity' => 'created a new '. self::$tableTitle,
                'activity_desc' => 'created the '. self::$tableTitle .' '. $name,
                'activity_date' => date("Y-m-d H:i:s"),
                'db_table' => $model->getTable(),
                'old_value' => '',
                'new_value' => $name,
                'reference' => $model->id
            ]);
        });

        self::updating(function($model) {
            self::$oldModel = $model->fresh();
        });

        self::updated(function($model) {
            $name = $model[self::$name];
            $oldModel = self::$oldModel->toArray();
            foreach ($oldModel as $fieldName => $value) {
                if (in_array($fieldName, self::$unrelatedFields)) {
                    continue;
                }

                $oldValue = $model[$fieldName];
                if ($oldValue != $value) {
                    ActivityLog::create([
                        'log_by' => auth()->id(),
                        'activity_type' => 'update',
                        'dashboard_activity' => 'updated the '. self::$tableTitle .' '. self::$logName[$fieldName],
                        'activity_desc' => 'updated the '. self::$tableTitle .' '. self::$logName[$fieldName] .' of '. $name .' from '. $oldValue .' to '. $value,
                        'activity_date' => date("Y-m-d H:i:s"),
                        'db_table' => $model->getTable(),
                        'old_value' => $oldValue,
                        'new_value' => $value,
                        'reference' => $model->id
                    ]);
                }
            }
        });

        self::deleted(function($model){
            $name = $model[self::$name];
            ActivityLog::create([
                'log_by' => auth()->id(),
                'activity_type' => 'delete',
                'dashboard_activity' => 'deleted a '. self::$tableTitle,
                'activity_desc' => 'deleted the '. self::$tableTitle .' '. $name,
                'activity_date' => date("Y-m-d H:i:s"),
                'db_table' => $model->getTable(),
                'old_value' => '',
                'new_value' => '',
                'reference' => $model->id
            ]);
        });

        // self::restored(function($model){
        //     $name = $model[self::$name];
        //     ActivityLog::create([
        //         'log_by' => auth()->id(),
        //         'activity_type' => 'restore',
        //         'dashboard_activity' => 'restore a '. self::$tableTitle,
        //         'activity_desc' => 'restore the '. self::$tableTitle .' '. $name,
        //         'activity_date' => date("Y-m-d H:i:s"),
        //         'db_table' => $model->getTable(),
        //         'old_value' => '',
        //         'new_value' => '',
        //         'reference' => $model->id
        //     ]);
        // });
    }
}
