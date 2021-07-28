<?php

namespace App\Repositories;

use App\Models\Tags;
use App\Repositories\BaseRepository;

/**
 * Class TagsRepository
 * @package App\Repositories
 * @version July 28, 2021, 6:53 pm UTC
*/

class TagsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tag',
        'remember_token'
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
        return Tags::class;
    }
}
