<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryReceiverDetail extends Model
{
    protected $table = 'inventory_receiver_details';
    protected $fillable = ['product_id', 'inventory', 'header_id'];

    public function header()
    {
        return $this->belongsTo('App\inventory_receiver_header','header_id');
    }

    public function product()
    {
        return $this->belongsTo('App\EcommerceModel\Product');
    }
}
