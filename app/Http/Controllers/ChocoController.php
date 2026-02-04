<?php

namespace App\Http\Controllers;

use App\Models\Choco;
use Illuminate\Http\Request;

class ChocoController extends Controller
{
    public function index()
    {
        $chocos = Choco::all();
        return view('choco-view', compact('chocos'));
    }
}
