@extends('layouts.app')

@section('content')
    <div class="user container">
        @include('user.nav.nav')

        <table class="user-table">
            <thead>
                <tr>
                    <th>Дата заказа</th>
                    <th>Продукты</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ date('d.m.Y', strtotime($order->created_at)) }}</td>
                        <td colspan="2">
                            <ul>
                                @foreach (json_decode($order->items) as $item)
                                    <li class="flex">
                                        <span>{{ $item->title }}</span>
                                        <span>{{ $item->count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $order->total_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
@endsection
