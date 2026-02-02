@extends('layouts.app')

@section('content')
<div class="app-container">

    {{-- Background --}}
    <div class="bg-layer">
        <img src="{{ $destination->thumbnail 
            ? asset('storage/'.$destination->thumbnail) 
            : asset('images/default.jpg') }}" alt="">
        <div class="bg-overlay"></div>
    </div>

    {{-- Main --}}
    <main class="main-content">

        {{-- LEFT --}}
        <div class="content-left">
            <h1 class="hero-title">{{ $destination->name }}</h1>
            <p class="hero-desc">{{ $destination->description }}</p>

            <div class="stats-row">
                <div class="stat-item">
                    <span class="stat-label">Rating</span>
                    <div class="stat-dots">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="dot {{ $i <= floor($destination->rating) ? 'filled' : '' }}"></span>
                        @endfor
                    </div>
                </div>

                <div class="stat-item">
                    <span class="stat-label">Harga Tiket</span>
                    <strong>Rp {{ number_format($destination->ticket_price) }}</strong>
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="content-right">
            <div class="location-card">

                <div class="location-details">
                    <h3>Lokasi</h3>
                    <p>{{ $destination->location }}</p>

                    @if ($destination->latitude && $destination->longitude)
                        <a target="_blank"
                           href="https://www.google.com/maps?q={{ $destination->latitude }},{{ $destination->longitude }}"
                           class="btn-open-map">
                           Buka di Google Maps
                        </a>
                    @endif
                </div>

            </div>
        </div>

    </main>

    {{-- GALERI --}}
    @if($destination->galleries->count())
    <section class="gallery">
        @foreach($destination->galleries as $img)
            <img src="{{ asset('storage/'.$img->image) }}" alt="">
        @endforeach
    </section>
    @endif

</div>
@endsection
