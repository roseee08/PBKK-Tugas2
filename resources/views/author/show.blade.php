<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Penulis</title>
  <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
    <div class="text-center">
        <h4>DATA PENULIS</h4>
        <br>
        ID: {{ $Author->id }}
        <br>
        Nama Penulis: {{ $Author->name }}
        <br>
        Email: {{ $Author->email }}
        <br>
        Alamat: {{ $Author->address }}
    </div>
</body>
</html>

