<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MostAnicipated extends Component
{
    public $mostAnticipated = [];

    public function fetch()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;

        $twitchQurey =
            "fields name,first_release_date,platforms.abbreviation,cover.url,rating, rating_count, summary, slug;
             where cover!=null;
             where rating!=null & (first_release_date >= $current & first_release_date < $afterFourMonths);
             sort rating desc;
             limit 4;";

        $this->mostAnticipated = Cache::remember('', (60 * 30), function () use ($current, $afterFourMonths, $twitchQurey) {
            return Http::withHeaders(config('services.igdb'))
                ->withBody($twitchQurey, 'text/plain')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });
    }

    public function render()
    {
        return view('livewire.most-anicipated');
    }
}
