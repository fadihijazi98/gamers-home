<div wire:init="fetch">

    <h2 class="text-blue-500 uppercase tracking-wider font-semibold">
        popular games
    </h2>

    <div
        class="popular-games text-sm grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">

        @forelse($games as $game)

            <x-game-card :game="$game" :loop="$loop" />

        @empty

            @foreach(range(1, 12) as $game)

                <x-game-card-skeleton/>

            @endforeach

        @endforelse

    </div>

</div>
