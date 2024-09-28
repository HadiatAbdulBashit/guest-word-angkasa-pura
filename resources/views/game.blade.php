@extends('main')

@section('container')
    <form action="{{ route('game.submit') }}" method="POST">
        @csrf
        <h2>{{ $kata->clue }}</h2>
        @foreach ($kataArray as $index => $huruf)
            @if ($index === 2 || $index === 6)
                <input type="text" name="letter[{{ $index }}]" value="{{ $huruf }}" readonly>
            @else
                <input type="text" name="letter[{{ $index }}]" maxlength="1" required>
            @endif
        @endforeach
        <input type="hidden" name="kata_asli" value="{{ $kata->kata }}">
        <button type="submit">Kirim Jawaban</button>
    </form>

    <h2>Daftar Poin Tertinggi</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($highScores as $score)
                <tr>
                    <td>{{ $score->nama_user }}</td>
                    <td>{{ $score->total_point }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
