<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class BookStoreTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_book()
    {
        $user = User::find(1); // Assuming the user with ID 1 exists

        // Act as the created user
        $response = $this->actingAs($user)->post(route('books.store'), [
            'title' => 'Test Book',
            'published_date' => '2023-01-01',
            'description' => 'This is a test book description.',
            'isbn' => '1234567890',
        ]);

        $response->assertStatus(201); // Assert the correct status code
        $this->assertDatabaseHas('books', [
            'title' => 'Test Book',
            'isbn' => '1234567890',
        ]);
    }
}
