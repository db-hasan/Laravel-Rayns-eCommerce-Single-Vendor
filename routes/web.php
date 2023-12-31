<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\backend\SubSubCategoryController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\UnitController;
use App\Http\Controllers\backend\ColorController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\backend\PurchaesController;
use App\Http\Controllers\backend\SalesController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\PromoController;


use App\Http\Controllers\frontend\HomeController;


// frontend route

Route::get('/',[HomeController::class,'home']);
Route::get('/singelcategory/{cata_id}',[HomeController::class,'singelcategory']);

Route::get('/viewproduct', function () {
    return view('frontend/product/viewproduct');
});

// Route::get('/viewproduct//{view_id}',[HomeController::class,'viewproduct']);

Route::get('/shopcart', function () {
    return view('frontend/cartpage/shopcart');
});
Route::get('/cartview', function () {
    return view('frontend/cartpage/cartview');
});

// backend route

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('backend/dashboard/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('category/index',[CategoryController::class,'index'])->name('category.index');
    Route::get('category/insert',[CategoryController::class,'create'])->name('category.create');
    Route::post('category/insert',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/update/{category_id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update/{category_id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('category/show/{category_id}',[CategoryController::class,'show'])->name('category.show');
    Route::get('category/destroy/{category_id}',[CategoryController::class,'destroy'])->name('category.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('subcategory/index',[SubcategoryController::class,'index'])->name('subcategory.index');
    Route::get('subcategory/insert',[SubcategoryController::class,'create'])->name('subcategory.create');
    Route::post('subcategory/insert',[SubcategoryController::class,'store'])->name('subcategory.store');
    Route::get('subcategory/update/{subcategory_id}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
    Route::post('subcategory/update/{subcategory_id}',[SubcategoryController::class,'update'])->name('subcategory.update');
    Route::get('subcategory/show/{subcategory_id}',[SubcategoryController::class,'show'])->name('subcategory.show');
    Route::get('subcategory/destroy/{subcategory_id}',[SubcategoryController::class,'destroy'])->name('subcategory.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('subsubcategory/index',[subsubcategoryController::class,'index'])->name('subsubcategory.index');
    Route::get('subsubcategory/insert',[subsubcategoryController::class,'create'])->name('subsubcategory.create');
    Route::post('subsubcategory/insert',[subsubcategoryController::class,'store'])->name('subsubcategory.store');
    Route::get('subsubcategory/update/{subsubcategory_id}',[subsubcategoryController::class,'edit'])->name('subsubcategory.edit');
    Route::post('subsubcategory/update/{subsubcategory_id}',[subsubcategoryController::class,'update'])->name('subsubcategory.update');
    Route::get('subsubcategory/show/{subsubcategory_id}',[subsubcategoryController::class,'show'])->name('subsubcategory.show');
    Route::get('subsubcategory/destroy/{subsubcategory_id}',[subsubcategoryController::class,'destroy'])->name('subsubcategory.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('brand/index',[BrandController::class,'index'])->name('brand.index');
    Route::get('brand/insert',[BrandController::class,'create'])->name('brand.create');
    Route::post('brand/insert',[BrandController::class,'store'])->name('brand.store');
    Route::get('brand/update/{brand_id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('brand/update/{brand_id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('brand/show/{brand_id}',[BrandController::class,'show'])->name('brand.show');
    Route::get('brand/destroy/{brand_id}',[BrandController::class,'destroy'])->name('brand.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('color/index',[ColorController::class,'index'])->name('color.index');
    Route::get('color/insert',[ColorController::class,'create'])->name('color.create');
    Route::post('color/insert',[ColorController::class,'store'])->name('color.store');
    Route::get('color/update/{color_id}',[ColorController::class,'edit'])->name('color.edit');
    Route::post('color/update/{color_id}',[ColorController::class,'update'])->name('color.update');
    Route::get('color/show/{color_id}',[ColorController::class,'show'])->name('color.show');
    Route::get('color/destroy/{color_id}',[ColorController::class,'destroy'])->name('color.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('product/index',[ProductController::class,'index'])->name('product.index');
    Route::get('product/insert',[ProductController::class,'create'])->name('product.create');
    
    Route::post('/subcategory', [ProductController::class,'subcategory']);
    Route::post('/subsubcategory', [ProductController::class,'subsubcategory']);
    
    Route::post('product/insert',[ProductController::class,'store'])->name('product.store');
    Route::get('product/update/{product_id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('product/update/{product_id}',[ProductController::class,'update'])->name('product.update');
    Route::get('product/show/{product_id}',[ProductController::class,'show'])->name('product.show');
    Route::get('product/destroy/{product_id}',[ProductController::class,'destroy'])->name('product.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('promo/index',[promoController::class,'index'])->name('promo.index');
    Route::get('promo/insert',[promoController::class,'create'])->name('promo.create');
    Route::post('promo/insert',[promoController::class,'store'])->name('promo.store');
    Route::get('promo/update/{promo_id}',[promoController::class,'edit'])->name('promo.edit');
    Route::post('promo/update/{promo_id}',[promoController::class,'update'])->name('promo.update');
    Route::get('promo/show/{promo_id}',[promoController::class,'show'])->name('promo.show');
    Route::get('promo/destroy/{promo_id}',[promoController::class,'destroy'])->name('promo.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('supplier/index',[SupplierController::class,'index'])->name('supplier.index');
    Route::get('supplier/insert',[SupplierController::class,'create'])->name('supplier.create');
    Route::post('supplier/insert',[SupplierController::class,'store'])->name('supplier.store');
    Route::get('supplier/update/{supplier_id}',[SupplierController::class,'edit'])->name('supplier.edit');
    Route::post('supplier/update/{supplier_id}',[SupplierController::class,'update'])->name('supplier.update');
    Route::get('supplier/show/{supplier_id}',[SupplierController::class,'show'])->name('supplier.show');
    Route::get('supplier/destroy/{supplier_id}',[SupplierController::class,'destroy'])->name('supplier.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('purchaes/index',[purchaesController::class,'index'])->name('purchaes.index');
    Route::get('purchaes/insert',[purchaesController::class,'create'])->name('purchaes.create');
    Route::post('purchaes/insert',[purchaesController::class,'store'])->name('purchaes.store');
    Route::get('purchaes/show/{purchaes_id}',[purchaesController::class,'show'])->name('purchaes.show');
    Route::get('purchaes/invice/{purchaes_id}',[purchaesController::class,'invice'])->name('purchaes.invice');
    Route::get('purchaes/destroy/{purchaes_id}',[purchaesController::class,'destroy'])->name('purchaes.destroy');
});



require __DIR__.'/auth.php';




