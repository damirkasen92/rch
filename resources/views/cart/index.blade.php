@extends('layouts.app')

@section('content')
    @auth
        <button class="previos-orders-btn">История заказов</button>
        <div class="previos-orders">
            <button class="close-previos-orders">&#10006;</button>
            <div class="previos-orders-header">
                <h2 class="previos-orders-title">История заказов</h2>
            </div>
            <div class="previos-orders-items">
                <span class="previos-orders-empty">Вы еще не делали заказы</span>
            </div>
            <button class="load-more-btn">Загрузить еще</button>
        </div>
    @endauth

    <div class="container">
        <a class="back" href="{{ url('/') }}">&larr;</a>

        <header class="cart-header">
            <h2 class="header-title">Корзина</h2>
        </header>

        @include('parts.alerts')

        @if ($cart)

            <span class="cart-empty">Ваша корзина пуста</span>

            <table class="cart-items">
                <tbody>
                    @foreach ($cart as $cartItem)
                        <tr class="cart-item" data-id="{{ $cartItem->id }}">
                            <td class="cart-item-wrap-img">
                                <img class="cart-item-img" src="{{ $cartItem->image }}" alt="{{ $cartItem->title }}">
                            </td>
                            <td class="cart-item-title">{{ $cartItem->title }}</td>
                            <td>
                                <div class="cart-item-info-buttons flex">
                                    <button type="button" class="cart-item-info-btn minus">-</button>
                                    <span class="cart-item-info-count">{{ $cartItem->count }}</span>
                                    <button type="button" class="cart-item-info-btn plus">+</button>
                                </div>
                            </td>
                            <td class="cart-item-management">
                                <span class="cart-item-price">Цена: {{ $cartItem->price }}</span>
                                <span class="cart-item-info-total-price">{{ $cartItem->price * $cartItem->count }}</span>
                                <span class="cart-item-delete" data-id="{{ $cartItem->id }}">&#10006;</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="cart-total-price">
                <span class="delivery-price"></span>

                <span class="cart-total-text">Итого к оплате:</span>
                <span class="cart-total-cur"> 
                    <span class="cart-total-num">0</span> ТГ.
                </span>    
            </div>
            <form class="cart-form" method="POST" action="{{ route('cart.store') }}">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" class="field name required @error('name') warning @enderror"
                        placeholder="Ваше имя"
                        value="@auth{{ auth()->user()->name }}@endauth"
                        required
                        @auth readonly @endauth
                    >
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="field email required @error('email') warning @enderror"
                        placeholder="Ваш email"
                        value="@auth{{ auth()->user()->email }}@endauth"
                        required
                        @auth readonly @endauth
                    >
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="field phone required @error('phone') warning @enderror"
                        placeholder="Ваш номер телефона" required>
                </div>
                <div class="form-group cities addresses-wrap">
                    @auth
                        <div class="addresses">
                            <span class="addresses-empty">История адресов пуста</span>
                        </div>
                    @endauth

                    <input type="text" name="city" class="field city required @error('city') warning @enderror"
                        placeholder="Выберите Ваш город"
                        required
                        autocomplete="none"
                    >
                    <ul class="choose-city"></ul>

                </div>
                <div class="form-group">
                    <input type="text" name="street" class="field street required @error('street') warning @enderror"
                        placeholder="Введите улицу"
                        required
                    >
                </div>
                <div class="form-group">
                    <input type="text" name="house" class="field house required @error('house') warning @enderror"
                        placeholder="Введите номер дома"
                        required
                    >
                </div>
                <div class="form-group">
                    <input type="text" name="flat" class="field flat required @error('flat') warning @enderror"
                        placeholder="Введите номер квартиры"
                        required
                    >
                </div>
                {{-- <div class="form-group address-wrap">
                    <textarea name="address" class="area field required @error('address') warning @enderror"
                        placeholder="Адрес доставки" cols="30"
                        rows="10"></textarea>

                    @auth
                        <div class="addresses">
                            <span class="addresses-empty">История адресов пуста</span>
                        </div>
                    @endauth
                </div> --}}
                <div class="hiddens">
                    <input type="hidden" name="address" value="">
                    <input type="hidden" class="cart" name="cart" value="{{ json_encode($cart) }}">
                    <input type="hidden" name="priceWithoutDelivery" value="0">
                    <input type="hidden" name="totalPrice" class="totalPrice" value="0">
                    <input type="hidden" name="field[3]" data-order value="">
                    <input type="hidden" name="field[1]" data-address value="">
                    <input type="hidden" name="u" value="1" />
                    <input type="hidden" name="f" value="1" />
                    <input type="hidden" name="s" />
                    <input type="hidden" name="c" value="0" />
                    <input type="hidden" name="m" value="0" />
                    <input type="hidden" name="act" value="sub" />
                    <input type="hidden" name="v" value="2" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn form-btn">Заказать</button>
                </div>
            </form>
        @else
            <span class="cart-empty">Ваша корзина пуста</span>
        @endif
    </div>
@endsection
