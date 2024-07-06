@props(['title' => 'Document'])

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>

  <link rel="stylesheet" href="{{ public_path('print.css') }}">
</head>

<body class="">
  <div class="header">
    <div>
      <img src="{{ public_path('untag.png') }}" class="img" alt="Logo Untag" srcset="">
      <div class="title">
        <h1>
          Universitas 17 Agustus 1945
          <br>
          Fakultas Teknik | Teknik Informatika
        </h1>
      </div>
    </div>
  </div>
  {{ $slot }}
</body>

</html>
