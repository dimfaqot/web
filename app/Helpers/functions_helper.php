<?php
function menu()
{
    $role = session('role');

    $mod = \App\Models\Menus::class;
    $mod = new $mod;

    $q = $mod->where('role', $role)->find();
    return $q;
}

function akses()
{
}
