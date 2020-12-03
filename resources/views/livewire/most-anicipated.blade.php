<div wire:init="fetch" class="most-anicipated w-full lg:w-1/4">

    <h2 class="text-blue-500 uppercase tracking-wider font-semibold">
        most anticipated
    </h2>

    @forelse($mostAnticipated as $game)
        <x-small-game-card :game="$game" />
    @empty
        <div class="spinner mt-8">
        </div>
    @endforelse


</div>
