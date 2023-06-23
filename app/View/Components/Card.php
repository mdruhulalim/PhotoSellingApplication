<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $image;
    public $imageName;
    public $imageDetails;
    public $status;
    public $imageData;
    /**
     * Create a new component instance.
     */
    public function __construct($image,$imageName,$imageDetails,$status,$imageData='null')
    {
        $this->image = $image;
        $this->imageName = $imageName;
        $this->imageDetails = $imageDetails;
        $this->status = $status;
        $this->imageData = $imageData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
