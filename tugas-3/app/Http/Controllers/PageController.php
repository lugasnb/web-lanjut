<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Jika ingin mengirim email

class PageController extends Controller
{
    // Menampilkan halaman Home
    public function home()
    {
        return view('home');
    }

    // Menampilkan halaman About
    public function about()
    {
        return view('about');
    }

    // Menampilkan halaman Portfolio
    public function portfolio()
    {
        return view('portfolio');
    }

    // Menampilkan halaman Contact
    public function contact()
    {
        return view('contact');
    }

    // Proses pengiriman form kontak
    public function sendContact(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Kirim email (Jika ingin mengirim email menggunakan Mail facade)
        // Mail::to('your-email@example.com')->send(new ContactMessage($validated));

        // Atau bisa simpan data ke database, jika dibutuhkan

        // Redirect ke halaman kontak dengan pesan sukses
        return redirect()->route('contact')->with('success', 'Pesan Anda telah terkirim!');
    }
}
