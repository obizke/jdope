<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\BaseRepository;

/**
 * Class OrderRepository
 * @package App\Repositories
 * @version September 21, 2020, 1:57 pm EAT
*/

class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Order::class;
    }
}
