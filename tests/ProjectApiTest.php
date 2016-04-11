<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectApiTest extends TestCase
{
    use MakeProjectTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    function it_can_create_projects()
    {
        $project = $this->fakeProjectData();
        $this->json('POST', "/api/v1/projects", $project);

        $this->assertApiResponse($project);
    }

    /**
     * @test
     */
    function it_can_read_project()
    {
        $project = $this->makeProject();
        $this->json("GET", "/api/v1/projects/{$project->id}");

        $this->assertApiResponse($project->toArray());
    }

    /**
     * @test
     */
    function it_can_update_project()
    {
        $project = $this->makeProject();
        $editedProject = $this->fakeProjectData();

        $this->json('PUT', "/api/v1/projects/{$project->id}", $editedProject);

        $this->assertApiResponse($editedProject);
    }

    /**
     * @test
     */
    function it_can_delete_projects()
    {
        $project = $this->makeProject();
        $this->json("DELETE", "/api/v1/projects/{$project->id}");

        $this->assertApiSuccess();
        $this->json("GET", "/api/v1/projects/{$project->id}");

        $this->assertResponseStatus(404);
    }

}
