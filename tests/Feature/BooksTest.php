<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class BooksTest extends TestCase
{
    /**
     * Test find one book
     *
     * @return void
     */
    public function testFindOneBook()
    {
        $this->json('GET', 'api/books/1')
            ->assertStatus(200)
            ->assertJsonPath('data.id', "1")
            ->assertJsonPath('data.type', "Books")
            ->assertJsonPath('data.attributes.title', "Waylander I")
            ->assertJsonPath('data.attributes.slug', "waylander-I")
            ->assertJsonPath('data.attributes.overview', "Best book ever")
            ->assertJsonFragment([
                'first_name' => "David",
                'last_name'  => "Gemmel"
            ]);           
    }
}
