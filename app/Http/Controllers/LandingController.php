<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __invoke($lang = 'pt')
    {
        $json = \File::get('json/'.$lang.'.json');
        $data = json_decode($json);

        if(!in_array($lang, ['pt', 'en', 'es']))
            return abort(404);

        $lang_nome = 'nome_'.$lang;

        $cargos = Cargo::query()->orderBy($lang_nome, 'ASC')->get();
        foreach($cargos as $cargo) {
            $cargo->nome = $cargo->$lang_nome;
        }

        return view('landing', compact(['cargos', 'data', 'lang']));
    }
}
