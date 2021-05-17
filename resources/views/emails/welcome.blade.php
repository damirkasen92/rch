<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <style>
        body {
            padding: 40px;
        }

        h1,
        h2 {
            margin: auto;
            font-family: sans-serif;
            font-size: 30px;
            color: #000;
            text-align: center;
        }

        h2 {
            margin-top: 20px;
            font-size: 20px;
        }

        ul {
            margin-top: 40px auto;
            font-family: sans-serif;
            font-size: 20px;
            color: #000;
            list-style: none;
        }
    </style>
</head>
<body>
    <h1>Добро пожаловать {{ $data['name'] }}</h1>
    <h2>Для вас был создан личный кабинет</h2>
    <ul>
        <li>Ваш логин: {{ $data['email'] }}</li>
        <li>Ваш пароль: {{ $data['password'] }}</li>
    </ul>
</body>
</html>
