<?php

namespace App\Http\Controllers;

use App\Mail\BukuBaru;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PeulajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }

        // mengambil data ke file storage-----------------------------------------------
        // $buku = Storage::get('buku.txt');
        // $buku = explode("\n", $buku);
        // -----------------------------------------------------------------------------

        // mengambil data mengunakan Query Builder --------------------------------------
        // $buku = DB::table('buku')
        //     ->select('id', 'judul', 'deskripsi', 'updated_at')
        //     ->where('udep', '=', true)
        //     ->get();
        // -------------------------------------------------------------------------------

        // mengambil data mengunakan model eloquent --------------------------------------
        $buku = Buku::udep()->get();
        // menampilkan data yang telah dihapus mengunakan soft delete
        // $buku = Buku::udep()->withTrashed()->get();
        // -------------------------------------------------------------------------------

        $data = [
            'buku' => $buku
        ];
        return view('peulajaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }

        return view('peulajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }

        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');

        // insert data ke file storage-----------------------------------------------
        // $data = Storage::get('buku.txt');
        // $data = explode("\n", $data);
        // $new_data = [
        //     count($data) + 1,
        //     $judul,
        //     $deskripsi,
        //     date('Y-m-d H:i:s')
        // ];
        // $new_data = implode(",", $new_data);
        // array_push($data, $new_data);
        // $data = implode("\n", $data);
        // Storage::write('buku.txt', $data);
        //----------------------------------------------------------------------------

        // mengambil data mengunakan Query Builder --------------------------------------
        // DB::table('buku')->insert([
        //     'judul' => $judul,
        //     'deskripsi' => $deskripsi,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
        // ------------------------------------------------------------------------------

        // mengambil data mengunakan model eloquent -------------------------------------
        // mengunakan insert
        // Buku::insert([
        //     'judul' => $judul,
        //     'deskripsi' => $deskripsi,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
        // mengunakan create
        $buku = Buku::create([
            'judul' => $judul,
            'deskripsi' => $deskripsi
        ]);
        // ------------------------------------------------------------------------------

        Mail::to(Auth::User()->email)->send(new BukuBaru($buku));

        $this->notify_telegram($buku);

        return redirect('peulajaran');
    }

    private function notify_telegram($buku)
    {
        $api_token = "7024844047:AAGLuOMbN07JSRjWtiohWICvlMuasGEDgPM";
        $url = "https://api.telegram.org/bot{$api_token}/sendMessage";
        $chat_id = -4570831959;
        $asoe = "Ada buku baru nih yang berjudul : <strong>\"{$buku->judul}\"</strong>";

        $data = [
            'chat_id' => $chat_id,
            'text' => $asoe,
            'parse_mode' => "HTML"
        ];

        Http::post($url, $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }
        // mengambil satu data dari file storage -------------------------------------------------
        // $buku = Storage::get('buku.txt');
        // $buku = explode("\n", $buku);
        // $data = array();
        // foreach ($buku as $book) {
        //     $book = explode(",", $book);
        //     if ($book[0] == $id) {
        //         $data = $book;
        //     }
        //     $view_data = [
        //         'buku' => $data
        //     ];
        // }
        // -----------------------------------------------------------------------------------

        // mengambil data mengunakan Query Builder -------------------------------------------
        // $data = DB::table('buku')
        //     ->select('id', 'judul', 'deskripsi', 'created_at')
        //     ->where('id', '=', $id)
        //     ->first();
        // -----------------------------------------------------------------------------------

        // mengambil data mengunakan model eloquent ------------------------------------------
        $data = Buku::where('id', '=', $id)->first();
        $pendapats = $data->pendapats()->get();
        $total = $data->hitung();
        // -----------------------------------------------------------------------------------

        $view_data = [
            'buku' => $data,
            'pendapats' => $pendapats,
            'total' => $total
        ];
        return  view('peulajaran.peuleumah', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }
        // mengambil data mengunakan Query Builder --------------------------------------
        // $data = DB::table('buku')
        //     ->select('id', 'judul', 'deskripsi', 'created_at')
        //     ->where('id', '=', $id)
        //     ->first();
        // ------------------------------------------------------------------------------

        // mengambil data mengunakan model eloquent -------------------------------------
        $data = Buku::where('id', '=', $id)->first();
        // ------------------------------------------------------------------------------

        $view_data = [
            'buku' => $data
        ];
        return view('peulajaran.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }

        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');

        // mengambil data mengunakan Query Builder -------------------------------------------
        // DB::table('buku')
        //     ->where('id', '=', $id)
        //     ->update([
        //         'judul' => $judul,
        //         'deskripsi' => $deskripsi,
        //         'updated_at' => date('Y-m-d H:i:s')
        //     ]);
        // -----------------------------------------------------------------------------------

        // mengambil data mengunakan model eloquent ------------------------------------------
        Buku::where('id', '=', $id)->update([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // -----------------------------------------------------------------------------------

        return redirect("peulajaran/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }
        // mengambil data mengunakan Query Builder --------------------------------------
        // DB::table('buku')
        //     ->where('id', '=', $id)
        //     ->delete();
        // ------------------------------------------------------------------------------

        // mengambil data mengunakan model eloquent -------------------------------------
        Buku::where('id', '=', $id)->delete();
        // ------------------------------------------------------------------------------

        return redirect('peulajaran');
    }
}
