<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WardrobeItemController;
use App\Http\Controllers\WardrobeController;
use App\Http\Controllers\OutfitController;


Route::group(['middleware'=>'Disable_BackBtn'],function(){
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

Route::view('/home', 'home')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/wardrobe/create', [WardrobeItemController::class, 'create'])->name('wardrobe.create');
Route::post('/wardrobe', [WardrobeItemController::class, 'store'])->name('wardrobe.store');

Route::get('/wardrobe/index', [WardrobeController::class, 'index'])->name('wardrobe.index');
Route::get('/wardrobe/{id}/edit', [WardrobeController::class, 'edit'])->name('wardrobe.edit');
Route::patch('/wardrobe/{id}', [WardrobeController::class, 'update'])->name('wardrobe.update');
Route::delete('/wardrobe/{id}', 'WardrobeController@destroy')->name('wardrobe.destroy');
Route::match(['DELETE', 'PATCH'], '/wardrobe/bulk-delete', 'WardrobeController@bulkDelete')->name('wardrobe.bulkDelete');

Route::get('/outfit/create', [OutfitController::class, 'create'])->name('outfit.create');
Route::post('/outfit/store', [OutfitController::class, 'store'])->name('outfit.store');










