@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Номер</th>
                    <th>Товары</th>
                    <th>Адрес</th>
                    <th>Стоимость</th>
                    <th>Статус оплаты</th>
                    <th>Дата заказа</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>
                            @foreach ($order->items as $item)
                                <ul>
                                    <li>Id товара: {{ $item->id }}</li>
                                    <li>Наименование: <br>
                                        {{ $item->title }}
                                    </li>
                                    <li>Количество: {{ $item->count }}</li>
                                    <li>Цена: <br>
                                        {{ $item->price }}
                                    </li>
                                </ul>
                            @endforeach
                        </td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->payment_status ? 'Оплачен' : 'Не оплачен' }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
@endsection
