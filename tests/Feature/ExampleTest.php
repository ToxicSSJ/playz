<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\User;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function testSession()
    {
        $response = $this->withSession(['foo' => 'bar'])
            ->get('/');
        $response->assertStatus(302);
    }

    public function testActingAsUser()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/');
        $response->assertStatus(200);
    }

    // * This test is under working
    public function testAudiosUploadMissing()
    {
        Storage::fake('audios');

        $response = $this->json('POST', '/save', [
            UploadedFile::fake()->image('audio1.mp3'),
            UploadedFile::fake()->image('audio2.mp3')
        ]);

        // Assert one or more files were stored...
        // Storage::disk('audios')->assertExists('audio1.mp3');
        // Storage::disk('audios')->assertExists(['audio1.mp3', 'audio2.mp3']);

        // Assert one or more files were not stored...
        Storage::disk('audios')->assertMissing('missing.mp3');
        Storage::disk('audios')->assertMissing(['missing.mp3', 'non-existing.mp3']);
    }
}
