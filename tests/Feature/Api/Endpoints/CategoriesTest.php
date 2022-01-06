<?php

namespace Tests\Feature\Api\Endpoints;

use App\Models\User;
use App\Models\Category;
use Faker\Generator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Currently logged in User.
     *
     * @var User
     */
    protected $user;

    /**
     * Current endpoint url which being tested.
     *
     * @var string
     */
    protected $endpoint = '/api/categories/';

    /**
     * Faker generator instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * The model which being tested.
     *
     * @var Category
     */
    protected $model;

    /**
     * Setup the test environment.
     *
     * return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->faker = new Generator();
//        $this->user = User::role('super-administrator')->first();
//
//        $this->actingAs($this->user, config('api.api_guard'));

        $this->model = Category::factory()->create();
    }

    /** @test */
    public function index_endpoint_works_as_expected()
    {
        $this->getJson($this->endpoint)
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $this->model->getAttribute('name'),
                'published_at' => $this->model->getAttribute('published_at'),
            ]);
    }

    /** @test */
    public function show_endpoint_works_as_expected()
    {
        $this->getJson($this->endpoint.$this->model->getKey())
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $this->model->getAttribute('name'),
                'published_at' => $this->model->getAttribute('published_at'),
            ]);
    }

    /** @test */
    public function create_endpoint_works_as_expected()
    {
        // Submitted data
        $data = Category::factory()->raw();

        // The data which should be shown
        $seenData = $data;

        $this->postJson($this->endpoint, $data)
            ->assertStatus(201)
            ->assertJsonFragment($seenData);
    }

    /** @test */
    public function update_endpoint_works_as_expected()
    {
        // Submitted data
        $data = Category::factory()->raw();

        // The data which should be shown
        $seenData = $data;

        $this->patchJson($this->endpoint.$this->model->getKey(), $data)
            ->assertStatus(200)
            ->assertJsonFragment($seenData);
    }

    /** @test */
    public function delete_endpoint_works_as_expected()
    {
        $this->deleteJson($this->endpoint.$this->model->getKey())
            ->assertStatus(200)
            ->assertJsonFragment([
                'info' => 'The category has been deleted.',
            ]);

        $this->assertDatabaseHas('categories', [
            'name' => $this->model->getAttribute('name'),
            'published_at' => $this->model->getAttribute('published_at'),
        ]);

        $this->assertDatabaseMissing('categories', [
            'name' => $this->model->getAttribute('name'),
            'published_at' => $this->model->getAttribute('published_at'),
            'deleted_at' => null,
        ]);
    }
}
