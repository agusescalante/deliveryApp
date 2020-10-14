<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShortPasswordTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testPasswordTest()
    {
        $user = User::factory()->make([
            'email'=>'test@laravel.com',
            'password'=>bcrypt('1234')        
            ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->type('name' ,$user->name)
                    ->type('last_name' ,'last-name1')
                    ->type('email',$user->email)
                    ->type('password','1234')
                    ->press('REGISTER')
                    ->assertSee('Register');
        });
    }
    
}
