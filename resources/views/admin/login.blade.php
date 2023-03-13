<!DOCTYPE html>
<html lang="en" class="font-sans">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <title>Elbara Kreasi Indonesia</title>
</head>

<body class="h-[100dvh] h-screen">

    <div class="flex p-5 items-stretch h-full gap-16">
        <div class="hidden md:grid bg-placeholder flex-1 rounded-lg px-10 py-12">
            <img src="{{ asset('img/logo.webp') }}" alt="Elbara Kreasi Logo" class="h-12 row-span-full col-span-full">
            <h1 class="text-white font-bold text-4xl self-center row-span-full col-span-full">Custom Packaging Untuk
                Produk Anda</h1>
        </div>

        <div class="flex-[1.5]">

            <div class="grid items-center h-full">
                <div>
                    <h1 class="font-bold text-2xl">Login</h1>
                    <p class="mt-6 text-xl">Welcome Back Admin!</p>

                    <form action="{{ route('admin.login') }}" method="POST" class="mt-16 flex flex-col gap-y-11">
                        @csrf
                        <div class="flex flex-col gap-y-4">
                            <label for="username" class="text-[#777] text-xl font-bold">Username</label>
                            <input type="text" id="username" name="username"
                                class="w-full h-12 border-primary border-opacity-30 border-2 rounded-md focus-visible:ring-primary focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:outline-none transition-all"
                                value="{{ old('username') }}">
                            @error('username')
                                <p class="text-sm text-red-600 dark:text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-y-4">
                            <label for="password" class="text-[#777] text-xl font-bold">Password</label>
                            <input type="password" id="password" name="password"
                                class="w-full h-12 border-primary border-opacity-30 border-2 rounded-md focus-visible:ring-primary focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:outline-none transition-all">
                            @error('password')
                                <p class="text-sm text-red-600 dark:text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-primary px-8 rounded-xl py-4 text-white self-start font-bold hover:opacity-90 focus-visible:ring-primary focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:outline-none transition-all">Login</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
