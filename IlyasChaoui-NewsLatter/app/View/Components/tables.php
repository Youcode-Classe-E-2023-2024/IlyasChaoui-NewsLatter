<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tables extends Component
{
    public $users;
    public $emails;
    public $medias;


    public function __construct($users = null, $emails = null, $medias = null)
    {
        $this->users = $users;
        $this->emails = $emails;
        $this->medias = $medias;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.Dashboard.table');
    }
}
