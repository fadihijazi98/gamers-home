<div class="flex mt-8">

    <div>
        <a href="{{ route('game.show', $game['slug']) }}">
            <img
                src="{{\Illuminate\Support\Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}"
                alt="image cover" class="w-16"/>
        </a>
    </div>

    <div class="ml-6">

        <div class="font-semibold text-sm">
            <a href="#">
                {{ $game['name'] }}
            </a>
        </div>

        <div class="text-sm text-gray-500">
            {{ \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
        </div>

    </div>

</div>
