<?php

namespace App\View\Components;

use App\Models\UnivImages;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Universities extends Component
{
    public $partners;

    public function __construct()
    {
        $this->partners = UnivImages::orderBy('category')->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.universities');
    }
}
