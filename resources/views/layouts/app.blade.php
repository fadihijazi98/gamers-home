<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>Gamers Home</title>

    <link rel="stylesheet" href="/css/main.css">

    <livewire:styles />


</head>
<body class="bg-gray-900 text-white">

<header class="border-b border-gray-800">

    <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">

        <div class="flex items-center">

            <a href="/" class="font-extrabold tracking-widest">
                GAMERS HOME
            </a>


            <ul class="flex ml-16 space-x-8">

                <li>
                    <a href="#" class="hover:text-gray-400">Home</a>
                </li>

                <li>
                    <a href="#" class="hover:text-gray-400">Games</a>
                </li>

                <li>
                    <a href="#" class="hover:text-gray-400">Reviews</a>
                </li>

                <li>
                    <a href="#" class="hover:text-gray-400">Comming soon</a>
                </li>

            </ul>

        </div>

        <div class="flex items-center mt-8 lg:mt-0">

            <livewire:search-dropdown/>

            <div class="ml-6">

                <a href="#">
                    <img src="/avatar.jpg" alt="avataer" class="w-8 rounded-full">
                </a>

            </div>

        </div>

    </nav>

</header>

<main class="container mx-auto py-8">

    @yield('content')

</main>

<footer class="border-t border-gray-800">
    <div class="container mx-auto px-6 py-4">
        Powered By <span class="border-b border-gray-200 pt-2">Fadi Hijazi</span>
    </div>
</footer>

<livewire:scripts />
<script src="/js/app.js"></script>
@stack('scripts')

</body>
</html>
