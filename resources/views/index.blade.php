@extends('layouts.app')

@section('title', 'Selamat Datang di Ternak Park')

@section('content')
    <h1>Selamat Datang di Ternak Park Wonosalam</h1>
    <p>Belajar, Bermain, dan Menyatu dengan Alam.</p>

    <h2>Aktivitas Unggulan Kami</h2>
    <div class="activities">
        @foreach ($activities as $activity)
            <div class="activity-card">
                {{-- Tambahkan baris ini untuk gambar --}}
                <img src="{{ asset($activity['gambar']) }}" alt="{{ $activity['nama'] }}" width="100%">
                <h3>{{ $activity['nama'] }}</h3>
                <p>{{ $activity['deskripsi'] }}</p>
            </div>
        @endforeach
    </div>
@endsection