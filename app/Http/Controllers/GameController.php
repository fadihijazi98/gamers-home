<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }


    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $twitchQurey = "
             fields name, cover.url, first_release_date, rating, platforms.abbreviation, rating,
                    slug, involved_companies.company.name, genres.name, aggregated_rating,
                    summary, websites.*, videos.*, screenshots.*, similar_games.cover.url,
                    similar_games.name, similar_games.rating,similar_games.platforms.abbreviation,
                    similar_games.slug;
            where slug = \"${slug}\";
        ";

        $game = Http::withHeaders(config('services.igdb'))
            ->withBody($twitchQurey, 'text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();

        $game = $game[0];

        $website = array_key_exists('websites', $game) ? collect($game['websites'])->first()['url'] : '';
        $facebook = array_key_exists('websites', $game) ? $this->getSiteUrl($game['websites'], 'facebook') : '';
        $instagram = array_key_exists('websites', $game) ? $this->getSiteUrl($game['websites'], 'instagram') :  '';
        $twitter = array_key_exists('websites', $game) ? $this->getSiteUrl($game['websites'], 'twitter') : '';

        abort_if(!$game, 404);

        return view('show', compact(['game', 'website', 'facebook', 'instagram', 'twitter']));
    }

    public function getSiteUrl($websites, $siteName)
    {
        $result = collect($websites)->filter(function ($site) use ($siteName) {
            return Str::contains($site['url'], $siteName);
        })->first();
        return $result ? $result['url'] : '#';
    }

}
