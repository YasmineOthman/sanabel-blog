<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  </head>

  <body>
  <x-navbar />
  <div class="container">
    @if (Session::get('success'))
    <div class="notification is-primary is-light">
      <button class="delete"></button>
      {{ Session::get('success') }}
    </div>
    @endif

    @if (Session::get('danger'))
    <div class="notification is-danger is-light">
      <button class="delete"></button>
      {{ Session::get('danger') }}
    </div>
    @endif
  </div>

  {{ $slot }}

  <x-footer />
  </body>
</html>
