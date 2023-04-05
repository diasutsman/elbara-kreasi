@extends('layouts.app')
@section('content')
    <h1 class="my-14 text-center text-4xl">Cara Order</h1>

    <div
        class="container mx-auto flex flex-col items-center gap-y-6 px-4 md:grid md:grid-cols-[1fr,90px,1fr] md:items-stretch lg:grid-cols-[1fr,90px,1fr,90px,1fr]">

        <div
            class="flex min-h-[320px] min-w-[400px] flex-col justify-between gap-y-4 rounded-xl border-2 border-secondary bg-primary p-8 md:min-w-0">
            <div class="text-center text-white">
                <p>Masuk/Daftar <br> (Opsional)</p>
            </div>
            <div class="aspect-square w-full rounded-xl bg-grey"></div>
        </div>

        <img class="hidden w-10 place-self-center md:block" src="{{ asset('img/arrow-right.svg') }}" alt="">
        <img class="w-10 md:hidden" src="{{ asset('img/arrow-down.svg') }}" alt="">

        <div
            class="flex min-h-[320px] min-w-[400px] flex-col justify-between gap-y-4 rounded-xl border-2 border-secondary bg-primary p-8 md:min-w-0">
            <div class="text-center text-white">
                <p>Pilih Item yang Mau Dibeli</p>
            </div>
            <div class="aspect-square w-full rounded-xl bg-grey"></div>
        </div>

        <div
            class="col-span-full hidden justify-self-stretch md:grid md:grid-cols-[1fr,90px,1fr] lg:hidden lg:grid-cols-[1fr,90px,1fr,90px,1fr]">
            <img class="col-start-[-2] w-10 justify-self-center" src="{{ asset('img/arrow-down.svg') }}" alt="">
        </div>

        <img class="hidden w-10 place-self-center md:col-start-2 md:block md:rotate-180 lg:col-start-auto lg:rotate-0"
            src="{{ asset('img/arrow-right.svg') }}" alt="">
        <img class="w-10 md:hidden" src="{{ asset('img/arrow-down.svg') }}" alt="">

        <div
            class="flex min-h-[320px] min-w-[400px] flex-col justify-between gap-y-4 rounded-xl border-2 border-secondary bg-primary p-8 md:col-start-3 md:min-w-0 lg:col-start-auto">
            <div class="text-center text-white">
                <p>Tambahkan Item ke Keranjang</p>
            </div>
            <div class="aspect-square w-full rounded-xl bg-grey"></div>
        </div>

        <div
            class="col-span-full justify-self-stretch md:grid md:grid-cols-[1fr,90px,1fr] lg:grid-cols-[1fr,90px,1fr,90px,1fr]">
            <img class="w-10 justify-self-center md:col-start-1 lg:col-start-[-2]" src="{{ asset('img/arrow-down.svg') }}"
                alt="">
        </div>

        <div
            class="flex min-h-[320px] min-w-[400px] flex-col justify-between gap-y-4 rounded-xl border-2 border-secondary bg-primary p-8 md:min-w-0 lg:col-start-3">
            <div class="text-center text-white">
                <p>Pesanan Otomatis <br> Terkirim ke Whatsapp</p>
            </div>
            <div class="aspect-square w-full rounded-xl bg-grey"></div>
        </div>

        <img class="hidden w-10 place-self-center md:hidden lg:block" src="{{ asset('img/arrow-left.svg') }}"
            alt="">
        <img class="w-10 md:hidden" src="{{ asset('img/arrow-down.svg') }}" alt="">

        <div
            class="flex min-h-[320px] min-w-[400px] flex-col justify-between gap-y-4 rounded-xl border-2 border-secondary bg-primary p-8 md:row-start-3 md:min-w-0 lg:row-start-auto">
            <div class="text-center text-white">
                <p>Klik Tombol Pesan</p>
            </div>
            <div class="aspect-square w-full rounded-xl bg-grey"></div>
        </div>

    </div>

    <a class="my-32 block bg-primaryVariant p-9 text-center text-xl font-bold text-white transition-opacity hover:opacity-90 dark:bg-primaryVariantDark dark:text-dark-mode"
        href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
        target="_SEJ" rel="noreferrer">
        Ingin Memiliki Packaging Custom Untuk Produk Anda? <span class="underline">Hubungi Kami Sekarang</span>
    </a>
@endsection
