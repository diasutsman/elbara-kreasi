@extends('layouts.app')
@section('content')
    <h1 class="text-4xl text-center my-14">Cara Order</h1>

    <div class="container flex items-center md:items-stretch gap-y-6 flex-col md:grid md:grid-cols-[1fr,90px,1fr] lg:grid-cols-[1fr,90px,1fr,90px,1fr] px-4">

        <div class="bg-primary p-5 flex flex-col justify-between gap-y-4 h-[320px] rounded-xl border-2 border-secondary min-w-[400px] md:min-w-0">
            <div class="text-center text-white">
                <p>Masuk/Daftar <br> (Opsional)</p>
            </div>
            <div class="w-full h-60 bg-grey"></div>
        </div>

        <img src="{{ asset('img/arrow-right.svg') }}" class="hidden md:block w-10 place-self-center" alt="">
        <img src="{{ asset('img/arrow-down.svg') }}" class="w-10 md:hidden" alt="">

        <div class="bg-primary p-5 flex flex-col justify-between gap-y-4 h-[320px] rounded-xl border-2 border-secondary min-w-[400px] md:min-w-0">
            <div class="text-center text-white">
                <p>Pilih Item yang Mau Dibeli</p>
            </div>
            <div class="w-full h-60 bg-grey"></div>
        </div>

        <div class="hidden md:grid lg:hidden col-span-full justify-self-stretch md:grid-cols-[1fr,90px,1fr] lg:grid-cols-[1fr,90px,1fr,90px,1fr]">
            <img src="{{ asset('img/arrow-down.svg') }}" class="w-10 col-start-[-2] justify-self-center" alt="">
        </div>

        <img src="{{ asset('img/arrow-right.svg') }}" class="hidden md:block w-10 place-self-center md:col-start-2 lg:col-start-auto md:rotate-180 lg:rotate-0" alt="">
        <img src="{{ asset('img/arrow-down.svg') }}" class="w-10 md:hidden" alt="">

        <div class="bg-primary p-5 flex flex-col justify-between gap-y-4 h-[320px] rounded-xl border-2 border-secondary min-w-[400px] md:min-w-0 md:col-start-3 lg:col-start-auto">
            <div class="text-center text-white">
                <p>Tambahkan Item ke Keranjang</p>
            </div>
            <div class="w-full h-60 bg-grey"></div>
        </div>

        <div class="col-span-full justify-self-stretch md:grid md:grid-cols-[1fr,90px,1fr] lg:grid-cols-[1fr,90px,1fr,90px,1fr]">
            <img src="{{ asset('img/arrow-down.svg') }}" class="w-10 md:col-start-1 lg:col-start-[-2] justify-self-center" alt="">
        </div>

        <div class="bg-primary p-5 flex flex-col justify-between gap-y-4 h-[320px] rounded-xl border-2 border-secondary min-w-[400px] md:min-w-0 lg:col-start-3">
            <div class="text-center text-white">
                <p>Pesanan Otomatis <br> Terkirim ke Whatsapp</p>
            </div>
            <div class="w-full h-60 bg-grey"></div>
        </div>

        <img src="{{ asset('img/arrow-left.svg') }}" class="hidden md:hidden lg:block w-10 place-self-center" alt="">
        <img src="{{ asset('img/arrow-down.svg') }}" class="w-10 md:hidden" alt="">

        <div class="bg-primary p-5 flex flex-col justify-between gap-y-4 h-[320px] rounded-xl border-2 border-secondary min-w-[400px] md:min-w-0 md:row-start-3 lg:row-start-auto">
            <div class="text-center text-white">
                <p>Klik Tombol Pesan</p>
            </div>
            <div class="w-full h-60 bg-grey"></div>
        </div>

    </div>

    <a href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20Saya%20mau%20order"
        class="block bg-primaryVariant dark:bg-primaryVariantDark dark:text-dark-mode text-white text-center text-xl p-9 hover:opacity-90 transition-opacity my-32">
        Ingin Memiliki Packaging Custom Untuk Produk Anda? <span class="underline">Hubungi Kami Sekarang</span>>
    </a>
@endsection
