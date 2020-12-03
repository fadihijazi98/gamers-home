<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    public $searchResult = '';

    public function render()
    {
        $this->searchResult = $this->searchByName();
        return view('livewire.search-dropdown');
    }

    public function searchByName()
    {
        if (strlen($this->search) > 2) {
            $twitchQurey = "search \"$this->search\";fields name, slug, cover.url;limit 6;";
            return Http::withHeaders(config('services.igdb'))
                ->withBody($twitchQurey, 'text/plain')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        } else
            return [];
    }
}
