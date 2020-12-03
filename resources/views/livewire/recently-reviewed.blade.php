<div wire:init="fetch" class="recently-viewed w-full lg:w-3/4 mr-0 lg:mr-32">

    <h2 class="text-blue-500 uppercase tracking-wider font-semibold">
        recently reviewed
    </h2>

    <div class="recently-reviewed-container space-y-12 mt-8">

        @forelse($recentlyReviewed as $game)

            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">

                <div class="relative flex-none">

                    <a href="{{ route('game.show', $game['slug']) }}">
                        <img
                            src="{{\Illuminate\Support\Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}"
                            alt="game cover"
                            class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                    </a>

                    <div class="absolute w-16 h-16 rounded-full bg-gray-900"
                         style="bottom: -20px; right: -20px">
                        <div
                            id="rating_recently_reviewed_num_{{$loop->index}}"
                            class="relative font-semibold text-sm flex items-center justify-center h-full">
                            @include('tools._rating', ['slug' => "rating_recently_reviewed_num_$loop->index", 'rating' => round($game['rating'])])
                        </div>
                    </div>

                </div>

                <div class="ml-12">
                    <a href="{{ route('game.show', $game['slug']) }}"
                       class="block text-lg mt-4 font-semibold leading-light hover:text-gray-900">
                        {{ $game['name'] }}
                    </a>

                    <div class="text-gray-400 mt-1">
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

                    <p class="mt-6 text-gray-400">
                        {{ $game['summary'] }}
                    </p>

                </div>

            </div>
        @empty
            <div class="spinner mt-8">
            </div>
        @endforelse

    </div>


</div>
