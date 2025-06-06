<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdministratorController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// User Auth Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home')->middleware('auth');
    Route::get('/products', 'productsPageView')->name('productsPage')->middleware('auth');
    Route::get('products/productOverview/{productId}', 'productOverview')->name('productOverview')->middleware('auth');
    Route::get('/contact-us', 'contactUsView')->name('contact.us')->middleware('auth');
    Route::post('/contact-us/submit', 'submitContactUsForm')->name('contact.us.formSubmission')->middleware('auth');
});


Route::controller(GoogleAuthController::class)->group(function () {
    Route::get('/auth/google/redirect', 'redirect')->name('auth.google.redirect');
    Route::get('/auth/google/callback', 'callback')->name('auth.google.callback');
});

Route::controller(LegalController::class)->group(function () {
    Route::get('legals/company/about-us', 'aboutUs')->name('about.us');
    Route::get('legals/company/faq', 'faq')->name('faq');
    Route::get('legals/company/payment', 'payment')->name('payment');
    Route::get('legals/company/privacy-policy', 'privacyPolicy')->name('privacy.policy');
    Route::get('legals/company/term-condition', 'termCondition')->name('terms.condition');
});

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('user/userProfile', 'userProfile')->name('userProfile')->middleware('auth');
    Route::get('user/user-orders', 'userOrders')->name('userOrders')->middleware('auth');
    Route::get('user/user-order-details/{orderId}', 'userOrderDetails')->name('userOrdersDetails')->middleware('auth');
    Route::get('user/user-shipping', 'userShipping')->name('userShipping')->middleware('auth');
    Route::get('user/user-payment', 'userPayment')->name('userPayment')->middleware('auth');
    Route::get('user/edit/user-profile', 'getEditUserProfile')->name('getEditUserProfile')->middleware('auth');
    Route::post('user/edit/userProfileEdit', 'postEditUserProfile')->name('postEditUserProfile')->middleware('auth');
    Route::get('user/add/new-user-shipping', 'getAddUserShipping')->name('getAddUserShipping')->middleware('auth');
    Route::post('user/add/new-user-shipping', 'postAddUserShipping')->name('postAddUserShipping')->middleware('auth');
    Route::get('user/edit/edit-user-shipping/{shippingId}', 'getEditShippingAddress')->name('getEditUserShipping')->middleware('auth');
    Route::put('user/edit/edit-user-shipping/{shippingId}', 'putEditUserShipping')->name('putEditUserShipping')->middleware('auth');
    Route::delete('user/delete/delete-user-shipping/{shippingId}', 'deleteShippingAddress')->name('deleteShippingAddress')->middleware('auth');
    Route::get('user/add/new-user-payment', 'getAddUserPayment')->name('getAddUserPayment')->middleware('auth');
    Route::post('user/add/new-user-payment', 'postAddUserPayment')->name('postAddUserPayment')->middleware('auth');
    Route::delete('user/delete/delete-user-payment/{paymentId}', 'deletePaymentAddress')->name('deleteShippingAddress')->middleware('auth');
    Route::get('user/change/change-password', 'changePassword')->name('changePassword')->middleware('auth');
    Route::post('user/change/change-password', 'postChangePassword')->name('change.password')->middleware('auth');
});

Route::controller(CartController::class)->group(function () {
    Route::get('product/cart', 'renderCart')->name('cartPage')->middleware('auth');
    Route::post('product-add-to-cart', 'addToCart')->name('addToCart')->middleware('auth');
    Route::post('product-update-to-cart', 'updateCartItems')->name('updateToCart')->middleware('auth');
    Route::post('product-delete-cart-item', 'deleteCartItem')->name('deleteCartItem')->middleware('auth');
    Route::get('product/checkout', 'getCheckout')->name('checkout')->middleware('auth');
    Route::post('product/submitCheckout', 'postCheckoutProcess')->name('postCheckout')->middleware('auth');
    Route::get('order/summery/{oId}', 'OrderSummery')->name('OrderSummery')->middleware('auth');
    Route::post('/apply-coupon', 'applyCoupon')->name('applyCoupon')->middleware('auth');
    Route::post('/remove-coupon', 'removeCouponFromCheckout')->name('removeCoupon')->middleware('auth');

});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'postLoginForm')->name('postLoginForm')->middleware('guest');
    Route::get('/logout', 'logout')->name('userLogout')->middleware('auth');
    Route::get('/signup', 'signup')->name('signup')->middleware('guest');
    Route::post('/signup', 'postSignup')->name('postSignup')->middleware('guest');
    Route::get('/recovery-password', 'recoveryPassword')->name('recovery.password')->middleware('guest');
    Route::post('/submit-recovery-password', 'postRecoveryPassword')->name('post.recover.password')->middleware('guest');
    Route::get('/recovery-password-url/{token}', 'recoveryPasswordUrlGenerate')->name('recovery.password.url')->middleware('guest');
    Route::post('/update-recovery-password', 'updateResetPassword')->name('recovery.password.update')->middleware('guest');
});

// Admin Routes
Route::middleware('admin.redirect')->group(function () {
    Route::get('admin/login', [AdminLoginController::class, 'index'])->name("adminLogin");
    Route::post('admin/login', [AdminLoginController::class, 'postAdminLogin'])->name("postAdminForm");
});

Route::middleware('admin.auth')->group(function () {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/logout', [AdminLoginController::class, 'adminLogout'])->name('adminLogout');
});

// Admin Category Controller
Route::controller(CategoryController::class)->group(function () {
    Route::get('admin/category', 'getCategory')->name('getCategory')->middleware('admin.auth')->middleware('admin.auth');
    Route::post('admin/category', 'postCategory')->name('postCategory')->middleware('admin.auth');
    Route::get('admin/categoryList', 'categoryList')->name('categoryList')->middleware('admin.auth');
    Route::get('admin/editCategory/{categoryEditId}', 'getEdit')->name('getEdit')->middleware('admin.auth');
    Route::put('admin/update/{categoryEditId}', 'postEditCategory')->name('postEditCategory')->middleware('admin.auth');
    Route::delete('admin/delete/{deleteCategoryId}', 'deleteCategory')->name('deleteCategory')->middleware('admin.auth');
});

// Admin Product Controller
Route::controller(ProductController::class)->group(function () {
    Route::get('admin/product', 'getProduct')->name('getProduct')->middleware('admin.auth');
    Route::post('admin/product', 'postProduct')->name('postProduct')->middleware('admin.auth');
    Route::get('admin/productList', 'showProductList')->name('productList')->middleware('admin.auth');
    Route::get('admin/editProduct/{productEditId}', 'getProductEdit')->name('getProductEdit')->middleware('admin.auth');
    Route::put('admin/product/update/{productEditId}', 'postUpdateProduct')->name('postEditProduct')->middleware('admin.auth');
    Route::delete('admin/product/delete/{deleteProductId}', 'deleteProductById')->name('deleteProduct')->middleware('admin.auth');
});

// Admin Brands Controller
Route::controller(BrandController::class)->group(function () {
    Route::get('admin/brands', 'getBrands')->name('getBrands')->middleware('admin.auth');
    Route::post('admin/brands', 'postBrands')->name('postBrands')->middleware('admin.auth');
    Route::get('admin/brands/brandsList', 'showBrandsList')->name('brandsList')->middleware('admin.auth');
    Route::get('admin/brands/editBrands/{brandEditId}', 'getBrandsEdit')->name('getBrandsEdit')->middleware('admin.auth');
    Route::put('admin/brands/update/{brandEditId}', 'postUpdateBrands')->name('postEditBrands')->middleware('admin.auth');
    Route::delete('admin/brands/delete/{deleteBrandId}', 'deleteBrandId')->name('deleteBrand')->middleware('admin.auth');
});

// Admin Coupons Controller
Route::controller(CouponController::class)->group(function () {
    Route::get('admin/coupons', 'renderCoupons')->name('coupons')->middleware('admin.auth');
    Route::post('admin/submitCoupons', 'postCouponsMethod')->name('postCoupons')->middleware('admin.auth');
    Route::get('admin/coupon/editCoupon/{editCoupon}', 'renderEditCoupon')->name('getCouponEdit')->middleware('admin.auth');
    Route::put('admin/coupon/update/{editCoupon}', 'editCoupon')->name('editCoupon')->middleware('admin.auth');
    Route::delete('admin/coupon/delete/{deleteCouponId}', 'deleteCouponById')->name('deleteCoupon')->middleware('admin.auth');
});

// Admin User Controller
Route::controller(UserController::class)->group(function () {
    Route::get('admin/users', 'getAllUsers')->name('getAllUsers')->middleware('admin.auth');
    Route::delete('admin/users/deleteUser/{deleteUserById}', 'deleteUser')->name('deleteUser')->middleware('admin.auth');
});

// Admin Orders Controller
Route::controller(OrderController::class)->group(function () {
    Route::get('admin/order/orderList', 'showOrderList')->name('orderList')->middleware('admin.auth');
    Route::get('admin/order/orderDetails/{id}', 'show')->name('orderShow')->middleware('admin.auth');
    Route::post('admin/order/orderDetails/updateStatus/{id}', 'updateStatusByAdmin')->name('updateOrderStatusByAdmin')->middleware('admin.auth');
    Route::post('admin/order/orderDetails/sendMail/{id}', 'adminMailSender')->name('adminMailSenderById')->middleware('admin.auth');
    Route::delete('admin/order/delete-multiple', 'deleteMultipleOrders')->name(name: 'order.deleteMultiple')->middleware('admin.auth');
});

// Admin Administrator
Route::controller(AdministratorController::class)->group(function () {
    Route::get('admin/administrator/change/admin-password', "getChangeAdminPassword")->name("admin.changePassword")->middleware('admin.auth');
    Route::post('admin/administrator/change/admin-password', "postChangeAdminPassword")->name("admin.postChangePassword")->middleware('admin.auth');

    Route::get('admin/users/action/contact-Us', "getContactUs")->name("admin.ContactUs")->middleware("admin.auth");
    Route::get('messages/{message}', 'showMessage')->name('messages.show')->middleware("admin.auth");
    Route::post('messages/{message}/mark-read', 'markAsRead')->name('messages.markRead')->middleware("admin.auth");
    Route::post('messages/{message}/resolve', 'toggleResolved')->name('messages.resolve')->middleware("admin.auth");
    Route::delete('messages/{message}', 'deleteMessage')->name('messages.destroy')->middleware("admin.auth");
});