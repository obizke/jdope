<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StkTransaction extends Model
{
    protected $table = 'stk_transactions';

    protected $fillable = ['MpesaReceiptNumber','Amount','PhoneNumber','TransactionDate','Balance'];

}
