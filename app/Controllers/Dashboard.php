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
        if (count($this->request->getVar()) == 0) {

            $q = $mod->join('user', 'user_id=user.id')->findAll();
        } else {
            $q = $mod->join('user', 'user_id=user.id')->like('judul', $this->request->getVar('cari'), 'both')->findAll();
        }

        $data = [
            'judul' => 'Dashboard',
            'data' => $q
        ];
        return view('dashboard', $data);
    }
    public function artikel()
    {

        $data = [
            'judul' => 'Artikel Baru'
        ];
        return view('artikel', $data);
    }
}
