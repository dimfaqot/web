<?php
function menu()
{
    $role = session('role');

    $mod = \App\Models\Menus::class;
    $mod = new $mod;

    $q = $mod->where('role', $role)->find();
    return $q;
}

function kategori()
{
    $mod = \App\Models\Kategoris::class;
    $mod = new $mod;

    $q = $mod->findAll();

    return $q;
}

function firstWordUpCase($text)
{
    $newText = ucwords(strtolower($text));
    return $newText;
}
