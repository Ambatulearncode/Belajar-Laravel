<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Aplikasi Karyawan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">App Karyawan</a>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>