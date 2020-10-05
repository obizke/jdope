<?php

namespace App\Repositories;

use App\Models\Trends;
use App\Repositories\BaseRepository;

/**
 * Class TrendsRepository
 * @package App\Repositories
 * @version September 3, 2020, 10:30 pm EAT
*/

class TrendsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'photo'
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
        return Trends::class;
    }
}
