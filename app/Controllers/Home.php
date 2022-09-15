<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        helper('functions');
        if (isset($_GET['kategori'])) {
            $kat = $_GET['kategori'];
        } else {
            $x = kategori()[0]['kategori'];
            $kat = firstWordUpCase($x);
        }
        $mod = \App\Models\Articles::class;
        $mod = new $mod;
        $headlines = $mod->join('user', 'user_id=user.id')->where('kategori', 'Headline')->orderBy('article.updated_at', 'DESC')->limit(3)->find();
        $new = $mod->join('user', 'user_id=user.id')->orderBy('article.updated_at', 'DESC')->limit(3)->find();
        $trendings = $mod->join('user', 'user_id=user.id')->orderBy('article.klik', 'DESC')->limit(4)->find();
        $kategori = $mod->join('user', 'user_id=user.id')->where('kategori', $kat)->orderBy('article.updated_at', 'DESC')->find();

        $data = [
            'headline' => $headlines,
            'new' => $new,
            'trending' => $trendings,
            'kategori' => $kategori,
            'active' => $kat
        ];
        return view('home', $data);
    }
    public function berita($slug)
    {

        $mod = \App\Models\Articles::class;
        $mod = new $mod;
        $q = $mod->select('article.id as id, user_id,judul, kategori, highlight,slug, article, poster,klik, article.updated_at as updated_at,article.created_at as created_at, username,nama,image,alias,role')->join('user', 'user_id=user.id')->where('slug', $slug)->first();
        $sidebar = $mod->select('article.id as id, user_id,judul, kategori, highlight,slug, article, poster,klik, article.updated_at as updated_at,article.created_at as created_at, username,nama,image,alias,role')->join('user', 'user_id=user.id')->orderBy('article.created_at', 'DESC')->limit(10)->find();
        $trendings = $mod->join('user', 'user_id=user.id')->orderBy('article.klik', 'DESC')->limit(4)->find();
        if (!$q) {
            return redirect()->to(base_url());
        }

        $data = [
            'judul' => $q['judul'],
            'data' => $q,
            'sidebar' => $sidebar,
            'trending' => $trendings
        ];
        return view('singlepage', $data);
    }
}
