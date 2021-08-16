<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    /**
     * Test find one author
     *
     * @return void
     */
    public function testFindOneAuthor()
    {
        $this->json('GET', 'api/author/1')
            ->assertStatus(200)
            ->assertJsonPath('data.type', "Authors")
            ->assertJsonPath('data.attributes.first_name', "David")
            ->assertJsonPath('data.attributes.last_name', "Gemmel")
            ->assertJsonFragment([
                'title'     => "Waylander I",
                'slug'      => "waylander-I",
                'overview'  => "Best book ever"
            ]);           
    }
}
