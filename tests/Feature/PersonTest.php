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

}
