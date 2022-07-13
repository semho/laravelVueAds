<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Services\Validate;

class MainController extends Controller
{
  public $data = [];

  public function list()
  {
    return Ad::latest()->get();
  }

  public function show($id)
  {
    return Ad::findOrFail($id);
  }

  public function store(Request $request)
  {
    $name = Validate::clean($_POST['name']);
    $price = Validate::clean($_POST['price']);
    $description = Validate::clean($_POST['description']);
    $files = $_FILES['files']['name'];

    $stringPhotos = '';
    foreach ($files as $file) {
        $stringPhotos .= "../storage/img/$file;";
    }

    if (!empty($name)
      && !empty($price)
      && !empty($description)
      && !empty($files)) {
      if (Validate::check_length($name, 0, 200)
        && Validate::check_length($price, 0, 50)
        && Validate::check_length($description, 0, 1000)) {
        $ad = new Ad();
        $ad->name = $name;
        $ad->price = $price;
        $ad->description = $description;
        $ad->photo = $stringPhotos;
        $ad->save();
        $id = $ad->id;
        $this->data['last_insert_id'] = $id;

      } else {
        $this->data['error'] = "Введенные данные некорректны";
      }
    } else {
      $this->data['error'] = "Заполните пустые поля";
    }

    //отправляем ответ в виде json
    return json_encode($this->data);
  }
}
