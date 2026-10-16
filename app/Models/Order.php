<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table ='orders';
    protected $fillable = [
        'voucher_no',
        'total',
        'qty',
        'slip',
        'status',
        'address',
        'user_id',
        'item_id',
        'payment_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
