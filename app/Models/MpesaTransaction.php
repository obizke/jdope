<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MpesaTransaction extends Model
{
    protected $table = 'mpesa_transactions';
    protected $fillable = ['FirstName', 'MiddleName', 'LastName','TransactionType','TransID','TransTime','BusinessShortCode',
                            'BillRefNumber','InvoiceNumber','ThirdPartyTransID','MSISDN','TransAmount'];
}
