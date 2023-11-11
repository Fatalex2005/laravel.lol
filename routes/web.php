<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/* Создание маршрута /test с выводом сообщения "Тестовая страница!" */
Route::get('/test', function () {
    return "Тестовая страница!";
});
Route::get('/test/1', function () {
    return "Тестовая страница 1!";
});
Route::get('/test/2', function () {
    return "Тестовая страница 2!";
});

/* Параметры в маршруте */
Route::get('/post/{id}', function ($id) {
    return "Пост " . $id;
});
Route::get('/user/{name}', function ($name) {
    return "Привет, " . $name;
});

/* Несколько параметров в маршруте */
Route::get('/post/{cardID}/{postId}', function ($cardId, $postID){
    return $cardId . " - " . $postID;
});
Route::get('/user/{surname}/{name}', function ($surname, $name){
    return "Привет, " . $surname . " " . $name;
});

/* Необязательные параметры - ? */
Route::get('/posts/page/{page?}', function ($page = 1) {
    return "Номер страницы: " . $page;
});
Route::get('/city/{city?}', function ($city = "Томск") {
    return "Город: " . $city;
});

/* Ограничение параметров */
Route::get('/users/{age}', function ($age){
    return "Возраст пользователя: " . $age;
})->where('age', '[0-9+]');

Route::get('/govsign/{sign}/{id}', function ($sign, $id) {
    return "Номер: " . $sign . ". Регион: " . $id . ".";
})->where('sign', '[a-z]+')->where('id', '[0-9]+');


/* whereAlpha - ограничение только на буквы
 * whereNumber - ограничение только на цифры
 * whereAlphaNumeric - ограничение на буквы и цифры */
Route::get('/govsign2/{sign}/{id}', function ($sign, $id) {
    return "Номер: " . $sign . ". Регион: " . $id . ".";
})->whereAlpha('sign');

/* Разрешение конфликтов в маршруте
 * сначало указываем частные случаи, потом общие
 */
Route::get('/test2/all', function () {
    return "Все тесты";
});
Route::get('/test2/{n}', function ($n){
    return "Тест - " . $n;
});

/* Группировка маршрутов */
Route::prefix('/test3')->group( function (){

    Route::get('/all', function () {
        return "Все тесты";
    });

    Route::get('/{n}', function ($n){
        return "Тест - " . $n;
    });
});

/* Маршрут, использующий контроллер */
/* Route::get('/маршрут', ['полное имя контроллера', 'имя действия']); */
Route::get('/hi', ['App\Http\Controllers\PostController', 'hello']);

/* Если мы заюзали имя контроллера (use App\Http\Controllers\PostController), то можем писать так ... */
Route::get('/hello', [PostController::class, 'hello']);

/* Передача параметра маршрута в контроллер */
Route::get('/hi/{name}', [PostController::class, 'hello2']);

/* Применение параметров маршрутов */
Route::get('/hello/{id}', [PostController::class, 'hello3'])->where('id', '[1-4]');

Route::get('/users1/{id}', [PostController::class, 'city']);
