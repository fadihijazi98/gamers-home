@extends('layouts.app')

@section('content')
    <div>
        <div class="flex flex-col lg:flex-row border-b border-gray-800 pb-12">

            <div class="flex-none">
                <a href="">
                    <img src="{{\Illuminate\Support\Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}"
                         alt="cover game"/>
                </a>
            </div>

            <div class="sm:ml-6 lg:ml-16">

                <div>

                    <h1 class="text-4xl font-semibold">
                        {{ $game['name'] }}
                    </h1>

                    <p>
                        @foreach($game['genres'] as $genre)
                        {{$genre['name']}} &middot;
                        @endforeach
                    </p>

                </div>

                <div class="flex flex-wrap items-center mt-8">


                    <div
                        id="memberRating"
                        class="relative ml-6 flex w-16 text-xs h-16 font-semibold justify-center items-center bg-gray-800 rounded-full">
                        @if(array_key_exists('rating', $game))

                            @push('scripts')
                                @include('tools._rating', ['slug' => 'memberRating', 'rating' => round($game['rating'])])
                            @endpush

                        @else
                            0%
                        @endif
                    </div>

                    <div class="ml-6">
                        Memmber
                        <br>
                        Score
                    </div>

                    <div
                        id="criticRating"
                        class="relative ml-16 flex w-16 h-16 text-xs font-semibold justify-center items-center bg-gray-800 rounded-full">
                        @if(array_key_exists('aggregated_rating', $game))

                            @push('scripts')
                                @include('tools._rating', ['slug' => 'criticRating', 'rating' => round($game['aggregated_rating'])])
                            @endpush

                        @else
                            0%
                        @endif
                    </div>

                    <div class="ml-6">
                        Critic
                        <br>
                        Score
                    </div>


                    <div class="flex space-x-4 ml-16 lg:mt-0 sm:mt-6">

                        <div class="bg-gray-800 p-2 rounded-full hover:bg-gray-400">
                            <a href="{{ $website }}" target="_blank">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="globe-europe"
                                     class="w-6" role="img" viewBox="0 0 496 512">
                                    <path fill="currentColor"
                                          d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm200 248c0 22.5-3.9 44.2-10.8 64.4h-20.3c-4.3 0-8.4-1.7-11.4-4.8l-32-32.6c-4.5-4.6-4.5-12.1.1-16.7l12.5-12.5v-8.7c0-3-1.2-5.9-3.3-8l-9.4-9.4c-2.1-2.1-5-3.3-8-3.3h-16c-6.2 0-11.3-5.1-11.3-11.3 0-3 1.2-5.9 3.3-8l9.4-9.4c2.1-2.1 5-3.3 8-3.3h32c6.2 0 11.3-5.1 11.3-11.3v-9.4c0-6.2-5.1-11.3-11.3-11.3h-36.7c-8.8 0-16 7.2-16 16v4.5c0 6.9-4.4 13-10.9 15.2l-31.6 10.5c-3.3 1.1-5.5 4.1-5.5 7.6v2.2c0 4.4-3.6 8-8 8h-16c-4.4 0-8-3.6-8-8s-3.6-8-8-8H247c-3 0-5.8 1.7-7.2 4.4l-9.4 18.7c-2.7 5.4-8.2 8.8-14.3 8.8H194c-8.8 0-16-7.2-16-16V199c0-4.2 1.7-8.3 4.7-11.3l20.1-20.1c4.6-4.6 7.2-10.9 7.2-17.5 0-3.4 2.2-6.5 5.5-7.6l40-13.3c1.7-.6 3.2-1.5 4.4-2.7l26.8-26.8c2.1-2.1 3.3-5 3.3-8 0-6.2-5.1-11.3-11.3-11.3H258l-16 16v8c0 4.4-3.6 8-8 8h-16c-4.4 0-8-3.6-8-8v-20c0-2.5 1.2-4.9 3.2-6.4l28.9-21.7c1.9-.1 3.8-.3 5.7-.3C358.3 56 448 145.7 448 256zM130.1 149.1c0-3 1.2-5.9 3.3-8l25.4-25.4c2.1-2.1 5-3.3 8-3.3 6.2 0 11.3 5.1 11.3 11.3v16c0 3-1.2 5.9-3.3 8l-9.4 9.4c-2.1 2.1-5 3.3-8 3.3h-16c-6.2 0-11.3-5.1-11.3-11.3zm128 306.4v-7.1c0-8.8-7.2-16-16-16h-20.2c-10.8 0-26.7-5.3-35.4-11.8l-22.2-16.7c-11.5-8.6-18.2-22.1-18.2-36.4v-23.9c0-16 8.4-30.8 22.1-39l42.9-25.7c7.1-4.2 15.2-6.5 23.4-6.5h31.2c10.9 0 21.4 3.9 29.6 10.9l43.2 37.1h18.3c8.5 0 16.6 3.4 22.6 9.4l17.3 17.3c3.4 3.4 8.1 5.3 12.9 5.3H423c-32.4 58.9-93.8 99.5-164.9 103.1z"/>
                                </svg>
                            </a>
                        </div>

                        <div class="bg-gray-800 p-2 rounded-full hover:bg-gray-400">
                            <a href="{{ $instagram }}" target="_blank">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram"
                                     role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6">
                                    <path fill="currentColor"
                                          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                                          class=""></path>
                                </svg>
                            </a>
                        </div>

                        <div class="bg-gray-800 p-2 rounded-full hover:bg-gray-400">
                            <a href="{{$twitter}}" target="_blank">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter"
                                     role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                     class="w-6">
                                    <path fill="currentColor"
                                          d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                                          class=""></path>
                                </svg>
                            </a>
                        </div>

                        <div class="bg-gray-800 p-2 rounded-full hover:bg-gray-400">
                            <a href="{{ $facebook }}" target="_blank">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square"
                                     role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                     class="w-6 ">
                                    <path fill="currentColor"
                                          d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"
                                          class=""></path>
                                </svg>
                            </a>
                        </div>

                    </div>


                </div>

                <div class="container">

                    <p class="py-16 pr-16 font-semibold text-gray-400">
                        {{ $game['summary'] }}
                    </p>

                    <button
                        onclick="showVideoTrailer()"
                        class="flex focus:outline-none items-center gap-2 bg-blue-500 p-3 rounded font-semibold  transition ease-in-out duration-150 hover:bg-blue-600">

                        <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="play-circle" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                             class="w-6">
                            <path fill="currentColor"
                                  d="M256 504c137 0 248-111 248-248S393 8 256 8 8 119 8 256s111 248 248 248zM40 256c0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216zm331.7-18l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM192 335.8V176.9c0-4.7 5.1-7.6 9.1-5.1l134.5 81.7c3.9 2.4 3.8 8.1-.1 10.3L201 341c-4 2.3-9-.6-9-5.2z"
                                  class=""></path>
                        </svg>

                        <span class="text-lg">
                            Play Trailer
                        </span>

                    </button>

                </div>

            </div>

        </div>

        <div class="image-container border-b border-gray-800 pb-12 mt-8">

            <h2 class="text-blue-500 uppercase tracking-wider font-semibold">
                images
            </h2>

            <div class="grid justify-center md:grid-cols-3 gap-12 mt-8">

                @foreach($game['screenshots'] as $screenshot)
                    <div>
                        <a href="{{\Illuminate\Support\Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url'])}}">
                            <img
                                class="hover:bg-gray-900"
                                src="{{\Illuminate\Support\Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url'])}}"
                                alt="cover game"/>
                        </a>
                    </div>
                @endforeach


            </div>

        </div>

        <div class="image-container pb-12 mt-8">

            <h2 class="text-blue-500 uppercase tracking-wider font-semibold">
                similar game
            </h2>

            <div class="grid justify-center sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 mt-8">

                @if(array_key_exists('similar_games', $game))

                    @foreach(collect($game['similar_games'])->take(5) as $gam)

                        <x-similar-game-card :gam="$gam" :loop="$loop"/>

                    @endforeach
                @endif

            </div>

        </div>

        <div class="fixed inset-0 flex items-center justify-center invisible transition ease-in-out duration-150"
             style="background-color: rgba(26, 32, 44, .85)" id="videoTrailerSection">

            <div class="relative bg-gray-800 p-16 rounded-lg">

                <iframe
                    width="1000" height="500"
                    src="https://www.youtube.com/embed/{{array_key_exists('videos', $game) ? $game['videos'][0]['video_id'] : 'fake'}}"
                    frameborder="0" id="videoTrailer"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>

                </iframe>

                <div class="absolute text-white top-0 right-0 mx-6 my-4">
                    <button class="focus:outline-none" onclick="hideVideoTrailer()">
                        <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                             class="w-4">
                            <path fill="currentColor"
                                  d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"
                                  class=""></path>
                        </svg>
                    </button>
                </div>

            </div>

        </div>

    </div>

    <script>

        var div = document.getElementById('videoTrailerSection');
        var videoSrc = "https://www.youtube.com/embed/{{array_key_exists('videos', $game) ? $game['videos'][0]['video_id'] : 'fake'}}";

        function hideVideoTrailer() {
            div.style.display = "none";
            document.getElementById('videoTrailer').src = "";
        }

        function showVideoTrailer() {
            if (div.classList.contains("invisible")) {
                div.classList.remove("invisible");
            } else {
                document.getElementById('videoTrailer').src = videoSrc;
                div.style.display = "flex";
            }
        }

    </script>

@endsection
