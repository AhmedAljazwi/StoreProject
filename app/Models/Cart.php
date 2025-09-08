<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function inventory() {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
