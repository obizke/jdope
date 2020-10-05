<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Order
 * @package App\Models
 * @version September 21, 2020, 1:57 pm EAT
 *
 * @property \Illuminate\Database\Eloquent\Collection $orderItems
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string $location
 * @property string $county
 * @property string $invoice
 * @property integer $user_id
 * @property integer $item_count
 * @property string $phone
 * @property number $total_amount_due
 * @property string $payment_method
 * @property boolean $payment_status
 * @property string $MpesaReceiptNumber
 * @property string $status
 */
class Order extends Model
{

    public $table = 'orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'fname',
        'lname',
        'email',
        'location',
        'county',
        'invoice',
        'user_id',
        'item_count',
        'phone',
        'total_amount_due',
        'payment_method',
        'payment_status',
        'MpesaReceiptNumber',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fname' => 'string',
        'lname' => 'string',
        'email' => 'string',
        'location' => 'string',
        'county' => 'string',
        'invoice' => 'string',
        'user_id' => 'integer',
        'item_count' => 'integer',
        'phone' => 'string',
        'total_amount_due' => 'float',
        'payment_method' => 'string',
        'payment_status' => 'boolean',
        'MpesaReceiptNumber' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'county' => 'required|string|max:255',
        'invoice' => 'required|string|max:255',
        'user_id' => 'required|integer',
        'item_count' => 'required|integer',
        'phone' => 'required|string|max:255',
        'total_amount_due' => 'required|numeric',
        'payment_method' => 'required|string|max:255',
        'payment_status' => 'required|boolean',
        'MpesaReceiptNumber' => 'nullable|string|max:255',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
