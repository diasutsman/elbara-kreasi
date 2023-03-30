@extends('auth.main')

@section('content')
    <div class="grid h-full items-center">
        <div>
            <h1 class="text-2xl font-bold">Register</h1>
            <p class="mt-6 text-xl">Have an account? <a class="text-onPrimary underline transition-colors hover:text-primary"
                    href="{{ route('login') }}">Login Here</a></p>

            <form class="mt-16 flex flex-col gap-y-11" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-y-4">
                    <label class="text-xl font-bold text-[#777]" for="email">Email</label>
                    <input
                        class="h-12 w-full rounded-md border-2 border-primary border-opacity-30 transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                        id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <p class="text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col gap-y-4">
                    <label class="text-xl font-bold text-[#777]" for="username">Username</label>
                    <input
                        class="h-12 w-full rounded-md border-2 border-primary border-opacity-30 transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                        id="username" type="text" name="username" value="{{ old('username') }}" maxlength="12" required>
                    @error('username')
                        <p class="text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-1 flex-col gap-y-4">
                    <label class="text-xl font-bold text-[#777]" for="password">Password</label>
                    <input
                        class="h-12 w-full rounded-md border-2 border-primary border-opacity-30 transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                        id="password" type="password" name="password" required>
                    @error('password')
                        <p class="text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button
                    class="self-start rounded-xl bg-primary px-8 py-4 font-bold text-white transition-all hover:opacity-90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                    type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
