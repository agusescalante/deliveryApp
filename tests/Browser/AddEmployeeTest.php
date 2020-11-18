<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddEmployeeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::factory()->create([
            'email'=>'ejemplo@laravel.com',
            'role'=>'boss',
            'password'=>bcrypt('12345678')        
            ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
            ->type('email',$user->email)
            ->type('password','12345678')
            ->press('LOGIN')
            ->visit('/employees')
            ->click('#create')
            ->type('name', 'empleado1')
            ->type('surname', 'ApEmpleado1')
            ->type('email', 'empleado1@gmail.com')
            ->type('born_date', '26-06-2011')
            ->press('Add')
            // ->assertSee('empleado1')
             ->assertPathIs('/employees');
      });
    }
}
