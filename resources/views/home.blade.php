@extends('master')

@section('content')

<!-- HERO SECTION -->
<section class="bg-primary text-white py-12">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-3xl sm:text-4xl font-bold mb-3">Welcome to <span class="text-yellow-300">CampusEats</span></h1>
        <p class="text-md sm:text-lg mb-4">Order your favourite food right away!.</p>
        <a href="#popular" class="inline-block bg-white text-primary font-medium px-5 py-2 rounded-full shadow hover:bg-gray-100 transition">
            See Popular Menu 
        </a>
    </div>
</section>

<!-- FEATURES SECTION -->
<section class="py-14 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-10">Why choose us?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            {{-- <div>
                <img src="/icons/fast.svg" alt="Fast Delivery" class="mx-auto mb-3 h-10">
                <h3 class="text-lg font-semibold text-gray-700">Penghantaran Pantas</h3>
                <p class="text-sm text-gray-600 mt-1">Dalam masa 20-30 minit ke lokasi anda.</p>
            </div> --}}
            <div>
                {{-- <img src="/icons/variety.svg" alt="Variety" class="mx-auto mb-3 h-10"> --}}
                <h3 class="text-lg font-semibold text-gray-700">Varity of Choices</h3>
                <p class="text-sm text-gray-600 mt-1">From several varieties choices</p>
            </div>
            <div>
                {{-- <img src="/icons/secure.svg" alt="Secure Payment" class="mx-auto mb-3 h-10"> --}}
                <h3 class="text-lg font-semibold text-gray-700">Easy Payment</h3>
                <p class="text-sm text-gray-600 mt-1">Cash on delivery and online payment</p>
            </div>
        </div>
    </div>
</section>

<!-- POPULAR DISHES -->
<section id="popular" class="bg-white py-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-xl font-bold text-gray-800 mb-6">🔥Popular Menu</h2>

        @if($popularProducts ?? [] && count($popularProducts) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($popularProducts as $product)
                    <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition duration-150 flex gap-3 p-3">
                        <div class="w-5 h-10 flex-shrink-0 bg-gray-100 rounded-md overflow-hidden">
                           <td> <img src="{{ asset('images/' . $product->P_Image) }}" alt="{{ $product->P_Name }}" height=600px width=70px class="object-cover w-full h-full"></td>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-800 leading-tight">{{ $product->P_Name }}</h3>
                                <p class="text-xs text-gray-500 line-clamp-2 mt-1">{{ $product->S_Description }}</p>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-primary font-bold text-xs">RM{{ number_format($product->P_Price, 2) }}</span>
                                <a href="{{ url('catalogue', $product->P_Id) }}" class="text-xs bg-primary text-white px-2 py-1 rounded hover:bg-primary-dark transition">Order</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No popular products for now</p>
        @endif
    </div>
</section>




<!-- CTA SECTION -->
<section class="bg-primary py-12 text-white text-center">
    <div class="max-w-xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-3">Ready to order now?</h2>
        <p class="mb-5 text-md">Browse our nearby eatery shop</p>
        <a href="{{ url('catalogue') }}" class="bg-white text-primary px-5 py-2 rounded-full shadow hover:bg-gray-100 transition">
            Order Now
        </a>
    </div>
</section>

@endsection
