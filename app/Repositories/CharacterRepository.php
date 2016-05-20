<?php

namespace App\Repositories;

use App\Models\Character;
use InfyOm\Generator\Common\BaseRepository;

class CharacterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        "character_name",
		"character_age",
		"character_description"
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Character::class;
    }
}
