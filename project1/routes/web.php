<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wsbController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

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


Route::get('homePage', function()
{
    //return view('homePage');
    //return "WSB";
    //return ['name' => 'WSB', 'base' => 'classic'];
    //return view('homePage', ['firstname' => 'Janusz', 'lastname' => 'Kowalski']);
});

Route::get('pages/{x}', function($x)
{
    $pages = [
        'contact' => "Strona WSB",
        'home' => "Strona domowa"
    ];
    return $pages[$x];
});

Route::get('address/{city}/{street}/{zipcode?}', function(string $city, string $street, int $zipcode = null)
{
    if($zipcode == null)
    {
        $zipcode = '-';
    }
    else
    {
        $zipcode = substr($zipcode,0,2)."-".substr($zipcode,2,3);
    }

    echo <<<ADDRESS
        Miasto : $city, ulica : $street, <br>
        Kod pocztowy : $zipcode
    ADDRESS;
});

Route::redirect('adres/{city}/{street}/{zipcode?}','/address/{city}/{street}/{zipcode?}');

Route::prefix('admin') -> group(function()
{
    Route::get('home/{name}', function(string $name)
    {
        echo "Witaj $name na stronie administracyjnenj";
    })->where(['name' => '[A-z]+']);

    Route::get('users', function()
    {
        echo "Użytkownicy systemu";
    });
});

Route::redirect('admin/{name}', '/admin/home/{name}');

Route::get('homePage', function()
{
    return view('homePage', ['firstname' => 'Janusz', 'lastname' => 'Kowalski', 'city' => 'Poznań']);
});


Route::get("wsb", [wsbController::class, "index"]); // to działa jeśli jest use na górze

//Route::get("wsb", "App\Http\Controllers\wsbController@index"); // to działa bez use na górze

Route::get("drives/{drives}", [PageController::class, "show"]); // to działa jeśli jest use na górze


Route::view("useform", view: "useform");

Route::post("UserController", [UserController::class, "account"]); // to działa jeśli jest use na górze