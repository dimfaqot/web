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

        $q = $mod->select('article.id as id, user_id,judul, kategori, highlight,slug, article, poster,klik, article.updated_at as updated_at,article.created_at as created_at, username,nama,image,alias,role')->join('user', 'user_id=user.id')->where('slug', $slug)->first();

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
                unlink('images/web/' . $q['poster']);
            }
            $q['poster'] = $randomname;
        }
        if ($mod->save($q)) {
            session()->setFlashdata('sukses', 'Artikel berhasil diupdate!');
            return redirect()->to(base_url('single') . '/' . $q['slug']);
        }
    }

    public function artikel()
    {
        helper('functions');
        $judul = $this->request->getVar('judul');
        $kategori = $this->request->getVar('kategori');
        $article = $this->request->getVar('article');
        $highlight = $this->request->getVar('highlight');

        if ($judul == '') {
            session()->setFlashdata('gagal', 'Gagal!. Judul harus diisi.');
            return redirect()->to(base_url('dashboard/artikel'));
        }
        if ($kategori == '') {
            session()->setFlashdata('gagal', 'Gagal!. Kategori harus diisi.');
            return redirect()->to(base_url('dashboard/artikel'));
        }
        if ($article == '') {
            session()->setFlashdata('gagal', 'Gagal!. Artikel harus diisi.');
            return redirect()->to(base_url('dashboard/artikel'));
        }
        if ($highlight == '') {
            session()->setFlashdata('gagal', 'Gagal!. Highlight harus diisi.');
            return redirect()->to(base_url('dashboard/artikel'));
        }


        $poster = $this->request->getFile('poster');
        $randomname = 'poster.jpg';

        if ($poster->getError() == 0) {
            $randomname = $poster->getRandomName();

            $size = (int)str_replace(".", "", $poster->getSizeByUnit('mb'));

            if ($size > 2000) {
                session()->setFlashdata('gagal', 'Gagal!. Ukuran maksimal file 2MB.');
                return redirect()->to(base_url('dashboard/artikel'));
            }

            $ext = ['jpg', 'jpeg', 'png'];
            $exp = explode(".", $poster->getName());
            $exe = strtolower(end($exp));
            if (array_search($exe, $ext) === false) {
                session()->setFlashdata('gagal', 'Gagal!. Format file harus ' . implode(", ", $ext) . '.');
                return redirect()->to(base_url('dashboard/artikel'));
            }

            $poster->move('images/web/', $randomname);
        }
        $data = [
            'user_id' => session('id'),
            'judul' => firstWordUpCase($judul),
            'kategori' => $kategori,
            'highlight' => $highlight,
            'slug' => strtolower(str_replace(" ", "", $judul)) . time(),
            'article' => $article,
            'poster' => $randomname,
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ];

        $mod = \App\Models\Articles::class;
        $mod = new $mod;

        if ($mod->save($data)) {
            session()->setFlashdata('sukses', 'Artikel berhasil diupdate!');
            return redirect()->to(base_url('dashboard/artikel'));
        }
    }

    public function kategori()
    {
        helper('functions');
        $kategori = trim(htmlspecialchars(firstWordUpCase($this->request->getVar('kategori'))));

        $mod = \App\Models\Kategoris::class;
        $mod = new $mod;

        $q = $mod->where('kategori', $kategori)->first();

        if ($q) {
            session()->setFlashdata('gagal', 'Gagal!. Kategori sudah ada.');
            return redirect()->to(base_url('dashboard/kategori'));
        }

        $data = [
            'kategori' => $kategori
        ];
        if ($mod->save($data)) {
            session()->setFlashdata('sukses', 'Artikel berhasil diupdate!');
            return redirect()->to(base_url('dashboard/artikel'));
        }
    }
    public function delete()
    {
        $mod = \App\Models\Articles::class;
        $mod = new $mod;
        $id = $this->request->getVar('id');
        $q = $mod->where('id', $id)->first();

        if ($mod->delete($id)) {
            if ($q['poster'] !== 'poster.jpg') {
                unlink('images/web/' . $q['poster']);
            }
            session()->setFlashdata('sukses', 'Artikel berhasil diupdate!');
            return redirect()->to(base_url('dashboard'));
        }
    }
}
