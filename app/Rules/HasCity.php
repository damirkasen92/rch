<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class HasCity implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $str = 'Абай,Акколь,Аксай,Аксу,Актау,Актобе,Алга,Алматы,Арал,Аркалык,Арыс,Нур-Султан,Атбасар,Атырау,Аягоз,Байконыр,Балхаш,Булаево,Державинск,Ерейментау,Есик,Есиль,Жанаозен,Жанатас,Жаркент,Жезказган,Жем,Жетысай,Житикара,Зайсан,Зыряновск,Казалинск,Кандыагаш,Капшагай,Караганды,Каражал,Каратау,Каркаралинск,Каскелен,Кентау,Кокшетау,Костанай,Кулсары,Курчатов,Кызылорда,Ленгер,Лисаковск,Макинск,Мамлютка,Павлодар,Петропавловск,Приозёрск,Риддер,Рудный,Сарань,Сарканд,Сарыагаш,Сатпаев,Семей,Сергеевка,Серебрянск,Степногорск,Степняк,Тайынша,Талгар,Талдыкорган,Тараз,Текели,Темир,Темиртау,Тобыл,Туркестан,Уральск,Усть-Каменогорск,Ушарал,Уштобе,Форт-Шевченко,Хромтау,Шардара,Шалкар,Шар,Шахтинск,Шемонаиха,Шу,Шымкент,Щучинск,Экибастуз,Эмба,';

        if (Str::contains($str, Str::ucfirst(Str::lower($value)) . ',')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Пожалуйста выберите город из всплывающего списка при вводе в поле город';
    }
}
