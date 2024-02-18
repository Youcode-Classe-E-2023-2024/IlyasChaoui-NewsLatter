<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cards-section extends Component
{
    /**
     * Create a new component instance.
     */
    public $mediasCount;
    public function __construct($mediasCount)
    {
        $this->mediasCount = $mediasCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.cards-section');
    }
}
