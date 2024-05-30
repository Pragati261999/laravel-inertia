<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function setItems()
    {
        return $this->hasMany(SetItem::class, 'product_id');
    }
}
