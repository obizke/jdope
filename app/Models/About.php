<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class About
 * @package App\Models
 * @version September 3, 2020, 10:34 am EAT
 *
 * @property string $description
 */
class About extends Model
{

    public $table = 'abouts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required|string'
    ];

    
}
