@extends('layouts.app')
@section('content')
    <!-- Hero -->
    <div class="px-4 dark:text-white">
        <div class="container mt-16 flex flex-wrap sm:gap-y-8">
            <div class="hidden sm:block md:flex-1">
                <div class="flex h-full flex-col items-start justify-center gap-4 md:mr-40">
                    <h1 class="text-4xl font-bold">
                        Custom Cosmetic <br />
                        Packaging Solutions
                    </h1>
                    <p class="text-base">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                        beatae incidunt quos officia nemo distinctio soluta. Voluptas sint
                        fugiat inventore?
                    </p>
                    <a class="mt-4 rounded-md bg-secondary p-3 text-sm font-bold uppercase text-white transition-opacity hover:opacity-90 dark:bg-secondaryDark dark:text-dark-mode"
                        href="#">
                        custom sekarang!
                    </a>
                </div>
            </div>
            <div class="w-full md:flex-1">
                <div class="rounded-[25px] h-80 sm:rounded-[67px] bg-[#CCCCCC]"></div>
            </div>

            <!-- Hero Mobile -->
            <div class="block mt-8 sm:hidden md:flex-1">
                <div class="flex h-full flex-col items-start justify-center gap-4 md:mr-40">
                    <h1 class="text-3xl font-bold">
                        Custom Cosmetic <br />
                        Packaging Solutions
                    </h1>
                    <a class="mt-4 rounded-md bg-secondary p-3 text-sm font-bold uppercase text-white transition-opacity hover:opacity-90 dark:bg-secondaryDark dark:text-dark-mode"
                        href="#">
                        custom sekarang!
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Product photos --}}
    <section class="mt-36 px-4">
        <div class="container">
            <div class="sm:mx-auto sm:w-3/4 text-center">
                <h1 class="text-xl font-bold text-onPrimary mb-2">Elbara Kreasi Indonesia</h1>
                <h2 class="text-2xl font-bold text-dark mb-3">Solusi Packaging Custom Untuk Berbagai Macam Produk</h2>
                <p class="text-[#606060]">Elbara Kreasi Indonesia adalah perusahaan importir dan supplier kemasan custom
                    untuk
                    berbagai macam produk seperti kemasan makanan, kemasan minuman, kemasan kosmetik, kartu nama, dan
                    lain-lain
                    dengan kualitas tinggi dan bermutu.</p>
            </div>
            <div class="flex-nowrap mt-12 flex gap-5 overflow-x-scroll">
                <div class="w-96 h-85 flex-none sm:h-85 sm:flex-1 bg-placeholder"></div>
                <div class="w-96 h-85 flex-none sm:h-85 sm:flex-1 bg-placeholder"></div>
                <div class="w-96 h-85 flex-none sm:h-85 sm:flex-1 bg-placeholder"></div>
            </div>
        </div>
    </section>
    

    {{-- Why Us --}}
    <section class="text-onPrimaryLight mt-32 bg-secondary">
        <div class="container pb-12 pt-8">
            <h1 class="text-center text-4xl font-bold">Kenapa Harus Elbara?</h1>
            <div class="mt-12 flex gap-6">
                <div
                    class="border-onPrimaryLight h-80 flex-1 rounded-2xl border shadow-[4px_4px_10px_1px_rgba(81,134,70,0.35)]">
                </div>
                <div
                    class="border-onPrimaryLight h-80 flex-1 rounded-2xl border shadow-[4px_4px_10px_1px_rgba(81,134,70,0.35)]">
                </div>
                <div
                    class="border-onPrimaryLight h-80 flex-1 rounded-2xl border shadow-[4px_4px_10px_1px_rgba(81,134,70,0.35)]">
                </div>
                <div
                    class="border-onPrimaryLight h-80 flex-1 rounded-2xl border shadow-[4px_4px_10px_1px_rgba(81,134,70,0.35)]">
                </div>
            </div>
        </div>
    </section>

    {{-- Category --}}
    <section class="mt-36 px-4 text-center dark:text-white">
        <div class="container">
            <h2 class="text-3xl font-bold">Kategori Pilihan</h2>
            <div class="mt-4 grid gap-12 grid-auto-fit-[15rem]">
                @foreach ($categories as $category)
                    <a class="group" href="{{ route('categories.show', $category->slug) }}">
                        <div class="grid bg-placeholder">
                            <div
                                class="z-10 col-span-full row-span-full grid aspect-square place-items-center place-self-center rounded-full bg-white p-1 opacity-0 transition-opacity group-hover:opacity-100">
                                <p class="text-base font-bold text-primary dark:text-onPrimary">Lihat Produk</p>
                            </div>
                            <img class="col-span-full row-span-full w-full transition group-hover:brightness-50"
                                src="@if ($category->image) {{ asset('storage/' . $category->image) }}
                            @else https://source.unsplash.com/500x500?{{ $category->slug }} @endif"
                                alt="{{ $category->name }}" loading="lazy">
                        </div>
                        <p class="mt-5 text-base font-bold">
                            {{ $category->name }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact us form --}}
    <div class="mb-60 mt-24 px-4 dark:text-white">
        <div class="container flex flex-col gap-16 md:flex-row">
            <div class="ml-auto flex-shrink-0 flex-grow-0 basis-64">
                <h1 class="mb-3 text-xl font-bold">Pemesanan via email</h1>
                <form class="flex w-full flex-col gap-1" x-data="{
                    isLoading: false,
                    errors: {},
                    async submit(form) {
                        this.isLoading = 1;
                        this.errors = {};
                
                        const timeoutId = setTimeout(() => {
                            this.isLoading = 2
                        }, 3000);
                
                        await fetch(form.action, {
                                method: 'POST',
                                body: new FormData(form),
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                            })
                            .then((response) => {
                                if (!response.ok)
                                    return response.text().then((text) => {
                                        throw new Error(text);
                                    });
                                Swal.fire(
                                    'Email Sent!',
                                    '',
                                    'success'
                                )
                            }).catch((error) => {
                                console.log(JSON.parse(error.message))
                                const { errors } = JSON.parse(error.message);
                                console.log(errors)
                                this.errors = errors;
                            })
                        clearTimeout(timeoutId)
                        this.isLoading = false;
                    }
                }" action="{{ route('email') }}"
                    method="POST" @submit.prevent="submit($el)">
                    @csrf
                    <input
                        class="border-2 border-grey p-4 text-xs font-medium text-black outline-none transition placeholder:font-medium placeholder:text-grey focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 dark:border-greyDark dark:bg-dark-mode dark:placeholder:text-greyDark"
                        type="text" name="name" placeholder="Nama Lengkap">
                    <template x-if="errors['name']">
                        <p class="text-sm text-red-600 dark:text-red-500" x-text="errors['name']">
                        </p>
                    </template>

                    <input
                        class="border-2 border-grey p-4 text-xs font-medium text-black outline-none transition placeholder:font-medium placeholder:text-grey focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 dark:border-greyDark dark:bg-dark-mode dark:placeholder:text-greyDark"
                        type="email" name="email" placeholder="Email">
                    <template x-if="errors['email']">
                        <p class="text-sm text-red-600 dark:text-red-500" x-text="errors['email']">
                        </p>
                    </template>
                    <textarea
                        class="border-2 border-grey p-4 text-xs font-medium text-black outline-none transition placeholder:font-medium placeholder:text-grey focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 dark:border-greyDark dark:bg-dark-mode dark:placeholder:text-greyDark"
                        id="message" placeholder="Pesan" name="message"></textarea>

                    <template x-if="errors['message']">
                        <p class="text-sm text-red-600 dark:text-red-500" x-text="errors['message']">
                        </p>
                    </template>

                    <button
                        class="mt-2 self-start rounded-md bg-primary px-5 py-2 font-bold text-white transition hover:opacity-90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 dark:text-dark-mode"
                        type="submit" :disabled="isLoading">

                        <template x-if="!isLoading">
                            <span>Kirim</span>
                        </template>
                        <template x-if="isLoading">
                            <svg class="bi bi-arrow-repeat animate-spin" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                <path fill-rule="evenodd"
                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                            </svg>
                        </template>
                    </button>
                    <p class="text-xs text-slate-400" x-show="isLoading === 2" x-transition>This took longer than usual</p>

                </form>
            </div>
        </div>
    </div>
@endsection
