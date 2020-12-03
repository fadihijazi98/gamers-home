@extends('layouts.app')

@section('content')

    <div class="">

        <livewire:popular-games/>

        <div class="flex flex-col lg:flex-row my-10">

            <livewire:recently-reviewed/>

            <livewire:most-anicipated/>

        </div>

    </div>

@endsection
