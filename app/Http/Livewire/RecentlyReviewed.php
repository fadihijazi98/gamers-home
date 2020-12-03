<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function fetch()
    {
        $before = Carbon::now()->subMonth(15)->timestamp;
        $current = Carbon::now()->timestamp;

        $twitchQurey =
            "fields name,first_release_date,platforms.abbreviation,cover.url,rating, rating_count, summary, slug;
             where cover!=null;
             where rating!=null & (first_release_date >= $before & first_release_date < $current);
             sort rating desc;
             limit 3;";

        $this->recentlyReviewed = Cache::remember('recently-reviewed', (60 * 30), function () use ($current, $before, $twitchQurey) {
            return Http::withHeaders(config('services.igdb'))
                ->withBody($twitchQurey, 'text/plain')
                ->post('https://api.igdb.com/v4/games')
                ->json();;
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
