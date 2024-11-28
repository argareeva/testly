<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCheckboxes extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public array $options,
        public ?array $values = [],
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-checkboxes');
    }
}
