<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function hello() {
        return "Привет, лучшая группа!";
    }

    public function hello2($name) {
        return "Привет, $name";
    }

    public function hello3($id) {
        $hi = [
          1 => "Добрый день!",
          2 => "Добрый вечер!",
          3 => "Доброй ночи!",
          4 => "Доброе утро!"
        ];
        return $hi[$id];
    }
    public function city($id) {
        $city = [
            'Дмитрий' => "Томск",
            'Никита' => "Москва",
            'Алексей' => "Санкт-Петербург",
            'Кирилл' => "Ростов-на-Дону",
            'Денис' => "Омск"
        ];
        if ( isset($city[$id])) {
            return $city[$id];
        }
        else {
            return "Такого пользователся нет!";
        }

    }
}
