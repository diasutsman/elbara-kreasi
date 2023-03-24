@extends('auth.main')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    {{-- <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{ asset('/img/logo.webp') }}" alt="Elbara Kreasi">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    <a href="{{ route('register') }}"
                        class="font-medium text-primaryVariant hover:text-primary transition-colors">Sign Up</a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input autofocus id="email-address" name="email" type="email" autocomplete="email" required
                            class="relative block w-full rounded-t-md border-0 p-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 focus-visible:outline-none transition @error('email')
                            is-invalid placeholder:text-red-700
                        @enderror"
                            placeholder="Email address" value="{{ old('email') }}">
                        @error('email')
                            <p class="mb-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="relative block w-full rounded-b-md border-0 p-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 focus-visible:outline-none transition @error('password')
                        is-invalid placeholder:text-red-700
                    @enderror"
                            placeholder="Password">
                        @error('password')
                            <p class="mb-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary transition">
                        <label for="remember-me" class="ml-2 block text-sm text-onPrimary">Remember me</label>
                    </div>

                    <div class="text-sm">
                        <a href="{{ route('password.request') }}"
                            class="font-medium text-primaryVariant hover:text-primary transition-colors">Forgot your
                            password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative flex w-full justify-center rounded-md bg-primaryVariant py-2 px-3 text-sm font-semibold text-white hover:bg-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primaryVariant transition-colors">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-primary group-hover:text-onPrimary transition-colors"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div> --}}

    @if (session()->has('adminMessage'))
        <script>
            alert('{{ session('adminMessage') }}');
        </script>
    @endif

    <div class="grid h-full items-center">
        <div>
            <h1 class="text-2xl font-bold">Login</h1>
            <p class="mt-6 text-xl">Welcome Back!</p>
            <p class="mt-2 text-xl">Don't have account? <a
                    class="text-onPrimary underline transition-colors hover:text-primary"
                    href="{{ route('register') }}">Register Here</a></p>

            <form class="mt-16 flex flex-col gap-y-11" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-y-4">
                    <label class="text-xl font-bold text-[#777]" for="username">Username</label>
                    <input
                        class="h-12 w-full rounded-md border-2 border-primary border-opacity-30 transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                        id="username" type="text" name="username" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col gap-y-4">
                    <label class="text-xl font-bold text-[#777]" for="password">Password</label>
                    <input
                        class="h-12 w-full rounded-md border-2 border-primary border-opacity-30 transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                        id="password" type="password" name="password">
                    @error('password')
                        <p class="text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button
                    class="self-start rounded-xl bg-primary px-8 py-4 font-bold text-white transition-all hover:opacity-90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                    type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection
