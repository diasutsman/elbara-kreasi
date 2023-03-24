<!DOCTYPE html>
<html class="font-sans" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <title>Elbara Kreasi Indonesia</title>
</head>

<body class="h-[100dvh] h-screen">

    <div class="flex h-full items-stretch gap-16 p-5">
        <div class="hidden flex-1 rounded-lg bg-placeholder px-10 py-12 md:grid">
            <img class="col-span-full row-span-full h-12" src="{{ asset('img/logo.webp') }}" alt="Elbara Kreasi Logo">
            <h1 class="col-span-full row-span-full self-center text-4xl font-bold text-white">Custom Packaging Untuk
                Produk Anda</h1>
        </div>

        <div class="flex-[1.5]">

            <div class="grid h-full items-center">
                <div>
                    <h1 class="text-2xl font-bold">Login</h1>
                    <p class="mt-6 text-xl">Welcome Back Admin!</p>

                    <form class="mt-16 flex flex-col gap-y-11" action="{{ route('admin.login') }}" method="POST">
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

        </div>
    </div>
</body>

</html>
