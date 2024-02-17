<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class templates extends Component
{
    /**
     * Create a new component instance.
     */
    public $medias;
    public $newsletter;
    public function __construct($newsletter,$medias)
    {
        $this->medias = $medias;
        $this->newsletter = $newsletter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.Dashboard.templates');
    }
}
