<?php

namespace App\Http\Controllers;

use App\Models\PointGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index() {
        // Ambil satu kata secara acak dari tabel master_kata
        $kata = DB::table('master_kata')->inRandomOrder()->first();
        
        // Ubah kata menjadi array untuk menampilkan input teks per huruf
        $kataArray = str_split($kata->kata);

        // List Permainan game berurut dari yang tertinggi
        $highScores = PointGame::orderBy('total_point', 'desc')->get();
        return view('game', compact('kata', 'kataArray', 'highScores'));
    }
    
    public function submit(Request $request) {
        $kataAsli = $request->input('kata_asli'); // Kata asli dari database
        $userInput = $request->input('letter');   // Input pengguna dalam bentuk array
        $poin = 0;
        
        // Logika penilaian, sesuai dengan aturan pada gambar
        for ($i = 0; $i < count($userInput); $i++) {
            if ($i == 2 || $i == 6) {
                continue;
            }
            if ($kataAsli[$i] === $userInput[$i]) {
                $poin += 10; // Benar +10
            } else {
                $poin -= 2;  // Salah -2
            }
        }
        
        // Setelah hitung poin, tampilkan pesan dengan pilihan simpan poin atau ulangi
        return view('game_result', compact('poin', 'kataAsli'));
    }
    
    public function savePoint(Request $request) {
        $namaUser = $request->input('nama_user');
        $totalPoin = $request->input('total_point');
    
        // Simpan poin ke database
        PointGame::create([
            'nama_user' => $namaUser,
            'total_point' => $totalPoin,
        ]);
    
        return redirect()->route('game.index')->with('success', 'Poin berhasil disimpan');
    }
    
    public function restart() {
        // Mulai ulang permainan tanpa menyimpan poin
        return redirect()->route('game.index');
    }    
}
