$(document).ready(function () {
    if ($.cookie('cartId') == null) {
        $.cookie('cartId', uuidv4(), {path: '/', expires: 7});
    }

    $('.nav-menu-item a, .footer-menu-item a').on('click', function (event) {
        event.preventDefault();

        let href = $(this).attr('href');

        if (window.location.pathname.includes('user')) {
            window.open(href);
            return false;
        }

        let top = $(href).offset().top;

        $('html, body').animate({
            scrollTop: top
        }, 1000);
    });

    $(document).on('scroll', function () {
        if ($(this).scrollTop() > 200) {
            $('.nav-cart').css({
                'position': 'fixed',
                'right': '10%',
                'top': '20px'
            });
        } else {
            $('.nav-cart').css({
                'position': 'relative',
                'right': 'unset',
                'top': 'unset'
            });
        }
    });

    let options = {
        onKeyPress: function (cep, e, field, options) {
            if (cep.length === 4) {
                if (cep[3] == 8) {
                    field.val(cep.slice(0, 3));
                }
            }
        }
    };

    $('.phone').mask('+7(000)-000-00-00', options);

    function getAdresses() {
        if ($('meta[name="auth"]').attr('content') === 'false') return false;

        let html = ``;

        $.ajax({
            type: 'GET',
            url: `/user/get/addresses?page=1`,
            dataType: 'json',
            success: function(res) {
                let data = res.data;

                if (data.length === 0) {
                    return false;
                }

                data.forEach(el => {
                    let splitAddress = el.address.split(', ');

                    html += `
                        <span class="address-item"
                            data-city="${splitAddress[0].replace(/(^г\.\s)/, '')}"
                            data-street="${splitAddress[1].replace(/(^улица\:\s)/, '')}"
                            data-house="${splitAddress[2].replace(/(^дом\:\s)/, '')}"
                            data-flat="${splitAddress[3].replace(/(^квартира\:\s)/, '')}"
                        >
                            ${el.address}
                        </span>
                    `;
                });

                $('.addresses-empty').css({'display': 'none'});
                $('.addresses').append(html);
                $('.address-item').on('click', function() {
                    let city = $(this).data('city'),
                        street = $(this).data('street'),
                        house = $(this).data('house'),
                        flat = $(this).data('flat');

                    $('input[name="city"]').val(city);
                    $('input[name="street"]').val(street);
                    $('input[name="house"]').val(house);
                    $('input[name="flat"]').val(flat);
                    getTotalPrice();
                    checkForm($('.cart-form').get(0));
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    getAdresses();

    let arrayOfCities = String.prototype.split.call('Абай,Акколь,Аксай,Аксу,Актау,Актобе,Алга,Алматы,Арал,Аркалык,Арыс,Нур-Султан,Атбасар,Атырау,Аягоз,Байконыр,Балхаш,Булаево,Державинск,Ерейментау,Есик,Есиль,Жанаозен,Жанатас,Жаркент,Жезказган,Жем,Жетысай,Житикара,Зайсан,Зыряновск,Казалинск,Кандыагаш,Капшагай,Караганды,Каражал,Каратау,Каркаралинск,Каскелен,Кентау,Кокшетау,Костанай,Кулсары,Курчатов,Кызылорда,Ленгер,Лисаковск,Макинск,Мамлютка,Павлодар,Петропавловск,Приозёрск,Риддер,Рудный,Сарань,Сарканд,Сарыагаш,Сатпаев,Семей,Сергеевка,Серебрянск,Степногорск,Степняк,Тайынша,Талгар,Талдыкорган,Тараз,Текели,Темир,Темиртау,Тобыл,Туркестан,Уральск,Усть-Каменогорск,Ушарал,Уштобе,Форт-Шевченко,Хромтау,Шардара,Шалкар,Шар,Шахтинск,Шемонаиха,Шу,Шымкент,Щучинск,Экибастуз,Эмба', ',');

    $('input[name="city"]')
    .on('click', function () {
        let value = $(this).val() ? $(this).val() : null;
        renderCities(value, arrayOfCities);
        let heightOfAdresses = $('.addresses').outerHeight() + 20;
        $('.addresses').css({'top': '-' + heightOfAdresses + 'px'})
        $('.addresses').fadeIn(400);
    })
    .on('input', function () {
        let value = $(this).val() ? $(this).val() : null;
        renderCities(value, arrayOfCities);
        $('.addresses').fadeOut(400);
    })
    .on('blur', function () {
        setTimeout(() => {
            $('.choose-city').fadeOut(400);
        }, 100);
        $('.addresses').fadeOut(400);
    });

    function renderCities(value, arrayOfCities) {
        if (value == null) {
            value = '';
        }

        let regex = new RegExp('^' + value.toLowerCase());
        let resultOfCities = arrayOfCities.filter(city => {
            let lower = city.toLowerCase();
            return lower.match(regex);
        });

        if (resultOfCities.length === 0) {
            $('.choose-city').css({ 'display': 'none' });

            return false;
        }

        let html = '';

        resultOfCities.forEach(el => {
            html += `<li class=choose-city-item>${el}</li>`;
        });

        $('.choose-city').html(html).css({ 'display': 'block' });
        $('.choose-city-item').on('click', (event) => {
            let text = $(event.target).text();
            $('input[name="city"]').val(text);
            $('.choose-city').css({ 'display': 'none' });
            getTotalPrice();
            checkForm($('.cart-form').get(0));
        });
    }

    let page = 1;

    function generateOrders(data) {
        let html = ``,
            token = $('meta[name="csrf-token"]').attr('content');

        $.each(data, function (idx) {
            let item = JSON.parse(data[idx].items),
                itemHtml = `<div class="previos-orders-item">`;

            $.each(item, function (i) {
                itemHtml += `
                    <div class="previos-orders-content">
                        <span class="previos-orders-title">${item[i].title}</span>
                        <span class="previos-orders-count">Количество: ${item[i].count}</span>
                        <img class="previos-orders-image" src="${item[i].image}" alt="${item[i].title}">
                    </div>
                `;
            });

            itemHtml += `
                    <button class="repeat-previos-order-btn" onclick="event.preventDefault(); $(this).next().submit(); return false;">Повторить заказ</button>
                    <form class="repeat-order-form" method="POST" action="/user/set/cart" style="display: none;">
                        <input type="hidden" value="${token}" name="_token">
                        <input type="hidden" value="${data[idx].id}" name="orderId">
                    </form>
                </div>
            `;
            html += itemHtml;
        });

        return html;
    }

    function getOrders() {
        if ($('meta[name="auth"]').attr('content') === 'false') return false;

        $.ajax({
            type: 'GET',
            url: `/user/get/orders?page=${page}`,
            dataType: 'json',
            success: function (res) {
                if (res.data.length === 0) {
                    $('.load-more-btn').css({ 'display': 'none' });
                    return false;
                }

                $('.previos-orders-empty').css({ 'display': 'none' });
                $('.previos-orders-items').append(generateOrders(res.data));

                if (page === res.last_page) {
                    $('.load-more-btn').css({ 'display': 'none' });

                    return false;
                }

                page++;
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    getOrders();

    $('.load-more-btn').on('click', function () {
        getOrders();
    });

    $('.previos-orders-btn, .close-previos-orders').on('click', function () {
        $('.previos-orders').toggleClass('active-orders');
    });

    /* Begin cart */

    async function init() {
        let cart = await getItem();

        renderCart(cart);
        addEventListeners();
        countCartItems(cart);
        getTotalPrice(cart);
    }

    function addEventListeners() {
        let $plusButton = $('.plus'),
            $minusButton = $('.minus'),
            $addToCart = $('.order-item-btn'),
            $cartDeleteBtn = $('.cart-item-delete');

        $plusButton.off('click');
        $minusButton.off('click');
        $addToCart.off('click');
        $cartDeleteBtn.off('click');

        $plusButton.on('click', function () {
            let btn = $(this),
                order = btn.parent('[data-type="order"]').length !== 0;

            changeCountOfProduct(btn.prev(), 'plus', order);
        });

        $minusButton.on('click', function () {
            let btn = $(this),
                order = btn.parent('[data-type="order"]').length !== 0;

            changeCountOfProduct(btn.next(), 'minus', order);
        });

        $addToCart.on('click', function () {
            addToCart(getInfo($(this), 'order'));

            if ($('.cart-alert-item').length >= 3) return false;

            let prepend = $(`
                <span class="cart-alert-item">
                    Товар добавлен в корзину
                </span>
            `);

            $('.cart-alert').prepend(prepend).fadeIn(400);

            prepend
                .delay(2000)
                .slideUp(400);

            setTimeout(function() {
                prepend.remove();
            }, 2500);
        });

        $cartDeleteBtn.on('click', function () {
            let id = $(this).data('id');

            removeItem(id);
        });
    }

    function getInfo(btn, type) {
        let item = btn.parents(`.order-item`),
            id = item.data('id'),
            title = item.find(`.order-item-title`).text(),
            image = item.find(`.order-item-img img`).attr('src'),
            count = +item.find(`.order-item-info-count`).text(),
            price = +item.find(`.order-item-info-price`).data('price');

        return {
            id, title, image, count, price
        }
    }

    function countPriceOfProduct(a, b) {
        return a * b;
    }

    function getTotalPrice(cart) {
        let total = 0;
        let deliveryPrice = $('.delivery-price');
        let priceWithoutDelivery = $('input[name="priceWithoutDelivery"]');

        if (cart == null || cart.length === 0) {
            total = +priceWithoutDelivery.val();
            checkTotalPrice();

            return false;
        }

        cart.forEach(function (el) {
            total += el.count * el.price;
        });

        priceWithoutDelivery.val(total);

        checkTotalPrice();

        function setTotalPrice(sum) {
            $('.cart-total-num').text(total + sum);
            $('.totalPrice').val(total + sum);
        }

        function checkTotalPrice() {
            if (total < 10000) {
                deliveryPrice.html('Доставка по Алматы - 1000тг., <br> по другим регионам - 1500тг.');

                if ($('input[name="city"]').length === 0) return false;

                if ($('input[name="city"]').val().toLowerCase() == 'алматы') {
                    setTotalPrice(1000);
                } else if ($('input[name="city"]').val().toLowerCase() == '') {
                    setTotalPrice(0);
                } else {
                    setTotalPrice(1500);
                }
            } else {
                deliveryPrice.text('Доставка бесплатно');
                setTotalPrice(0);
            }
        }
    }

    function setItem(product) {
        let items = JSON.stringify(product);
        let token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/cart/add',
            type: 'POST',
            data: {
                _token: token,
                items,
            },
            dataType: 'json',
        });

        let cart = $('input[name="cart"]');

        if (cart.length !== 0) {
            cart.val(items);
        }
    }

    async function getItem() {
        let cart = null;

        async function getAjax() {
            let res = await $.ajax({
                url: '/cart/get',
                type: 'GET',
                dataType: 'json',
            });

            return res;
        }

        cart = await getAjax().then(data => data);

        return cart;
    }

    async function removeItem(id) {
        let cart = await getItem();

        let idx = cart.findIndex(function (el) {
            if (id === el.id) return true;
        });

        cart.splice(idx, 1);
        setItem(cart);
        getTotalPrice(cart);
        $(`.cart-item[data-id="${id}"]`).remove();

        if (cart.length === 0) {
            $('.cart-empty').css('display', 'block');
            $('.cart-total-price, .cart-items, .cart-form').css('display', 'none');
        }
    }

    function countCartItems(cart) {
        let total = 0;

        if (cart != null || cart.length !== 0) {
            cart.forEach(function (el) {
                total += el.count;
            });
        }

        $('.nav-cart-count').text(total);
    }

    function renderCart(cart) {
        if (cart == null || cart.length === 0) {
            $('.cart-empty').css('display', 'block');
            return false;
        }

        let $cart = $('.cart-items');
        $('.cart-empty').css('display', 'none');

        cart.forEach(function (el) {
            let $item = $($cart.find(`[data-id=${el.id}]`));

            $item.find('.cart-item-info-count').text(el.count);
            $item.find('.cart-item-info-total-price').text(`${el.price} * ${el.count} = ${countPriceOfProduct(el.price, el.count)} ТГ.`);
        });

        addEventListeners();
    }

    async function addToCart(item) {
        let cart = await getItem();
        let id = item.id,
            title = item.title,
            image = item.image,
            count = +item.count,
            price = +item.price;

        if (cart.length > 0) {
            let same = cart.findIndex(function (el) {
                if (id === el.id) {
                    return true;
                }
            });

            if (same === (-1)) {
                cart.push({ id, title, image, count, price });
                setItem(cart);
            } else {
                cart[same].count = cart[same].count + count;
                setItem(cart);
            }

        } else {
            cart.push({ id, title, image, count, price });
            setItem(cart);
        }

        renderCart(cart);
        countCartItems(cart);
        getTotalPrice(cart);
    }

    async function changeCountOfProduct(count, action, order) {
        let value = +count.text();

        switch (action) {
            case 'plus':
                count.text(++value);
                break;
            case 'minus':
                if (value > 1) count.text(--value);
                break;
            default:
                count.text(value);
                break;
        }

        let $priceTotal = count.parents('.order-item').find('[data-price]'),
            totalValue = countPriceOfProduct(value, +$priceTotal.data('price'));

        $priceTotal.text(`${totalValue} ТГ.`);

        if (!order) {
            let cart = await getItem(),
                id = count.parents('.cart-item').data('id');

            let idx = cart.findIndex(function (el) {
                if (el.id === id) {
                    return true;
                }
            });

            cart[idx].count = +count.text();

            setItem(cart);
            getTotalPrice(cart);
            renderCart(cart);
        }
    }

    init();

    /* End cart */

    window._load_script = function (url, callback) {
        let head = document.querySelector('head'),
            script = document.createElement('script'),
            r = false;

        script.type = 'text/javascript';
        script.charset = 'utf-8';
        script.src = url;

        if (callback) {
            script.onload = script.onreadystatechange = function () {
                if (!r && (!this.readyState || this.readyState == 'complete')) {
                    r = true;
                    callback();
                }
            };
        }

        head.appendChild(script);
    };

    window._show_thank_you = function (id, message, trackcmp_url, email) {
        const vgoAlias = typeof visitorGlobalObjectAlias === 'undefined' ? 'vgo' : visitorGlobalObjectAlias;
        let visitorObject = window[vgoAlias];

        if (email && typeof visitorObject !== 'undefined') {
            visitorObject('setEmail', email);
            visitorObject('update');
        } else if (typeof (trackcmp_url) != 'undefined' && trackcmp_url) {
            // Site tracking URL to use after inline form submission.
            _load_script(trackcmp_url);
        }

        if (typeof window._form_callback !== 'undefined') window._form_callback(id);
    };

    $('.form-btn').click(function () {
        let formname = $(this).attr('data-formname');

        if (formname) {
            $('input.formname').attr('value', formname);
        }

        $(this).parents('.form').submit();
    });

    if (window.location.pathname === '/register') {
        $('.page-form form').on('submit', function () {
            let data = null;
            let $form = $(this);
            let answer = checkForm($form.get(0));

            if (answer != false) {
                $form.find('.btn').attr('disabled', 'disabled').text('Отправляется...');

                let name = $('input[name="name"]', $form).val(),
                    email = $('input[name="email"]', $form).val();

                data = $form.serialize();

                $.ajax({
                    url: 'https://nurdanatd1616670539.activehosted.com/proc.php?' + data + `&jsonp=true&fullname=${name}`,
                    type: 'GET',
                    dataType: 'jsonp',
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        });
    }

    $('.cart-form').submit(function () {
        let data = null;
        let $form = $(this);
        let answer = checkForm($form.get(0));

        if (answer != false) {
            $form.find('.btn').attr('disabled', 'disabled').text('Отправляется...');

            let name = $('input[name="name"]', $form).val();
            let order = JSON.parse($('input[name="cart"]').val());
            let sendingOrderToCrm = $('input[data-order]');
            let orderToString = '';
            let address = $('input[name="address"]');
            let addressToCrm = $('input[data-address]');
            let city = $('input[name="city"]').val(),
                street = $('input[name="street"]').val(),
                house = $('input[name="house"]').val(),
                flat = $('input[name="flat"]').val();

            order.forEach(el => {
                orderToString += `${el.title}: ${el.count}, \n`;
            });

            sendingOrderToCrm.val(orderToString);
            address.val(`г. ${city}, улица: ${street}, дом: ${house}, квартира: ${flat}`);
            addressToCrm.val(address.val());
            data = $form.serialize();

            $.ajax({
                url: 'https://nurdanatd1616670539.activehosted.com/proc.php?' + data + '&jsonp=true&fullname=' + name,
                type: 'GET',
                dataType: 'jsonp',
                success: function (data) {
                    console.log(data);

                    gtag('event', 'leadevent', { 'event_category': 'knopka', 'event_action': 'lead', });
                },
                error: function (data) {
                    console.log(data);
                }
            });

            // $.cookie('cart', JSON.stringify([]), { path: '/', expires: 7 });
        }
    });

    $('.form').submit(function (event) {
        event.preventDefault();

        let $form = $(this);
        let id = $form.parents('.modal').attr('id');
        let answer = checkForm($form.get(0));
        if (answer != false) {

            let baseText = $form.find('.btn').text();
            $form.find('.btn').attr('disabled', 'disabled').text('Отправляется...');

            let name = $('input[name="name"]', $form).val(),
                phone = $('input[name="phone"]', $form).val(),
                email = $('input[name="email"]', $form).val();
            let source = $('input[name="source"]').val();
            let medium = $('input[name="medium"]').val();
            let campaign = $('input[name="campaign"]').val();
            let content = $('input[name="content"]').val();
            let term = $('input[name="term"]').val();
            let ref = $('input[name="referer"]').val();
            let formname = $('input[name="formname"]').val();
            let lang_script = $('input[name="lang_script"]').val();
            let user_agent = $('input[name="user_agent"]').val();
            let user_ip = $('input[name="user_ip"]').val();
            let data = 'source=' + source + '&medium=' + medium + '&campaign=' + campaign + '&content=' + content + '&term=' + term + '&' + '&formname=' + formname + '&ref=' + ref + '&user_agent=' + user_agent + '&user_ip=' + user_ip;
            data += '&' + $form.serialize();

            let lang_str = (lang_script === 'ru') ? 'Reach Nature РУС' : 'Reach Nature КАЗ';

            _load_script('https://nurdanatd1616670539.activehosted.com/proc.php?' + data + '&jsonp=true&fullname=' + name);

            openModal('#modal-success');

            // $.ajax({
            //     type: 'POST',
            //     url: url,
            //     dataType: 'json',
            //     data: data,
            //     success: function(data){
            //         console.log(data);
            //     },
            //     error: function(data){
            //         console.log(data);
            //     }
            // }).always(function() {
            //     $form.find('.btn').removeAttr('disabled', 'disabled').text(baseText);
            //     //gtag('event', 'leadevent', { 'event_category': 'knopka', 'event_action': 'lead', });
            //     //ym(72150991,'reachGoal','zayavka');
            //     openModal('#modal-success');
            // });
        }
    });

    $('.field').on('input', function () {
        checkInput($(this));
    });

    function openModal(id) {
        $.fancybox.close();
        $.fancybox.open({
            src: id,
            type: 'inline',
            touch: false
        });
        $('input[type="text"]').each(function () {
            $(this).val('');
        });
        $('input[type="tel"]').each(function () {
            $(this).val('');
        });
        $('textarea').val('');
    }

    function formname(name) {
        $('.formname').attr("value", name);
        console.log("formname = " + name);
    }

    function checkForm(form) {
        let $form = $(form),
            $formFields = $form.find('.field').toArray(),
            checker = true;

        $formFields.forEach(function (el) {
            let current = $(el);
            let valid = checkInput(current);

            checker = checker && valid;
        });

        return checker;
    }

    function checkInput(input) {
        let inputValue = input.val(),
            valid = true;

        if (!input.hasClass('required')) {
            return valid;
        }

        if (inputValue.length === 0) {
            valid = false;
        }

        if (input.hasClass('phone')) {
            if (!/^\+?([0-9]{1})\)?[(]?([0-9]{3})?[)]?[-. ]?([0-9]{3})[-. ]?([0-9]{2})[-. ]?([0-9]{2,3})$/.test(inputValue)) {
                valid = false;
            }
        }

        if (input.hasClass('email')) {
            if (!/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/.test(inputValue)) {
                valid = false;
            }
        }

        if (valid) {
            if (input.hasClass('warning')) {
                input.removeClass('warning');
            }
        } else {
            if (!input.hasClass('warning')) {
                input.addClass('warning');
            }
        }

        return valid;
    }

    $('[data-fancybox]').fancybox({
        buttons: [
            'zoom',
            'fullScreen',
            'download',
            'close'
        ],
        arrows: false,
        infobar: false,
        touch: false,
        autoFocus: false,
    });

    $('.reviews-slider').owlCarousel({
        loop: true,
        margin: 160,
        nav: true,
        navText: ['<img class="owl-arrow-prev" src="images/reviews/left.png">', '<img class="owl-arrow-next" src="images/reviews/right.png">'],
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            1200: {
                items: 2
            }
        }
    });

    $('.notes-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        navText: ['<img class="owl-arrow-prev" src="images/reviews/left.png">', '<img class="owl-arrow-next" src="images/reviews/right.png">'],
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            970: {
                items: 1
            },
            1200: {
                items: 2
            }
        }
    })
});
