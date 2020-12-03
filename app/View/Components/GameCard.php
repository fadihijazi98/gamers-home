<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameCard extends Component
{
    public $game;
    public $loop;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($game, $loop)
    {
        $this->game = $game;
        $this->loop = $loop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.game-card');
    }
}
