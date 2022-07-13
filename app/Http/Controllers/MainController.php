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
    //проверяем все данные
    $name = Validate::clean($request['name']);
    $price = Validate::clean($request['price']);
    $description = Validate::clean($request['description']);

    $stringPhotos = '';
    //есть ли загруженные фото
    if (isset($_FILES['files']['name'])) {
      $files = $_FILES['files']['name'];
      foreach ($files as $file) {
        $stringPhotos .= "../storage/img/$file;";
      }
    } else {
    //делаем заглушку
      $stringPhotos .= "../storage/img/img.jpg;";
    }

    //проверка на пустоту
    if (!empty($name)
      && !empty($price)
      && !empty($description)
      && !empty($stringPhotos)
    )
    {
      //проверка по длинне символов
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

        return response($this->data, 201);
      }
    }

    return response($this->data['error'] = 'Данные не корректны', 400);
  }
}
