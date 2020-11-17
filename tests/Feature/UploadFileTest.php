<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadFileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBossCanUploadFile()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('test.txt','1200');

        $employee = Employee::factory()->make()->toArray();
        $employee['file_path'] = $file;

        $user = User::factory()->create(['role' => 'boss']);

        $response = $this->actingAs($user)->post('/employees', $employee);

         $response->assertRedirect('employees');
         $response = $this->actingAs($user)->get('/employees');


        // Assert the file was stored...
        Storage::disk('public')->assertExists('files/'.$file->hashName());

    
        // $employee = Employee::first();
        // $this->assertNotEmpty($employee->file_path);

    }
    
}
