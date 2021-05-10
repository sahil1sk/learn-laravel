<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('app')->middleware(["adminCheck"])->group(function() {
    Route::post("/create_tag", [AdminController::class, "addTag"]);
    Route::get("/get_tags", [AdminController::class, "getTag"]);
    Route::post("/edit_tag", [AdminController::class, "editTag"]);
    Route::post("/delete_tag", [AdminController::class, "deleteTag"]);

    Route::post("/upload", [AdminController::class, "upload"]);
    Route::post('/delete_image', [AdminController::class, "deleteImage"]);
    Route::post('/create_category', [AdminController::class, "addCategory"]);
    Route::get('/get_category', [AdminController::class, "getCategory"]);
    Route::post('/edit_category', [AdminController::class, "editCategory"]);
    Route::post('/delete_category', [AdminController::class, "deleteCategory"]);

    Route::post('/create_user', [AdminController::class, "createUser"]);
    Route::post('/edit_user', [AdminController::class, "editUser"]);
    Route::get('/get_users', [AdminController::class, "getUsers"]);
});

Route::post('app/admin_login', [AdminController::class, "adminLogin"]);

Route::get('logout', [AdminController::class, "logout"]);
Route::get('/', [AdminController::class, "index"]);
Route::any('{slug}', [AdminController::class, "index"]);




// Route::get('/', function () {
//     return view('welcome');
// });

// // ---- when we set then we will able to go to vue routers also in this way
// Route::get('{slug}', function () {
//     return view('welcome');
// });
