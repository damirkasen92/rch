<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
        }

        p {
            margin: auto;
            font-family: sans-serif;
            font-size: 30px;
            color: #000;
            text-align: center;
        }

        a {
            color: #2e71ff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p>
        Перейдите по ссылке для того чтобы сбросить пароль:
        <a href="{{ $url }}">Ссылка для сброса пароля</a>
    </p>
</body>
</html>
