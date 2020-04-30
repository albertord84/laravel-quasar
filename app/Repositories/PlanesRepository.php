<?php

namespace App\Repositories;

use App\Models\Planes;
use App\Repositories\BaseRepository;

/**
 * Class PlanesRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:04 pm CDT
*/

class PlanesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price',
        'recompense',
        'description',
        'has_boolean_selection',
        'has_unique_selection',
        'has_multiple_selection',
        'has_scale_response',
        'has_discursive_response',
        'has_image_content',
        'has_video_content',
        'has_link_content'
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
        return Planes::class;
    }
}
