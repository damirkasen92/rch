@extends('layouts.app')

@section('content')
    @include('parts.nav')

    @include('parts.alerts')

    <header class="header">
        <div class="container">
            <div class="header-content">
                <ul class="header-list">
                    <li class="header-list-item">Устранить синдром усталости ног</li>
                    <li class="header-list-item">Избавиться от боли и отеков</li>
                    <li class="header-list-item">При сухости и раздражении кожи</li>
                </ul>
                <h1 class="header-title">Rich Nature</h1>
                <h2 class="header-subtitle">Линейка 100% натуральной уходовой косметики</h2>
                <button type="button" class="header-btn" data-fancybox data-src="#modal-call">Заказать</button>
            </div>
        </div>
    </header>

    <section class="product" id="product">
        <div class="container">
            <div class="product-content flex flex-justify-center flex-align-center">
                <div class="product-item">
                    <!-- <img class="product-item-img" src="images/product/product-item.png" alt="Бутыль Rich Nature"> -->
                    <ul class="product-list">
                        <li class="product-list-item">
                            Продукция Rich Nature не содержит в себе химикатов,
                            красителей и консервантов, на 99% состоит из натуральных
                            компонентов.
                        </li>
                        <li class="product-list-item">
                            Большинство растительных компонентов входящих в состав,
                            собраны вручную в окрестностях озера Байкал и острова
                            Ольхон.
                        </li>
                        <li class="product-list-item">
                            Продукты Rich Nature применяются в лечебно-
                            профилактических и в косметических целях.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="indication" id="indication">
        <header class="section-header">
            <h2 class="section-title">
                Показания к применению
            </h2>
        </header>
        <div class="indication-content flex flex-justify-center">
            <div class="indication-item indication-left">
                <div class="indication-wrap-title">
                    <h3 class="indication-title">Согревающий бальзам №33</h3>
                </div>
                <ul class="indication-list flex flex-wrap">
                    <li class="indication-list-item">
                        Простудные заболевания,
                        грипп, бронхит.
                    </li>
                    <li class="indication-list-item">
                        Улучшает состояние мелких
                        кровеносных и
                        лимфатических сосудов.
                    </li>

                    <li class="indication-list-item">
                        Варикозное расширение вен.
                    </li>
                    <li class="indication-list-item">
                        Улучшает кровообращение.
                    </li>

                    <li class="indication-list-item">
                        Уплотнения и боли
                        в мышцах.
                    </li>
                    <li class="indication-list-item">
                        Избавляет от боли в
                        мышцах и суставах.
                    </li>

                    <li class="indication-list-item">
                        Остеохондроз всех отделов
                        позвоночника, заболевания
                        суставов.
                    </li>
                    <li class="indication-list-item">
                        Обезболивает и согревает,
                        оказывает общеукрепляющее
                        воздействие на организм.
                    </li>

                    <li class="indication-list-item">
                        Отложение солей.
                    </li>
                    <li class="indication-list-item">
                        Улучшает работу печени.
                    </li>

                    <li class="indication-list-item">
                        Травмы, ушибы, растяжения.
                    </li>
                    <li class="indication-list-item">
                        Способствует заживлению
                        травм и открытых ран.
                    </li>
                </ul>
            </div>
            <div class="indication-center">
                <img class="indication-img" src="images/indication/hands-new.jpg" alt="Руки держащие продукты Rich Nature">
            </div>
            <div class="indication-item indication-right">
                <div class="indication-wrap-title">
                    <h3 class="indication-title">Легкие ножки</h3>
                </div>
                <ul class="indication-list flex flex-wrap">
                    <li class="indication-list-item">
                        чрезмерная потливость ног,
                        неприятный запах
                    </li>
                    <li class="indication-list-item">
                        уменьшает потоотделение
                        и устраняет неприятный запах
                    </li>

                    <li class="indication-list-item">
                        отечность ног, тяжесть,
                        болевые синдромы
                    </li>
                    <li class="indication-list-item">
                        снимает отек и выводит
                        лишнюю жидкость
                    </li>

                    <li class="indication-list-item">
                        сухая и потрескавшаяся
                        кожа
                    </li>
                    <li class="indication-list-item">
                        приятно охлаждает, питает
                        и смягчает уставшую кожу
                        и мышцы
                    </li>

                    <li class="indication-list-item">
                        атеросклероз сосудов
                    </li>
                    <li class="indication-list-item">
                        улучшает липидный обмен
                    </li>

                    <li class="indication-list-item">
                        варикоз, усталость в ногах,
                        напряжение
                    </li>
                    <li class="indication-list-item">
                        снимает напряжение и
                        тяжесть в ногах
                    </li>

                    <li class="indication-list-item">
                        сухость пяток и стоп
                    </li>
                    <li class="indication-list-item">
                        дает возможность коже 
                        обновиться и полноценно
                        дышать
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="consist" id="consist">
        <div class="container">
            <header class="section-header">
                <h2 class="section-title">Эффективный состав</h2>
            </header>

            <div class="consist-center mob">
                <div class="consist-item">
                    <h4 class="consist-item-title">
                        Согревающий бальзам №33
                    </h4>
                    <img src="images/consist/first.png" alt="Согревающий бальзам">
                </div>
            </div>

            <div class="consist-content flex">
                <div class="consist-left">
                    <div class="consist-item">
                        <img src="images/consist/dyagil.png" alt="Корень дягиля">
                        <h4 class="consist-item-title">Корень дягиля лекарственного</h4>
                        <p class="consist-item-text">
                            Заживляет ушибы, помогает
                            при растяжениях, уплотнениях
                            и болях в мышцах.
                        </p>
                    </div>
                    <div class="consist-item">
                        <img src="images/consist/romashka.png" alt="Ромашка">
                        <h4 class="consist-item-title">33 лекарственных трав</h4>
                        <p class="consist-item-text">
                            Крапива, мята перечная, чабрец, мать-
                            и-мачеха, солодки экстракт, пиона
                            корня экстракт, дуба кора, донник
                            лекарственный, хмель, лапчатка, шалфей
                            лекарственный, ромашка аптечная, бадана
                            экстракт и другие.
                        </p>
                    </div>
                </div>
                <div class="consist-center">
                    <div class="consist-item">
                        <h4 class="consist-item-title">
                            Согревающий бальзам №33
                        </h4>
                        <img src="images/consist/first.png" alt="Согревающий бальзам">
                    </div>
                </div>
                <div class="consist-right">
                    <div class="consist-item">
                        <img src="images/consist/tablets.png" alt="Бутон софоры японской">
                        <h4 class="consist-item-title">Минералы (магний, фосфор, железо, цинк, селен, кремний)</h4>
                        <p class="consist-item-text">
                            Спасают при остеохондрозе, лечат
                            заболевания суставов, снимают
                            травматические боли.
                        </p>
                    </div>
                    <div class="consist-item">
                        <img src="images/consist/anis.png" alt="Бутон софоры японской">
                        <h4 class="consist-item-title">Масла эвкалипта, сибирской пихты, звёздчатого аниса, камфоры</h4>
                        <p class="consist-item-text">
                            Благотворно влияют на состояние
                            мелких кровеносных и лимфатических
                            сосудов.
                        </p>
                    </div>
                </div>
            </div>

            <div class="consist-center second mob">
                <div class="consist-item">
                    <h4 class="consist-item-title">
                        Легкие ножки
                    </h4>
                    <img src="images/consist/second-new.jpg" alt="Легкие ножки">
                </div>
            </div>

            <div class="consist-content-second flex">
                <div class="consist-left">
                    <div class="consist-item">
                        <img src="images/consist/sophora-japonica.png" alt="Бутон софоры японской">
                        <h4 class="consist-item-title">Бутоны софоры японской</h4>
                        <p class="consist-item-text">
                            Снижает вязкость крови, улучшает
                            кровообращение, способствует
                            снижению артериального давления.
                        </p>
                    </div>
                    <div class="consist-item">
                        <img src="images/consist/ginko-biloba.png" alt="Гинкго билоба">
                        <h4 class="consist-item-title">Гинкго билоба</h4>
                        <p class="consist-item-text">
                            Улучшает состояние капиллярного русла
                            сердечной мышцы, головного мозга и
                            других тканей, уменьшает риск тромбоза
                            и воспалительно- дистрофических
                            изменений в сосудистых стенках.
                        </p>
                    </div>
                </div>
                <div class="consist-center">
                    <div class="consist-item">
                        <h4 class="consist-item-title">
                            Легкие ножки
                        </h4>
                        <img src="images/consist/second-new.jpg" alt="Легкие ножки">
                    </div>
                </div>
                <div class="consist-right">
                    <div class="consist-item">
                        <img src="images/consist/amarant.png" alt="Бутон софоры японской">
                        <h4 class="consist-item-title">Масло амаранта</h4>
                        <p class="consist-item-text">
                            Обеспечивает глубокое
                            проникновение питательных
                            веществ в поры кожи.
                        </p>
                    </div>
                    <div class="consist-item">
                        <img src="images/consist/tablets.png" alt="Бутон софоры японской">
                        <h4 class="consist-item-title">Витамины (С, Е, В, РР) и микроэлементы (магний, цинк, марганец,
                            селен, медь, хром)</h4>
                        <p class="consist-item-text">
                            Стабилизируют сердечный ритм,
                            чрезвычайно важны в регуляции
                            нервно-мышечной активности
                            сердца.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="benefits" id="benefits">
        <div class="container">
            <header class="section-header">
                <h2 class="section-title">Преимущества Rich Nature</h2>
            </header>
            <div class="benefits-content">
                <div class="benefits-first flex flex-wrap">
                    <div class="benefits-first-item">
                        <img class="benefits-first-img" src="images/benefits/A4.png" alt="Сертификат">
                        <p class="benefits-first-text">
                            Имеет сертификат «Халяль»
                            и документы, удостоверяющие
                            высокое качество.
                        </p>
                    </div>
                    <div class="benefits-first-item">
                        <img class="benefits-first-img" src="images/benefits/leg.png" alt="Девушка мажет крем на ноги">
                        <p class="benefits-first-text">
                            Благодаря специальной формуле,
                            средства легко впитываются в кожу
                            и усваиваются.
                        </p>
                    </div>
                    <div class="benefits-first-item">
                        <img class="benefits-first-img" src="images/benefits/romashka.png" alt="Ромашки">
                        <p class="benefits-first-text">
                            Продукты на 99% состоят из
                            натуральных компонентов.
                        </p>
                    </div>
                </div>

                <div class="benefits-second flex flex-align-center flex-wrap">
                    <div class="benefits-second-item">
                        <div class="benefits-second-img-wrap">
                            <img class="benefits-second-img" src="images/benefits/biology.png" alt="Состав">
                        </div>
                        <p class="benefits-second-text">
                            Уникальные составы продуктов
                        </p>
                    </div>
                    <div class="benefits-second-item">
                        <div class="benefits-second-img-wrap">
                            <img class="benefits-second-img" src="images/benefits/customer-service.png"
                                alt="Круглосуточное обслуживание">
                        </div>
                        <p class="benefits-second-text">
                            Работаем24/7
                        </p>
                    </div>
                    <div class="benefits-second-item">
                        <div class="benefits-second-img-wrap">
                            <img class="benefits-second-img" src="images/benefits/fast-time.png" alt="Результат">
                        </div>
                        <p class="benefits-second-text">
                            Быстрый результат
                        </p>
                    </div>
                    <div class="benefits-second-item">
                        <div class="benefits-second-img-wrap">
                            <img class="benefits-second-img" src="images/benefits/ecology.png" alt="Натуральный состав">
                        </div>
                        <p class="benefits-second-text">
                            100% натуральный состав
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="order" id="order">
        <div class="container">
            <header class="section-header">
                <h2 class="section-title">Заказать онлайн</h2>
            </header>
            <div class="order-content flex flex-justify-center flex-align-center">
                <div class="order-item" data-id="1" data-action="click">
                    <div class="order-item-img">
                        <img src="images/order/light-legs-new.png" alt="Крем легкие ножки">
                    </div>

                    <h3 class="order-item-title">Легкие ножки</h3>
                    <span class="order-item-spec">150 мл</span>
                    <div class="order-item-info flex">
                        <div class="order-item-info-buttons" data-type="order">
                            <button type="button" class="order-item-info-btn minus">-</button>
                            <span class="order-item-info-count">1</span>
                            <button type="button" class="order-item-info-btn plus">+</button>
                        </div>
                        <span class="order-item-info-price" data-price="5960">5960 ТГ.</span>
                    </div>
                    <button class="order-item-btn" type="button">
                        В корзину
                        <img class="order-item-cart-img" src="images/order/cart.png" alt="Корзина">
                    </button>
                </div>
                <div class="order-item" data-id="2" data-action="click">
                    <div class="order-item-img">
                        <img src="images/order/hot.png" alt="Согревающий бальзам">
                    </div>

                    <h3 class="order-item-title">Согревающий бальзам</h3>
                    <span class="order-item-spec">150 мл</span>
                    <div class="order-item-info flex">
                        <div class="order-item-info-buttons" data-type="order">
                            <button type="button" class="order-item-info-btn minus">-</button>
                            <span class="order-item-info-count">1</span>
                            <button type="button" class="order-item-info-btn plus">+</button>
                        </div>
                        <span class="order-item-info-price" data-price="4890">4890 ТГ.</span>
                    </div>
                    <button class="order-item-btn" type="button">
                        В корзину
                        <img class="order-item-cart-img" src="images/order/cart.png" alt="Корзина">
                    </button>
                </div>
            </div>
            <div class="order-link">
                <a href="/oferta.pdf">Публичная оферта</a>
            </div>
        </div>
    </section>

    {{-- <section class="reviews" id="reviews">
        <div class="container">
            <header class="section-header">
                <h2 class="section-title">Отзывы</h2>
            </header>
            <div class="reviews-slider owl-carousel">

                <div class="reviews-slider-item">
                    <div class="reviews-slider-item-info flex flex-align-center">
                        <div class="reviews-slider-img-wrap">
                            <img class="reviews-slider-img" src="images/reviews/girl.png" alt="аватар">
                        </div>
                        <div class="reviews-slider-item-subinfo">
                            <span class="reviews-slider-item-name">Ирина Кайратовна</span>
                            <img class="reviews-slider-item-stars" src="images/reviews/star.png" alt="4 звезды">
                        </div>
                    </div>
                    <div class="reviews-content">
                        <p class="reviews-content-text">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquipex
                            ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat nonpro
                            ident, sunt in culpa quiofficia deserunt mollit
                            anim id est laborum.
                        </p>
                    </div>
                </div>

                <div class="reviews-slider-item">
                    <div class="reviews-slider-item-info flex flex-align-center">
                        <div class="reviews-slider-img-wrap">
                            <img class="reviews-slider-img" src="images/reviews/no-avatar.png" alt="аватар">
                        </div>
                        <div class="reviews-slider-item-subinfo">
                            <span class="reviews-slider-item-name">Ирина Кайратовна</span>
                            <img class="reviews-slider-item-stars" src="images/reviews/star.png" alt="4 звезды">
                        </div>
                    </div>
                    <div class="reviews-content">
                        <p class="reviews-content-text">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquipex
                            ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat nonpro
                            ident, sunt in culpa quiofficia deserunt mollit
                            anim id est laborum. Ut enim ad minim
                            veniam, quis nostrud.
                        </p>
                    </div>
                </div>

                <div class="reviews-slider-item">
                    <div class="reviews-slider-item-info flex flex-align-center">
                        <div class="reviews-slider-img-wrap">
                            <img class="reviews-slider-img" src="images/reviews/no-avatar.png" alt="аватар">
                        </div>
                        <div class="reviews-slider-item-subinfo">
                            <span class="reviews-slider-item-name">Ирина Кайратовна</span>
                            <img class="reviews-slider-item-stars" src="images/reviews/star.png" alt="4 звезды">
                        </div>
                    </div>
                    <div class="reviews-content">
                        <p class="reviews-content-text">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquipex
                            ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat nonpro
                            ident, sunt in culpa quiofficia deserunt mollit
                            anim id est laborum. Ut enim ad minim
                            veniam, quis nostrud.
                        </p>
                    </div>
                </div>

                <div class="reviews-slider-item">
                    <div class="reviews-slider-item-info flex flex-align-center">
                        <div class="reviews-slider-img-wrap">
                            <img class="reviews-slider-img" src="images/reviews/no-avatar.png" alt="аватар">
                        </div>
                        <div class="reviews-slider-item-subinfo">
                            <span class="reviews-slider-item-name">Ирина Кайратовна</span>
                            <img class="reviews-slider-item-stars" src="images/reviews/star.png" alt="4 звезды">
                        </div>
                    </div>
                    <div class="reviews-content">
                        <p class="reviews-content-text">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquipex
                            ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat nonpro
                            ident, sunt in culpa quiofficia deserunt mollit
                            anim id est laborum. Ut enim ad minim
                            veniam, quis nostrud.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    <section class="notes" id="notes">
        <div class="container">
            <header class="section-header">
                <h2 class="section-title">Сертификаты</h2>
            </header>
            <div class="notes-slider owl-carousel">
                <div class="notes-slider-item">
                    <a href="images/notes/note-1.png" class="notes-img" data-fancybox="gallery">
                        <img class="notes-slider-item-img" src="images/notes/note-1.png" alt="Сертификат">
                    </a>
                </div>
                <div class="notes-slider-item">
                    <a href="images/notes/note-2.png" class="notes-img" data-fancybox="gallery">
                        <img class="notes-slider-item-img" src="images/notes/note-2.png" alt="Сертификат">
                    </a>
                </div>
                <!-- <div class="notes-slider-item">
              <img class="notes-slider-item-img" src="images/notes/note1.png" alt="Сертификат">
            </div>
            <div class="notes-slider-item">
              <img class="notes-slider-item-img" src="images/notes/note1.png" alt="Сертификат">
            </div>   -->
            </div>
        </div>
    </section>

    <section class="contacts" id="contacts">
        <div class="container">
            <header class="section-header">
                <h2 class="section-title">Наши контакты</h2>
            </header>
            <div class="contacts-content">
                <span class="contacts-item contacts-title">Адрес</span>
                <span class="contacts-item contacts-subtitle">г. Алматы</span>
                <span class="contacts-item contacts-subtitle">ул. Сатпаева, 29д</span>
                <span class="contacts-item contacts-title">График работы</span>
                <span class="contacts-item contacts-subtitle">Пн-Вс 10:00 - 19:00</span>
                <span class="contacts-item contacts-title">Телефон</span>
                <span class="contacts-item contacts-number">+7 (707) 313-39-29</span>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2055.697826870073!2d76.90683210811662!3d43.22635541951905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x388368d7a5e13bc3%3A0xf9fe630b0cc5da3d!2z0YPQu9C40YbQsCDQotC40LzQuNGA0Y_Qt9C10LLQsCA2OSwg0JDQu9C80LDRgtGL!5e0!3m2!1sru!2skz!4v1517547069324"
                width="100%" height="695px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
    </section>

    <footer class="footer">
        <div class="container flex flex-justify-center flex-align-center flex-wrap">
            <div class="footer-logo flex">
                <img class="logo" src="images/logo/logo.png" alt="Rich Nature Логотип">
                <div class="socials">
                    <ul class="socials-list flex">
                        <li class="socials-list-item whatsapp">
                            <a href="https://api.whatsapp.com/send?phone=77073133929" target="_blank" 
                                onclick="gtag('event', 'leadevent', { 'event_category': 'button', 'event_action': 'clickWhatsapp', });"
                            >
                            </a>
                        </li>
                        {{-- <li class="socials-list-item youtube">

                        </li> --}}
                        <li class="socials-list-item instagram">
                            <a href="https://www.instagram.com/richnature.kz" target="_blank"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-menu">
                <ul class="footer-menu-list flex flex-wrap">
                    <li class="footer-menu-item"><a href="#contacts">О нас</a></li>
                    <li class="footer-menu-item"><a href="#order">Ассортимент</a></li>
                    <li class="footer-menu-item"><a href="#benefits">Преимущества</a></li>
                    <li class="footer-menu-item"><a href="#order">Заказать</a></li>
                    <li class="footer-menu-item"><a href="#reviews">Отзывы</a></li>
                </ul>
            </div>
            <div class="footer-info flex">
                <a class="footer-number" href="tel:77073133929">+7 (707) 313-39-29</a>
                <button class="footer-btn" data-fancybox data-src="#modal-call">Заказать звонок</button>
            </div>
    </footer>

    <div class="whatsapp-btn">
        <div class="whatsapp-wrap">
            <a class="flex flex-justify-center flex-align-center" href="https://api.whatsapp.com/send?phone=77073133929" onclick="gtag('event', 'leadevent', { 'event_category': 'button', 'event_action': 'clickWhatsapp', });">
                <img class="whatsapp-image" src="images/whatsapp-logo.svg" alt="whatsapp">
                <span class="whatsapp-text">Консультация в WhatsApp</span>
            </a>
        </div>
    </div>

    <div class="cart-alert"></div>

    <!-- Modals -->
    <div id="modal-call" class="modal">
        <div class="modal-title">
            <h3>Закажите бесплатную консультацию</h3>
            <span>Ответ в течение 15 минут</span>
        </div>
        <div class="modal-form">
            <form class="form">
                @csrf
                <div class="form-group">
                    <input class="field name required" name="name" type="text"
                        placeholder="Ваше имя" required>
                </div>
                <div class="form-group">
                    <input class="field phone required" name="phone" type="tel"
                        placeholder="Ваш телефон" required>
                </div>
                <div class="form-group">
                    <input class="field email required" type="email" name="email"
                        placeholder="Ваш email" required>
                </div>
                <div class="form-group">
                    <button type="button" class="btn form-btn">Заказать</button>
                </div>
                <div class="form-group">
                    <a href="/oferta.pdf" class="modal-link">Публичная оферта</a>
                </div>

                <div class="hiddens">
                    <input type="hidden" name="u" value="1" />
                    <input type="hidden" name="f" value="1" />
                    <input type="hidden" name="s" />
                    <input type="hidden" name="c" value="0" />
                    <input type="hidden" name="m" value="0" />
                    <input type="hidden" name="act" value="sub" />
                    <input type="hidden" name="v" value="2" />
                </div>
            </form>
        </div>
    </div>

    <div id="modal-cart" class="modal">
        <div class="modal-title">
            <h3>Корзина</h3>
        </div>
        <div class="modal-form">
            <form class="form">
                @csrf
                <div class="form-group cart">
                    <span class="cart-items-title">Ваши товары</span>
                    <div class="cart-items grid">
                        <span class="cart-empty">Ваша корзина пуста</span>
                    </div>
                    <div class="cart-total-price">
                        <span class="cart-total-text">Итого к оплате: </span>
                        <span class="cart-total-num">0</span>
                    </div>
                </div>
                <div class="form-group">
                    <input class="field name required" name="name" type="text"
                        placeholder="Ваше имя" required>
                </div>
                <div class="form-group">
                    <input class="field phone required" name="phone" type="tel"
                        placeholder="Ваш телефон" required>
                </div>
                <div class="form-group">
                    <input class="field email required" type="email" name="email"
                        placeholder="Ваш email" required>
                </div>
                <div class="form-group">
                    <button type="button" class="btn form-btn">Заказать</button>
                </div>
                <div class="form-group">
                    <a href="/oferta.pdf" class="modal-link">Публичная оферта</a>
                </div>
                <div class="hiddens">
                    <input type="hidden" name="u" value="1" />
                    <input type="hidden" name="f" value="1" />
                    <input type="hidden" name="s" />
                    <input type="hidden" name="c" value="0" />
                    <input type="hidden" name="m" value="0" />
                    <input type="hidden" name="act" value="sub" />
                    <input type="hidden" name="v" value="2" />
                </div>
            </form>
        </div>
    </div>

    <div id="modal-success" class="modal">
        <div class="modal-title">
            <h3>Спасибо за Вашу заявку</h3>
            <span>Наш менеджер скоро Вам перезвонит</span>
        </div>
    </div>
    <!-- Modals -->

@endsection
