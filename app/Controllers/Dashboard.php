<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    function __construct()
    {
        $session = session('id');
        if ($session === null) {
            session()->setFlashdata('gagal', 'Anda belum login!.');
            header("Location: " . base_url() . '/login');
            die;
        }
    }
    public function index()
    {

        $mod = \App\Models\Articles::class;
        $mod = new $mod;

        $q = $mod->join('user', 'user_id=user.id')->findAll();
        $data = [
            'judul' => 'Dashboard',
            'data' => $q
        ];
        return view('dashboard', $data);
    }
}
