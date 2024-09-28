@extends('main')

@section('container')
    <h1 class="mt-3">Guest Word Game</h1>

    <form action="{{ route('game.submit') }}" method="POST" class="mt-5">
        @csrf
        <h2>Clue: {{ $kata->clue }}</h2>
        <div class="input-group">
            @foreach ($kataArray as $index => $huruf)
                @if ($index === 2 || $index === 6)
                    <input type="text" name="letter[{{ $index }}]" value="{{ $huruf }}" class="form-control"
                        disabled>
                @else
                    <input type="text" name="letter[{{ $index }}]" maxlength="1" class="form-control" required>
                @endif
            @endforeach
            <input type="hidden" name="kata_asli" value="{{ $kata->kata }}">
            <button type="submit" class="btn btn-outline-secondary">Kirim Jawaban</button>
        </div>
    </form>

    <h2 class="mt-5">Daftar Poin Tertinggi</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama</th>
                <th>Skor</th>
                <th>Tanggal Main</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($highScores as $index => $score)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $score->nama_user }}</td>
                    <td>{{ $score->total_point }}</td>
                    <td>{{ date_format($score->created_at, 'd-M-Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
