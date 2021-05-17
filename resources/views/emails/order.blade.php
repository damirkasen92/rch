<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">

    <style>
        * {
            font-family: sans-serif;
        }

        body {
            padding: 40px 20px;
            padding-right: 20px;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100%;
            width: auto;
            height: 60px;
        }

        h1,
        h2 {
            font-size: 30px;
            text-align: left;
        }

        h2 {
            margin-top: 20px;
            font-size: 20px;
        }

        ul {
            padding: 0;
            font-size: 16px;
            list-style: none;
        }

        li {
            padding: 0;
        }

        p {
            font-size: 16px;
        }

    </style>
</head>
<body>

    <div class="logo">
        <img src="https://rich-nature.kz/images/logo/logo.png" alt="Логотип Rich Nature">
    </div>
    <h1>Здравствуйте {{ $data['name'] }}</h1>
    <h2>Ваш заказ под номером {{ $data['orderId'] }} принят!</h2>

    <p>Ваш адрес: {{ $data['address'] }}</p>

    <p>Ваши товары:</p>
    @foreach (json_decode($data['items']) as $item)
        <ul>
            <li>Наименование - {{ $item->title }}</li>
            <li>Количество - {{ $item->count }}</li>
            <li>Стоимость - {{ $item->count * $item->price }}</li>
        </ul>
    @endforeach

    <p>Итоговая сумма к оплате: {{ $data['totalPrice'] }}</p>

</body>
</html>
