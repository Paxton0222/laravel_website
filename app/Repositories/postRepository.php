<?php

namespace App\Repositories;

use App\Models\post;
use App\Repositories\BaseRepository;

/**
 * Class postRepository
 * @package App\Repositories
 * @version July 28, 2021, 10:52 am UTC
*/

class postRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'post_data',
        'category_id',
        'tag_id',
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
        return post::class;
    }
}
