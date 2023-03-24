@extends('layouts.app')
@section('content')
    
<h1 class="text-4xl text-center my-14">Cara Order</h1>

<div class="flex container flex-wrap gap-x-8">
    
    <div class="row-2 bg-primary justify-items-center p-5 rounded-xl border-2 border-secondary">
        <div class="text-center mb-6 text-white">
            <p>Masuk/Daftar <br> (Opsional)</p>
        </div>
        <div class="w-60 h-60 bg-grey" ></div>
    </div>
    <img src="{{ asset ('img/arrow-right.svg')}}" class="w-20 h-20 place-self-center" alt="">

    <div class="row-2 bg-primary justify-items-center p-5 rounded-xl border-2 border-secondary">
        <div class="text-center mb-12 text-white">
            <p>Pilih Item yang Mau Dibeli</p>
        </div>
        <div class="w-60 h-60 bg-grey" ></div>
    </div>
    <img src="{{ asset ('img/arrow-right.svg')}}" class="w-20 h-20 place-self-center" alt="">

    <div class="row-2 bg-primary justify-items-center p-5 rounded-xl border-2 border-secondary">
        <div class="text-center mb-12 text-white">
            <p>Tambahkan Item ke Keranjang</p>
        </div>
        <div class="w-60 h-60 bg-grey" ></div>
    </div>

    <div class="container flex justify-end">
        <img src="{{ asset ('img/arrow-down.svg')}}" class="w-20 h-20 my-8 mr-28" alt="">
    </div>

</div>

<div class="container flex flex-row-reverse gap-x-8">
        <div class="row-2 bg-primary justify-items-center p-5 rounded-xl border-2 border-secondary mr-2">
            <div class="text-center mb-12 text-white">
                <p>Klik Tomobl Pesan</p>
            </div>
            <div class="w-60 h-60 bg-grey" ></div>
        </div>
        <img src="{{ asset ('img/arrow-left.svg')}}" class="w-20 h-20 place-self-center" alt="">

        <div class="row-2 bg-primary justify-items-center p-5 rounded-xl border-2 border-secondary">
            <div class="text-center mb-6 text-white">
                <p>Pesanan Otomatis <br> Terkirim ke Whatsapp</p>
            </div>
            <div class="w-60 h-60 bg-grey" ></div>
        </div>

</div>

<a href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20Saya%20mau%20order"
        class="block bg-primaryVariant dark:bg-primaryVariantDark dark:text-dark-mode text-white text-center text-xl p-9 hover:opacity-90 transition-opacity my-32">
        Ingin Memiliki Packaging Custom Untuk Produk Anda? <span class="underline">Hubungi Kami Sekarang</span>>
</a> 


    
@endsection
