<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AllMediaTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $medias;
    public function __construct($medias)
    {
        $this->medias = $medias;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.all-media-table');
    }
}
