<div>

    <div class="relative inline-block">
        <a href="{{ route('game.show', $gam['slug']) }}">
            @if(array_key_exists('cover', $gam))
                <img
                    src="{{\Illuminate\Support\Str::replaceFirst('thumb', 'screenshot_big', $gam['cover']['url'])}}"
                    alt="game cover"
                    class="h-64 hover:opacity-75 transition ease-in-out duration-150">
            @else
                <div class="w-44 h-64 bg-gray-800"></div>
            @endif
        </a>

        <div class="absolute w-16 h-16 rounded-full bg-gray-800"
             style="bottom: -20px; right: -20px">
            <div
                id="similar_game_{{$loop->index}}"
                class="relative font-semibold text-sm flex items-center justify-center h-full">
                @if(key_exists('rating', $gam))

                    @push('scripts')
                            @include('tools._rating', ['slug' => "similar_game_$loop->index", 'rating' => round($gam['rating'])])
                    @endpush

                @else
                    0%
                @endif
            </div>
        </div>

    </div>

    <div>

        <p class="font-semibold sm:p-2 lg:p-3">
            {{ $gam['name'] }}
        </p>

        <p>

            @foreach($gam['platforms'] as $platform)
            @if(array_key_exists('abbreviation', $platform))

            @if($loop->last)
            {{ $platform['abbreviation'] }}
            @else
            {{ $platform['abbreviation'] }} &middot;
            @endif
            @endif

            @endforeach
        </p>

    </div>

</div>
