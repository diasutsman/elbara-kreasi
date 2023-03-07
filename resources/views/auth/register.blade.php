@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{ asset('/img/logo.webp') }}" alt="Elbara Kreasi">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create an account</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    <a href="{{ route('login') }}"
                        class="font-medium text-primaryVariant hover:text-primary transition-colors">Sign In</a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="name" autocomplete="name" required
                            class="relative block w-full rounded-t-md border-0 p-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 focus-visible:outline-none transition @error('name')
                            is-invalid placeholder:text-red-700
                        @enderror"
                            placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <p class="mb-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
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

                    <div>
                        <label for="password-confirmation" class="sr-only">Confirm password-confirmation</label>
                        <input id="password-confirmation" name="password_confirmation" type="password" autocomplete="current-password-confirmation" required
                            class="relative block w-full rounded-b-md border-0 p-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 focus-visible:outline-none transition @error('password-confirmation')
                        is-invalid placeholder:text-red-700
                    @enderror"
                            placeholder="password-confirmation">
                        @error('password-confirmation')
                            <p class="mb-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Your Email</label>
                    <input type="text" id="email" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="Bonnie Green">
                    <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Alright!</span> Username
                        available!</p>
                </div>
                <div>
                    <label for="username-error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Your name</label>
                    <input type="text" id="username-error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400" placeholder="Bonnie Green">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username already
                        taken!</p>
                </div> --}}
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
    </div>
@endsection
