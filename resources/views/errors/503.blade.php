@extends('layouts.app')
@section('content')
    <section class="mt-36 mb-52 px-6 dark:text-white">

        <div class="container">
            <div class="flex flex-col items-center text-center gap-6">
                <img src="{{ asset('/img/maintenance.svg') }}" alt="">
                <h1 class="font-bold text-sm">Sorry...<br> we’re under maintenance</h1>
                <p class="text-xs">Sorry, the website is currently under<br> maintenance, please come back later</p>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
