<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController; 
use App\Http\Controllers\MenuController; 
use App\Http\Controllers\PublisherController; 
use App\Http\Controllers\BookController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\SaleController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\AdmAuthController; 
use App\Http\Controllers\AdmController; 
use App\Http\Controllers\InicioController; 
use App\Http\Controllers\AdmsaleController; 
use App\Http\Controllers\MenuClienteController; 

                    ###Menu geral ###
Route::get('/',[InicioController::class,'index'])->name('start.index');

Route::get('/menucliente',[MenuClienteController::class,'index'])->name('menucliente.index');

#criar ADM 
Route::get('/adm',[AdmController::class,'index'])->name('adm.index');
Route::get('show/{adm}',[AdmController::class,'show'])->name('adm.show');
Route::get('/create-adm',[AdmController::class,'create'])->name('adm.create');
Route::post('/store-adm',[AdmController::class,'store'])->name('adm-store');
Route::get('/edit-adm/{adm}',[AdmController::class,'edit'])->name('adm.edit');
Route::put('/update-adm/{adm}',[AdmController::class, 'update'])->name('adm-update');
Route::get('/destroi-adm/{adm}',[AdmController::class,'destroy'])->name('adm.destroy');

#menus das funcoes adms
Route::get('/inicio', [MenuController::class, 'inicio'])->name('menu.index');


#login adm autenticar
Route::get('/loginadm', [AdmAuthController::class, 'adm_login'])->name('adm.login');
Route::post('/login-adm-logar', [AdmAuthController::class, 'login_logar'])->name('login-adm-logar');
Route::post('/logout-adm', [AdmAuthController::class, 'logout'])->name('logout-adm');


#Autores
Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
Route::get('/create-author',[AuthorController::class,'create'])->name('author.create');
Route::post('/store-author',[AuthorController::class,'store'])->name('author-store');
Route::get('show-autor/{author}',[AuthorController::class,'show'])->name('author.show');
Route::get('/destroi-author/{author}',[AuthorController::class,'destroy'])->name('author.destroy');
Route::get('/edit-author/{author}',[AuthorController::class,'edit'])->name('author.edit');
Route::put('/update-author/{author}',[AuthorController::class, 'update'])->name('author-update');

#Publisher
Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index');
Route::get('/create-publisher',[PublisherController::class,'create'])->name('publisher.create');
Route::post('/store-publisher',[PublisherController::class,'store'])->name('publisher-store');
Route::get('show-publisher/{publisher}',[PublisherController::class,'show'])->name('publisher.show');
Route::get('/edit-publisher/{publisher}',[PublisherController::class,'edit'])->name('publisher.edit');
Route::put('/update-publisher/{publisher}',[PublisherController::class, 'update'])->name('publisher-update');
Route::get('/destroi-publisher/{publisher}',[PublisherController::class,'destroy'])->name('publisher.destroy');


#livros

Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/create-book',[BookController::class,'create'])->name('book.create');
Route::post('/store-book',[BookController::class,'store'])->name('book-store');

Route::get('/edit-book/{book}',[BookController::class,'edit'])->name('book.edit');
Route::put('/update-book/{book}',[BookController::class, 'update'])->name('book-update');
Route::get('show-/{book}',[BookController::class,'show'])->name('book.show');

Route::delete('/destroi-book/{book}',[BookController::class,'destroy'])->name('book.destroy');


#criar cliente usuario

Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('show/{user}',[UserController::class,'show'])->name('user.show');
Route::get('/create-user',[UserController::class,'create'])->name('user.create');
Route::post('/store-user',[UserController::class,'store'])->name('user-store');
Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('user.edit');
Route::put('/update-user/{user}',[UserController::class, 'update'])->name('user-update');
Route::get('/destroi-user/{user}',[UserController::class,'destroy'])->name('user.destroy');


#login cliente
Route::get('/login',[AuthController::class,'login'])->name('user.login');
// Rota para processar o login
Route::post('/login/logar', [AuthController::class, 'login_logar'])->name('login_logar');
// Rota de logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

#venda cliente
Route::get('/comprar', [SaleController::class, 'shop'])->name('sale.shop')->middleware('auth'); // Apenas a rota de compras precisa do middleware 'auth'
Route::get('/comprar/confirm', [SaleController::class, 'confirm'])->name('sale.confirm');
Route::post('/comprar-finalizar', [SaleController::class, 'store'])->name('sale-store');
Route::get('/compra/{sale}/pix', [SaleController::class, 'gerarPix'])->name('sale.pix');

#venda adm
Route::get('/venda', [AdmsaleController::class, 'index'])->name('admsale.index');
Route::get('/create-sale',[AdmsaleController::class,'create'])->name('admsale.create');
Route::post('/comprar-finaliza', [AdmsaleController::class, 'store'])->name('admsale-store');
Route::get('/edit-sale/{sale}',[AdmsaleController::class,'edit'])->name('admsale.edit');
Route::put('/update-sale/{sale}',[AdmsaleController::class, 'update'])->name('admsale-update');
Route::get('show-{sale}',[AdmsaleController::class,'show'])->name('admsale.show');
Route::get('/destroi-sale/{sale}',[AdmsaleController::class,'destroy'])->name('admsale.destroy');