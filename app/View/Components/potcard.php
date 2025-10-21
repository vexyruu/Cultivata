<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Pot;

class potcard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Pot $pot)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.potcard');
    }
}
