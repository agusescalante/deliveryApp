<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class headeruser extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $users;
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // $users = DB::table('users')->count();
        return view('components.headeruser');
    }
}
