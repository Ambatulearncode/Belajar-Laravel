<!DOCTYPE html>
<html>
<head>
    <title>Profile {{$nama}}</title>
</head>
<body>
    <h1>Halo, ini halaman profile {{$nama}}!</h1>
    <p>Nama: {{$nama}}</p>
    <p>Email: {{$email}}</p>

    <h3>Hobi:</h3>
    <ul>
        @foreach ($hobi as $h)
            <li>{{$h}}</li>
        @endforeach
    </ul>
</body>
</html>