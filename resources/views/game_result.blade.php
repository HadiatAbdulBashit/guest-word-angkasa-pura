@extends('main')

@section('container')
    <h1 class="mt-3">Hasil Permainan</h1>
    <p>Poin yang Anda dapatkan: {{ $poin }}</p>

    <form action="{{ route('game.savePoint') }}" method="POST">
        @csrf
        <div class="input-group">
            <input type="text" name="nama_user" placeholder="Nama Anda" class="form-control" required>
            <input type="hidden" name="total_point" value="{{ $poin }}">
            <button class="btn btn-outline-secondary" type="submit">Simpan Poin</button>
        </div>
    </form>

    <form action="{{ route('game.restart') }}" method="POST" class="mt-5">
        @csrf
        <button class="btn btn-warning mx-auto d-block" type="submit">Ulangi permainan tanpa menyimpan score</button>
    </form>
@endsection
