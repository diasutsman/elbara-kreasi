@extends('auth.main')

@section('content')
    <div class="hidden md:block">
        <h1 class="text-2xl font-bold">Login</h1>
        <p class="mt-6 text-xl">Welcome Back!</p>
        <p class="mt-2 text-xl">Don't have account? <a class="text-onPrimary underline transition-colors hover:text-primary"
                href="{{ route('register') }}">Register Here</a></p>
    </div>

    <div class="block bg-primary px-4 pb-6 pt-25 text-white md:hidden">
        <h1 class="text-2xl font-bold">Masuk dengan <br> Akun anda</h1>
    </div>

    <form class="flex flex-col gap-6 bg-white px-4 pt-6 md:mt-[9.25vh] md:gap-y-11 md:px-0" action="{{ route('login') }}"
        method="POST" x-data="{
            submitting: false,
        }" @submit.prevent="submitting = true;$el.submit()">
        @csrf
        <div class="flex flex-col gap-y-2 md:gap-y-4">
            <label class="font-bold text-[#777] md:text-xl" for="username">Username</label>
            <input
                class="w-full rounded-md border-[1.5px] border-primary border-opacity-40 px-2 py-3 transition focus-visible:border-[2px] focus-visible:border-onPrimary focus-visible:outline-none"
                id="username" type="text" name="username" value="{{ old('username') }}" autofocus>
            @error('username')
                <p class="text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex flex-col gap-y-2 md:gap-y-4">
            <label class="font-bold text-[#777] md:text-xl" for="password">Password</label>
            <input
                class="w-full rounded-md border-[1.5px] border-primary border-opacity-40 px-2 py-3 transition focus-visible:border-[2px] focus-visible:border-onPrimary focus-visible:outline-none"
                id="password" type="password" name="password">
            @error('password')
                <p class="text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <button
            class="grid w-full place-items-center self-start rounded-md bg-primary px-8 py-4 font-bold text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 enabled:hover:opacity-90 md:w-auto"
            :class="submitting && 'opacity-50'" type="submit" :disabled="submitting">
            <span class="col-span-full row-span-full" :class="submitting && 'opacity-0'">Login</span>
            <svg class="col-span-full row-span-full h-6 w-6 animate-spin" x-show="submitting" x-cloak
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                </path>
            </svg>
        </button>
    </form>
@endsection
