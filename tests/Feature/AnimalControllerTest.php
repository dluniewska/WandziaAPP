<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimalControllerTest extends TestCase
{

   // use RefreshDatabase;

     /**
     * To see if worked run commend: vendor/bin/phpunit --filter test_only_the_logged_in_users_can_see_animal_view
     * To fail test comment out  $this->middleware('auth'); in AnimalController
     * 
     */
    public function test_only_the_logged_in_users_can_see_animal_view()
    {
        $response = $this -> get('/animal')->assertRedirect('/login');
    }


    /**
     * Illuminate\Database\QueryException: SQLSTATE[HY000] [1049] Unknown database ':memory:' (SQL: select * from information_schema.tables where table_schema = :memory: and table_name = migrations and table_type = 'BASE TABLE')
     * not able to solve the 
     */


    public function test_only_the_logged_in_users_can_see_animal_list()
    {
        
        this->ActingAs(factory(User::class)->create());
        
            $response = $this -> get('/animal')->assertOk;
     
    }

    public function test_the_animal_can_be_added_through_the_form(){



    }



}
