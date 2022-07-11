<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <script defer src="{{ url('js/app.js') }}"></script>
    <title>Сайт объявлений</title>
  </head>
  <body>
{{--    @extends('layouts.app')--}}

{{--    @section('content')--}}
      <div class="container mt-5" id="app">

        <Home></Home>

        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="image-container">
                <div class="first">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="discount">-25%</span>
                    <span class="wishlist"><i class="fa fa-heart-o"></i></span>
                  </div>
                </div>
                <img src="https://i.imgur.com/8JIWpnw.jpg" class="img-fluid rounded thumbnail-image">
              </div>
              <div class="product-detail-container p-2">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="dress-name">White traditional long dress</h5>
                  <div class="d-flex flex-column mb-2">
                    <span class="new-price">$3.99</span>
                    <small class="old-price text-right">$5.99</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-1">
                  <div class="color-select d-flex ">
                    <input type="button" name="grey" class="btn creme">
                    <input type="button" name="red" class="btn red ml-2">
                    <input type="button" name="blue" class="btn blue ml-2">
                  </div>
                  <div class="d-flex ">
                    <span class="item-size mr-2 btn" type="button">S</span>
                    <span class="item-size mr-2 btn" type="button">M</span>
                    <span class="item-size btn" type="button">L</span>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-1">
                  <div>
                    <i class="fa fa-star-o rating-star"></i>
                    <span class="rating-number">4.8</span>
                  </div>
                  <span class="buy">BUY +</span>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="card voutchers">
                <div class="voutcher-divider">
                  <div class="voutcher-left text-center">
                    <span class="voutcher-name">Monday Happy</span>
                    <h5 class="voutcher-code">#MONHPY</h5>
                  </div>
                  <div class="voutcher-right text-center border-left">
                    <h5 class="discount-percent">20%</h5>
                    <span class="off">Off</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="image-container">
                <div class="first">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="discount">-25%</span>
                    <span class="wishlist"><i class="fa fa-heart-o"></i></span>
                  </div>
                </div>
                <img src="https://i.imgur.com/PtepOpe.jpg" class="img-fluid rounded thumbnail-image">
              </div>
              <div class="product-detail-container p-2">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="dress-name">Long sleeve denim jacket</h5>
                  <div class="d-flex flex-column mb-2">
                    <span class="new-price">$3.99</span>
                    <small class="old-price text-right">$5.99</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-1">
                  <div class="color-select d-flex ">
                    <input type="button" name="grey" class="btn creme">
                    <input type="button" name="darkblue" class="btn darkblue ml-2">
                  </div>
                  <div class="d-flex ">
                    <span class="item-size mr-2 btn" type="button">S</span>
                    <span class="item-size mr-2 btn" type="button">M</span>
                    <span class="item-size btn" type="button">L</span>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-1">
                  <div>
                    <i class="fa fa-star-o rating-star"></i>
                    <span class="rating-number">4.8</span>
                  </div>
                  <span class="buy">BUY +</span>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="card voutchers">
                <div class="voutcher-divider">
                  <div class="voutcher-left text-center">
                    <span class="voutcher-name">Payday Surprise</span>
                    <h5 class="voutcher-code">#SRPSPYDY</h5>
                  </div>
                  <div class="voutcher-right text-center border-left">
                    <h5 class="discount-percent">20%</h5>
                    <span class="off">Off</span></div>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="image-container">
                <div class="first">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="discount">-25%</span>
                    <span class="wishlist"><i class="fa fa-heart-o"></i></span>
                  </div>
                </div>
                <img src="https://i.imgur.com/ePJKs8Q.jpg" class="img-fluid rounded thumbnail-image">
              </div>
              <div class="product-detail-container p-2">
                <div class="d-flex justify-content-between ">
                  <h5 class="dress-name">Hush Puppies</h5>
                  <div class="d-flex flex-column mb-2">
                    <span class="new-price">$3.99</span>
                    <small class="old-price text-right">$5.99</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-1">
                  <div class="color-select d-flex ">
                    <input type="button" name="grey" class="btn creme">
                    <input type="button" name="yellow" class="btn yellow ml-2">
                    <input type="button" name="blue" class="btn blue ml-2">
                  </div>
                  <div class="d-flex ">
                    <span class="item-size mr-2 btn" type="button">S</span>
                    <span class="item-size mr-2 btn" type="button">M</span>
                    <span class="item-size btn" type="button">L</span>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-1">
                  <div>
                    <i class="fa fa-star-o rating-star"></i>
                    <span class="rating-number">4.2</span>
                  </div>
                  <span class="buy">BUY +</span>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="card voutchers">
                <div class="voutcher-divider">
                  <div class="voutcher-left text-center">
                    <span class="voutcher-name">First order</span>
                    <h5 class="voutcher-code">#HPYFRST</h5>
                  </div>
                  <div class="voutcher-right text-center border-left">
                    <h5 class="discount-percent">20%</h5>
                    <span class="off">Off</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="image-container">
                <div class="first">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="discount">-25%</span>
                    <span class="wishlist"><i class="fa fa-heart-o"></i></span>
                  </div>
                </div>
                <img src="https://i.imgur.com/snffLH3.jpg" class="img-fluid rounded thumbnail-image">
              </div>
              <div class="product-detail-container p-2">
                <div class="d-flex justify-content-between ">
                  <h5 class="dress-name">Athens skirt </h5>
                  <div class="d-flex flex-column mb-2">
                    <span class="new-price">$3.99</span>
                    <small class="old-price text-right">$5.99</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-1">
                  <div class="color-select d-flex ">
                    <input type="button" name="grey" class="btn creme">
                    <input type="button" name="red" class="btn red ml-2">
                    <input type="button" name="blue" class="btn blue ml-2">
                  </div>
                  <div class="d-flex ">
                    <span class="item-size mr-2 btn" type="button">S</span>
                    <span class="item-size mr-2 btn" type="button">M</span>
                    <span class="item-size btn" type="button">L</span>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-1">
                  <div>
                    <i class="fa fa-star-o rating-star"></i>
                    <span class="rating-number">3.8</span>
                  </div>
                  <span class="buy">BUY +</span>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="card voutchers">
                <div class="voutcher-divider">
                  <div class="voutcher-left text-center">
                    <span class="voutcher-name">Vegetarian Food</span>
                    <h5 class="voutcher-code">#VEGANLOVE</h5>
                  </div>
                  <div class="voutcher-right text-center border-left">
                    <h5 class="discount-percent">20%</h5>
                    <span class="off">Off</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
{{--    @endsection--}}
  </body>
</html>
