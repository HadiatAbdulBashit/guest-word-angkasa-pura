@extends('main')

@section('container')
    <h2>Hasil Permainan</h2>
    <p>Poin yang Anda dapatkan: {{ $poin }}</p>

    <form action="{{ route('game.savePoint') }}" method="POST">
        @csrf
        <input type="text" name="nama_user" placeholder="Nama Anda" required>
        <input type="hidden" name="total_point" value="{{ $poin }}">
        <button type="submit">Simpan Poin</button>
    </form>

    <form action="{{ route('game.restart') }}" method="POST">
        @csrf
        <button type="submit">Ulangi</button>
    </form>
@endsection
