<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function bill() {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }

    public function inventory() {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
