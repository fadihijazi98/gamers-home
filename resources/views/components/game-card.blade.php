<div class="game mt-8">

    <div class="relative inline-block">

        <a href="{{route('game.show', $game['slug'])}}">
            <img
                src="{{\Illuminate\Support\Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}"
                alt="game cover"
                class="h-64 hover:opacity-75 transition ease-in-out duration-150">

        </a>

        <div
            class="absolute w-16 h-16 rounded-full bg-gray-800" style="bottom: -20px; right: -20px">

            <div
                id="rating_game_num_{{$loop->index}}"
                class="relative font-semibold text-sm flex items-center justify-center h-full">

                @include('tools._rating', ['slug' => "rating_game_num_$loop->index", 'rating' => round($game['rating'])])

            </div>
        </div>

    </div>

    <div>

        <a href="#" class="block text-base font-semibold mt-8 leading-light hover:text-gray-800">
            {{ $game['name'] }}
        </a>

        <div class="text-gray-400 mt-1">
            @foreach($game['platforms'] as $platform)
            @if(array_key_exists('abbreviation', $platform))

            @if($loop->last)
            {{ $platform['abbreviation'] }}
            @else
            {{ $platform['abbreviation'] }} &middot;
            @endif
            @endif

            @endforeach
        </div>

    </div>

</div>
