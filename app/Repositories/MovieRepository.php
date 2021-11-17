<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Repositories\BaseRepository;

/**
 * Class MovieRepository
 * @package App\Repositories
 * @version October 23, 2021, 1:59 pm UTC
*/

class MovieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'date_release',
        'director'
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
        return Movie::class;
    }
}
