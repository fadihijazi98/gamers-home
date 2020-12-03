<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PopularGames extends Component
{
    public $games = [];

    public function fetch()
    {
        $before = Carbon::now()->subMonth(15)->timestamp;
        $after = Carbon::now()->addMonth(2)->timestamp;

        $twitchQurey =
            "fields name,first_release_date,platforms.abbreviation,cover.url,rating, slug;
             where cover!=null;
             where rating!=null & (first_release_date >= $before & first_release_date < $after);
             sort rating desc;
             limit 12;";

        $this->games = Cache::remember('popular-games', (60 * 30), function () use ($before, $after, $twitchQurey) {
            return Http::withHeaders(config('services.igdb'))
                ->withBody($twitchQurey, 'text/plain')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
