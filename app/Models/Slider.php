<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Slider
 * @package App\Models
 * @version September 3, 2020, 3:33 pm EAT
 *
 * @property string $photo
 */
class Slider extends Model
{

    public $table = 'sliders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'photo' => 'nullable'
    ];

    
}
