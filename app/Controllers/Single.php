<?php

namespace App\Controllers;

class Single extends BaseController
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
    public function index($slug)
    {
        $mod = \App\Models\Articles::class;
        $mod = new $mod;

        $q = $mod->join('user', 'user_id=user.id')->where('slug', $slug)->first();
        $data = [
            'judul' => $q['judul'],
            'data' => $q
        ];
        return view('single', $data);
    }

    public function edit()
    {
        dd($this->request->getFile('poster'));
        dd($this->request->getVar());
    }
}
