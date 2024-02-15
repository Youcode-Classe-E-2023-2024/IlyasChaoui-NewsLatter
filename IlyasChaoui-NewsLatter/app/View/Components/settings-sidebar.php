<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class settings-sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public $roles;
    public $allUsers;
    public function __construct($roles, $allUsers)
    {
        $this->roles = $roles;
        $this->allUsers = $allUsers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar.settings-sidebar');
    }
}
