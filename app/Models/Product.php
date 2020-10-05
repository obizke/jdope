<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Product
 * @package App\Models
 * @version September 3, 2020, 1:38 pm EAT
 *
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $photo
 * @property string $nature
 * @property number $price
 */
class Product extends Model
{

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }



    public $fillable = [
        'name',
        'slug',
        'description',
        'photo',
        'nature',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'photo' => 'string',
        'nature' => 'string',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'photo' => 'nullable',
        'nature' => 'required|string|max:255',
        'price' => 'required|numeric'
    ];

    public function order(){
        return $this->hasMany(Order::class);
    }
    
}
