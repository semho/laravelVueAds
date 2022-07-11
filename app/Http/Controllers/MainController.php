<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class MainController extends Controller
{
  public function list() {
    return Ad::all();
  }

  public function show($id) {
    return Ad::findOrFail($id);
  }
}
