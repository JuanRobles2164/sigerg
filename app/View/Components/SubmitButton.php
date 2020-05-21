<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class SubmitButton extends Component
{
    public $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = 'Crear')
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.submit-button');
    }
}
