<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Person;

class PersonTest extends TestCase
{
    
    use DatabaseMigrations;

    private $ajaxHeader = ['X-Requested-With' => 'XMLHttpRequest'];

    protected function setUp()
    {
        parent::setUp();

        // Set up 10 people in db including one with known data
        factory(Person::class)->create([
                                    'first_name'=>'Joe',
                                    'last_name'=>'Stone',
                                    'email'=>'joe@test.com',
                                    'phone'=>'012312345',
                                ]);
        factory(Person::class, 9)->create();
    }

    /**
     * @test - Index the Person resource 
     *
     * @return void
     */
    public function can_view_a_list_of_people()
    {
        
        // Get the people
        $response = $this->json('GET', '/api/people');

        // Check response is OK and has the correct structure and data
        $response->assertStatus(200);
        $response->assertJson([[
                    'first_name'=>'Joe',
                    'last_name'=>'Stone',
                    'email'=>'joe@test.com',
                    'phone'=>'012312345',                
                ]]);
    }

    /**
     * @test - Add a new person
     *
     * @return void
     */
    public function can_add_a_new_person()
    {
        
        // Make a person
        $person = factory(Person::class)->make()->toArray();

        // Send to store endpoint
        $response = $this->json('POST', 'api/people', $person, [], $this->ajaxHeader);

        // Check correct status and added to db
        $response->assertStatus(201);

    }

    /**
     * @test - Validation for adding a new person - required fields
     *
     * @return void
     */
    public function cannot_add_a_new_person_if_validation_fails_required_fields()
    {
        // Make a person with blank fields
        $person = ['first_name'=>'', 'last_name'=>'', 'email'=>''];

        // Send to store endpoint
        $response = $this->json('POST', 'api/people', $person, [], $this->ajaxHeader);

        // Check correct status and validation errors
        $response->assertStatus(422);
        $response->assertJson([
            "first_name"=>["The first name field is required."],
            "last_name"=>["The last name field is required."],
            "email"=>["The email field is required."],
        ]);
    }

    /**
     * @test - Validation for adding a new person - invalid email
     *
     * @return void
     */
    public function cannot_add_a_new_person_if_validation_fails_invalid_email()
    {
        // Make a person with invalid email
        $person = factory(Person::class)->make(['email'=>'Not an email'])->toArray();

        // Send to store endpoint
        $response = $this->json('POST', 'api/people', $person, [], $this->ajaxHeader);

        // Check correct status and validation errors
        $response->assertStatus(422);
        $response->assertJson([
            "email"=>["The email must be a valid email address."],
        ]);
    }

    /**
     * @test - Validation for adding a new person - invalid email
     *
     * @return void
     */
    public function cannot_add_a_new_person_if_validation_fails_existing_email()
    {
        // Make a person with existing email
        $person = factory(Person::class)->make(['email'=>'joe@test.com'])->toArray();

        // Send to store endpoint
        $response = $this->json('POST', 'api/people', $person, [], $this->ajaxHeader);

        // Check correct status and validation errors
        $response->assertStatus(422);
        $response->assertJson([
            "email"=>["The email has already been taken."],
        ]);
    }

}
