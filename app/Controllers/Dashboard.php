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
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            $mod = \App\Models\Articles::class;
            $mod = new $mod;

            $q = $mod->join('user', 'user_id=user.id')->orderBy('article.updated_at', 'DESC')->findAll();
            if ($page > count($q)) {
                $page = count($q);
            }

            $akhir = $page * 7;
            $mulai = ($akhir - 7) + 1;

            $data = [];

            foreach ($q as $key => $i) {
                if ($key >= ($mulai - 1) && $key < $akhir) {
                    $data[] = $i;
                }
            }

            $data = [
                'judul' => 'Dashboard',
                'page' => $page,
                'data' => $data,
                'total' => count($q),
                'dari' => $mulai,
                'sampai' => $akhir
            ];

            return view('dashboard', $data);
        } else {

            $mod = \App\Models\Articles::class;
            $mod = new $mod;
            $t = $mod->join('user', 'user_id=user.id')->orderBy('article.updated_at', 'DESC')->findAll();
            if (count($this->request->getVar()) == 0) {

                $q = $mod->join('user', 'user_id=user.id')->orderBy('article.updated_at', 'DESC')->limit(7)->find();
            } else {

                $q = $mod->join('user', 'user_id=user.id')->like('judul', $this->request->getVar('cari'), 'both')->orderBy('article.updated_at', 'DESC')->limit(7)->find();
            }

            $data = [
                'judul' => 'Dashboard',
                'page' => 1,
                'data' => $q,
                'total' => count($t),
                'dari' => 1,
                'sampai' => 7

            ];
            return view('dashboard', $data);
        }
    }
    public function artikel()
    {

        $data = [
            'judul' => 'Artikel Baru'
        ];
        return view('artikel', $data);
    }
    public function kategori()
    {

        $data = [
            'judul' => 'Kategori Baru'
        ];
        return view('kategori', $data);
    }
}
