<?php

use Faker\Factory as Faker;
use App\Models\Character;
use App\Repositories\CharacterRepository;

trait MakeCharacterTrait
{
    /**
     * Create fake instance of Character and save it in database
     *
     * @param array $characterFields
     * @return Character
     */
    public function makeCharacter($characterFields = [])
    {
        /** @var CharacterRepository $characterRepo */
        $characterRepo = App::make(CharacterRepository::class);
        $theme = $this->fakeCharacterData($characterFields);
        return $characterRepo->create($theme);
    }

    /**
     * Get fake instance of Character
     *
     * @param array $characterFields
     * @return Character
     */
    public function fakeCharacter($characterFields = [])
    {
        return new Character($this->fakeCharacterData($characterFields));
    }

    /**
     * Get fake data of Character
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCharacterData($characterFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id' => $fake->word,
			'user_id' => $fake->word,
			'families_id' => $fake->word,
			'character_name' => $fake->word,
			'character_age' => $fake->word,
			'character_avatar' => $fake->word,
			'character_description' => $fake->word,
			'status' => $fake->word,
			'photo_id' => $fake->word,
			'created_at' => $fake->word,
			'updated_at' => $fake->word
        ], $characterFields);
    }
}