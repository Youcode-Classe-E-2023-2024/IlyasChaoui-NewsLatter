<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tables extends Component
{
    public $users;
    public $emails;

    public function __construct($users,$emails)
{
    $this->users = $users;
    $this->emails = $emails;
}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tables');
    }
}
