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
        $mod = \App\Models\Articles::class;
        $mod = new $mod;

        $id = $this->request->getVar('id');
        $poster = $this->request->getFile('poster');


        $q = $mod->where('id', $id)->first();

        $q['judul'] = $this->request->getVar('judul');
        $q['highlight'] = $this->request->getVar('highlight');
        $q['slug'] = $this->request->getVar('slug');
        $q['article'] = $this->request->getVar('article');
        $q['kategori'] = $this->request->getVar('kategori');
        $q['updated_at'] = date("Y-m-d H:i:s");

        if ($poster->getError() == 0) {
            $randomname = $poster->getRandomName();

            $size = (int)str_replace(".", "", $poster->getSizeByUnit('mb'));

            if ($size > 2000) {
                session()->setFlashdata('gagal', 'Gagal!. Ukuran maksimal file 2MB.');
                return redirect()->to(base_url('single') . '/' . $q['slug']);
            }

            $ext = ['jpg', 'jpeg', 'png'];
            $exp = explode(".", $poster->getName());
            $exe = strtolower(end($exp));
            if (array_search($exe, $ext) === false) {
                session()->setFlashdata('gagal', 'Gagal!. Format file harus ' . implode(", ", $ext) . '.');
                return redirect()->to(base_url('single') . '/' . $q['slug']);
            }

            $poster->move('images/web/', $randomname);

            if ($q['poster'] !== 'poster.jpg') {

                unlink('images/web/' . $q['name']);
            }
            $q['poster'] = $randomname;
        }
        if ($mod->save($q)) {
            session()->setFlashdata('sukses', 'Artikel berhasil diupdate!');
            return redirect()->to(base_url('single') . '/' . $q['slug']);
        }
    }
}
