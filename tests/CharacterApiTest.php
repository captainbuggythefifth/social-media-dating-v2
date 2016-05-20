<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CharacterApiTest extends TestCase
{
    use MakeCharacterTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    function it_can_create_characters()
    {
        $character = $this->fakeCharacterData();
        $this->json('POST', "/api/v1/characters", $character);

        $this->assertApiResponse($character);
    }

    /**
     * @test
     */
    function it_can_read_character()
    {
        $character = $this->makeCharacter();
        $this->json("GET", "/api/v1/characters/{$character->id}");

        $this->assertApiResponse($character->toArray());
    }

    /**
     * @test
     */
    function it_can_update_character()
    {
        $character = $this->makeCharacter();
        $editedCharacter = $this->fakeCharacterData();

        $this->json('PUT', "/api/v1/characters/{$character->id}", $editedCharacter);

        $this->assertApiResponse($editedCharacter);
    }

    /**
     * @test
     */
    function it_can_delete_characters()
    {
        $character = $this->makeCharacter();
        $this->json("DELETE", "/api/v1/characters/{$character->id}");

        $this->assertApiSuccess();
        $this->json("GET", "/api/v1/characters/{$character->id}");

        $this->assertResponseStatus(404);
    }

}
