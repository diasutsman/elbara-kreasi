@extends('layouts.app')
@section('content')
        <!-- Hero -->
        <div class="px-4">
          <div class="flex container mt-16 flex-wrap gap-y-8">
              <div class="md:flex-1">
                  <div class="md:mr-40 flex flex-col justify-center items-start h-full gap-4">
                      <h1 class="text-4xl">
                          Custom Cosmetic <br />
                          Packaging Solutions
                      </h1>
                      <p class="text-base">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                          beatae incidunt quos officia nemo distinctio soluta. Voluptas sint
                          fugiat inventore?
                      </p>
                      <a href="#" class="uppercase text-sm p-3 text-white bg-primary rounded-full mt-4">custom
                          sekarang!</a>
                  </div>
              </div>
              <div class="md:flex-1 w-full">
                  <div class="h-80 bg-[#CCCCCC] rounded-[67px]"></div>
              </div>
          </div>
      </div>
  
      {{-- Category --}}
      <section class="mt-36 text-center px-4">
          <div class="container">
              <h2 class="text-3xl">Kategori Pilihan</h2>
              <div class="mt-4 gap-12 grid grid-auto-fit-[15rem]">
                  @foreach (range(0, 3) as $i)
                      <div>
                        <div class="h-60 bg-[#d9d9d9]">
                        </div>
                        <p class="mt-5 text-base">Category {{ $i + 1 }}</p>
                      </div>
                  @endforeach
              </div>
          </div>
      </section>

      {{-- Best Seller Product --}}
      <section class="mt-16 text-center px-4">
        <div class="container">
            <h2 class="text-3xl">Product Best Seller</h2>
            <div class="mt-4 gap-12 grid grid-auto-fit-[15rem]">
                @foreach (range(0, 3) as $i)
                    <div class="text-left">
                      <div class="h-60 bg-[#d9d9d9]">
                      </div>
                      <p class="mt-4 text-base uppercase">Product {{ $i + 1 }}</p>
                      <p class="text-xs text-muted mt-1">Category {{ rand(0, 3) + 1 }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
  
@endsection