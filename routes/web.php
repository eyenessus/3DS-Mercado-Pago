<?php

use App\Http\Controllers\EnounController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [EnounController::class,'index']);
Route::get('/pagamento', [EnounController::class,'create']);
Route::post('/payment', [EnounController::class,'store']);
