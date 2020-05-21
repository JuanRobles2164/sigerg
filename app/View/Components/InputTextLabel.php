<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputTextLabel extends Component
{
    public $field_name;
    public $tipo;
    public $optional;
    public $label_text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($campo, $tipo = 'text', $optional = false, $labelText = 'non_value')
    {
        if($labelText == 'non_value' || $labelText == null || $labelText == ''){
            $labelText = ucfirst($campo);
        }
        $this->field_name = $campo;
        $this->tipo = $tipo;
        $this->optional = $optional;
        $this->label_text = $labelText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input-text-label');
    }
}
