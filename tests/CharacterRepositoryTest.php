<?php

use App\Models\Character;
use App\Repositories\CharacterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CharacterRepositoryTest extends TestCase
{
    use MakeCharacterTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CharacterRepository
     */
    protected $characterRepo;

    public function setUp()
    {
        parent::setUp();
        $this->characterRepo = App::make(CharacterRepository::class);
    }

    /**
     * @test create
     */
    function it_creates_character()
    {
        $character = $this->fakeCharacterData();
        $createdCharacter = $this->characterRepo->create($character);
        $createdCharacter = $createdCharacter->toArray();
        $this->assertArrayHasKey('id', $createdCharacter);
        $this->assertNotNull($createdCharacter['id'], 'Created Character must have id specified');
        $this->assertNotNull(Character::find($createdCharacter['id']), 'Character with given id must be in DB');
        $this->assertModelData($character, $createdCharacter);
    }

    /**
     * @test read
     */
    function it_reads_characters()
    {
        $character = $this->makeCharacter();
        $dbCharacter = $this->characterRepo->find($character->id);
        $dbCharacter = $dbCharacter->toArray();
        $this->assertModelData($character->toArray(), $dbCharacter);
    }

    /**
     * @test update
     */
    function it_updates_character()
    {
        $character = $this->makeCharacter();
        $fakeCharacter = $this->fakeCharacterData();
        $updatedCharacter = $this->characterRepo->update($fakeCharacter, $character->id);
        $this->assertModelData($fakeCharacter, $updatedCharacter->toArray());
        $dbCharacter = $this->characterRepo->find($character->id);
        $this->assertModelData($fakeCharacter, $dbCharacter->toArray());
    }

    /**
     * @test delete
     */
    function it_deletes_character()
    {
        $character = $this->makeCharacter();
        $resp = $this->characterRepo->delete($character->id);
        $this->assertTrue($resp);
        $this->assertNull(Character::find($character->id), 'Character should not exist in DB');
    }
}