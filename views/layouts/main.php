<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->title ?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
    <header class="py-3">
        <div class="container">
            <div class="text-center">
                <a class="header-logo text-dark" href="/">TaskManager</a>
            </div>

            <nav class="nav d-flex justify-content-center">
                <a class="p-2 text-muted active" href="/">Главная</a>
                <a class="p-2 text-muted" href="/staff">Сотрудники</a>
                <a class="p-2 text-muted" href="#">Задачи</a>
            </nav>
        </div>
    </header>

    <?= $content ?>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/ajax.js"></script>
</body>
</html>
