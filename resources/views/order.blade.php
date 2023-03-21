@extends('layouts.app')
@section('content')
    
<h1 class="text-4xl text-center my-14">Cara Order</h1>

<div class="flex container flex-wrap gap-x-8 mb-16">
    
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

    <img src="{{ asset ('img/arrow-down.svg')}}" class="w-20 h-20 " alt="">


    
    

</div>


    
@endsection
