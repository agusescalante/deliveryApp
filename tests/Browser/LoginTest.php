<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     * 
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create([
            'email'=>'ejemplo@laravel.com',
            'password'=>bcrypt('12345678')        
            ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email',$user->email)
                    ->type('password','12345678')
                    ->press('LOGIN')
                    ->assertSee('Orders loaded');
        });
    }

    public function testLoginPath()
    {
        $user = User::factory()->create([
            'email'=>'ejemplo@laravel.com',
            'password'=>bcrypt('12345678')        
            ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/')
                    ->clickLink('Login')
                    ->waitForText('Login')
                    ->type('email',$user->email)
                    ->type('password','12345678')
                    ->press('LOGIN')
                    ->assertPathIs('/orders');
        });
    }

    public function testLoginFailed()
    {
        $user = User::factory()->create([
            'email'=>'ejemplo@test.com',
            'password'=>bcrypt('123456789')        
            ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email',$user->email)
                    ->type('password','12345678')
                    ->press('LOGIN')
                    ->assertSee('These credentials do not match our records');
        });

    }


}
