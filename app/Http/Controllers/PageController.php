<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return 'Selamat Datang';
    }

    public function about()
    {
        return 'Nama : Atthalaric Nero || NIM : 2341720215';
    }

    public function articles($artikelId) {
        return 'Halaman Artikel dengan ID ' . $artikelId;
    }
}
