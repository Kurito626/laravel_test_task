<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сокращаем ссылки!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
</head>
<body class="text-center bg-light">
<div class="container py-5">
    <h1 class="mb-4">Короткие ссылки</h1>

    <form class="mt-5 mb-3" action="{{ route('links.createLink') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-auto">
                <label for="inputLink" class="col-form-label">Введите ссылку:</label>
            </div>
            <div class="col-auto">
                <input required
                       placeholder="https://"
                       type="url"
                       name="link"
                       id="inputLink"
                       class="form-control mb-1"
                       aria-describedby="inputLink">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary">Сократить!</button>
            </div>
        </div>
    </form>

    @if(session('shortLink'))
        <div class="alert alert-success mt-4">
            Ваша короткая ссылка:
            <a href="{{ session('shortLink') }}" target="_blank">
                {{ session('shortLink') }}
            </a>
        </div>
    @endif
</div>
</body>
</html>
