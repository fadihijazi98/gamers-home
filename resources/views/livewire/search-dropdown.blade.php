<div class="relative">

    <input
        wire:model.deboundce.300ms="search"
        class="bg-gray-800 text-sm rounded-full w-64 px-3 py-1 pl-8 focus:outline-none focus:shadow-outline"
        placeholder="Search ..."/>

    <div class="absolute top-0 flex items-center h-full p-2">
        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
             class="w-4">
            <path fill="currentColor"
                  d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"
                  class=""></path>
        </svg>
    </div>

    <div wire:loading class="spinner right-0 top-0 bottom-0 flex items-center mx-4" style="position: absolute"></div>

    <div class="absolute z-50 bg-gray-800 left-0 right-0 rounded-lg mt-2 text-xs">

        <ul>

            @forelse($searchResult as $result)
                <li class="border-b border-gray-700">
                    <a href="{{route('game.show',$result['slug'])}}"
                       class="hover:bg-gray-700 flex items-center flex-1 transition ease-in-out duration-150 px-3 py-3">
                        @if(array_key_exists('cover', $result))
                            <img
                                src="{{\Illuminate\Support\Str::replaceFirst('thumb', 'cover_small', $result['cover']['url'])}}"
                                alt="cover image" class="w-16"/>
                        @else
                            <div class="w-16 h-16 bg-gray-900"></div>
                        @endif
                        <sapn class="inline-block ml-4 font-semibold">
                            {{ $result['name'] }}
                        </sapn>
                    </a>
                </li>
            @empty
                @if(strlen($search) >=2)
                    <a href="#"
                       class="hover:bg-gray-700 flex items-center flex-1 transition ease-in-out duration-150 px-3 py-3">
                        <sapn class="inline-block ml-4 font-semibold">
                            No Result for " {{ $search }} " ..
                        </sapn>
                    </a>
                @endif
            @endforelse

        </ul>
    </div>

</div>
