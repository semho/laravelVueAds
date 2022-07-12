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

      </div>
{{--    @endsection--}}
  </body>
</html>
