<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SimilarGameCard extends Component
{
    public $gam;
    public $loop;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($gam, $loop)
    {
        $this->gam = $gam;
        $this->loop = $loop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.similar-game-card');
    }
}
