<?php

namespace App\EcommerceModel;

use Illuminate\Database\Eloquent\Model;

use App\ActivityLog;

class DeliveryStatus extends Model
{

    protected $table = 'ecommerce_delivery_status';
    protected $fillable = ['order_id', 'user_id', 'status', 'remarks'];


    public function getDeliveryAddressAttribute()
    {
        return "{$this->address_delivery_street} {$this->address_delivery_brgy}, {$this->address_delivery_city} {$this->address_delivery_province} {$this->address_delivery_zip}";
    }

    public function sales()
	{
	    return $this->belongsTo('App\EcommerceModel\SalesHeader','order_id');
	}




    // // ******** AUDIT LOG ******** //
    // // Need to change every model
    // static $oldModel;
    // static $tableTitle = 'delivery status';
    // static $name = 'name';
    // // END Need to change every model

    // public static function boot()
    // {
    //     parent::boot();

    //     self::created(function($model) {
    //         $name = $model[self::$name];

    //         ActivityLog::create([
    //             'log_by' => auth()->id(),
    //             'activity_type' => 'update',
    //             'dashboard_activity' => 'created a new '. self::$tableTitle,
    //             'activity_desc' => 'created the '. self::$tableTitle .' '. $name,
    //             'activity_date' => date("Y-m-d H:i:s"),
    //             'db_table' => $model->getTable(),
    //             'old_value' => '',
    //             'new_value' => $name,
    //             'reference' => $model->id
    //         ]);
    //     });
    // }
}
