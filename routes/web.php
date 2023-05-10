<?php
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/NguoiDung', function () {
    return view('user/pages/usermanagement');
});
Route::get('login','user\LoginController@getLogin')->name('getLogin');
Route::post('login','user\LoginController@postLogin')->name('postLogin');
//Đăng Xuất
Route::get('logout','user\LoginController@getLogout')->name('getLogout');
Route::get('num-cart','user\UserController@getNumCart')->name('user.getNumCart');

Route::group([ 'prefix' => '', 'namespace' => 'user'], function() {
    Route::get("/","UserController@Index")->name("user.index");
    Route::get("shop","UserController@Shop")->name("user.shop");
    Route::get("contact","UserController@Contact")->name("user.contact");
    Route::get("single/{id?}","UserController@Single")->name("user.single");
    Route::get("about","UserController@About")->name("user.about");
    Route::get("new","UserController@New")->name("user.new");
    Route::get('cart','UserController@Cart')->name("user.cart");
    Route::get("payment","UserController@Payment")->name("user.payment");
    Route::post("checkout","CartController@checkout")->name("user.checkout");
    Route::get('vnpay', 'CartController@vnpay');

    Route::get("promotion","UserController@Promotion")->name("user.promotion");
    //Đăng Nhập

    //Tìm Kiếm Sách
    Route::get('search','UserController@Search')->name('Search');
    Route::post('autocomplete_ajax',"UserController@autocomplete_ajax")->name("user.autocomplete_ajax");
    //Đăng Ký
    Route::get('register','LoginController@Register')->name('getregister');
    Route::post('register','LoginController@postRegister')->name('postRegister');
    //Bình Luận
    Route::post('comment','UserController@postComment')->name('postComment');
    //Thêm giỏ hàng
    Route::post('/them-gio-hang',"CartController@addcart")->name("account.addcart");
    //Load thể loại sách
    Route::get('the loai','UserController@TheLoai')->name('theloai');
    Route::get('the loai sach/{id}','UserController@TheLoaiSach')->name('theloaisach');
    Route::get('the-loai-tin-tuc/{id}','UserController@TheLoaiTinTuc')->name('theloaitintuc');
    Route::get('chi-tiet-tin-tuc/{id}','UserController@ChiTietTinTuc')->name('chitiettintuc');

    
    //gửi phản hồi
    Route::post('gui-lien-he',"UserController@mailcontact")->name("user.mailcontact");
    //Cập nhật tài khoản người dùng
    Route::post('taikhoan/{id}','LoginController@updateAccount')->name('updateAccount');
    //Cập nhật giỏ hàng
    Route::post('/cap-nhat-gio-hang',"CartController@updatecart")->name("account.updatecart");
    //Delete giỏ hàng
    Route::delete('/xoa-gio-hang/{id?}',"CartController@deletecart")->name("account.cartdelete");
    //
    Route::get('/quan-ly-tai-khoan',"LoginController@index")->name("user.account");
    Route::post('/cap-nhat-thong-tin/{id}',"LoginController@updateinfomation")->name("user.updateinfomation");
    //
    Route::post('/them-sach-yeu-thich',"UserController@addfavoritebook")->name("user.accountheart");
    Route::get('/yeuthich',"UserController@YeuThich")->name("user.wishlist");
    Route::post('/xoa-sach-yeu-thich',"UserController@deletefavoritebook")->name("user.deleteheart");

    Route::post('/discount',"CartController@CheckDiscount")->name("user.check-discount");

    Route::post('/thanh-toan',"CartController@payment")->name("user.thanhtoan");
    Route::post('gui-xac-nhan',"CartController@checkout")->name("user.mailxacnhan");
    //
    Route::get('/chi-tiet-don-hang/{id?}',"LoginController@orderdetail")->name("account.orderdetail");
    Route::get('/huy-don-hang/{id?}',"LoginController@cancelorder")->name("account.cancelorder");
    //
    Route::get('/loc-tac-gia',"UserController@TacGia")->name("user.tacgia");
});
Route::group(['middleware' => 'CheckAdminLogin', "prefix" => "admin", "namespace" => "admin"], function() {
    Route::get("/index", "DashboardController@index")->name("admin.dashboard");
    Route::resource('dashboard',DashboardController::class);

    Route::resource('slide',SlideController::class);
    Route::get('slide/{id}/delete','SlideController@delete')->name('slide.delete');
    //Đường dẫn đến trang sách
    Route::resource('sach',BookController::class);
    Route::get('sach/{id}/delete','BookController@delete')->name('sach.delete');
    Route::post('search','BookController@search')->name('sach.search');
    //Đường dẫn đến trang thể loại
    Route::resource('theloai',TheLoaiController::class);
    Route::get('theloai/{id}/delete','TheLoaiController@delete')->name('theloai.delete');
    //Đường dẫn đến trang thể loại sách
    Route::resource('theloaisach',TheLoaiSachController::class);
    Route::get('theloaisach/{id}/delete','TheLoaiSachController@delete')->name('theloaisach.delete');

    Route::resource('theloaitintuc',DanhMucTinTucController::class);
    Route::get('theloaitintuc/{id}/delete','DanhMucTinTucController@delete')->name('theloaitintuc.delete');
    Route::resource('tintuc',TinTucController::class);
    Route::get('tintuc/{id}/delete','TinTucController@delete')->name('tintuc.delete');
    Route::post('search3','TinTucController@search')->name('tintuc.search1');
    //Đường dẫn đến trang nhà cung cấp
    Route::resource('nhacungcap',NhaCungCapController::class);
    Route::get('nhacungcap/{id}/delete','NhaCungCapController@delete')->name('nhacungcap.delete');
    Route::post('search2','NhaCungCapController@search')->name('nhacungcap.search');
    //Đường dẫn đến trang tài khoản
    Route::resource('taikhoan',AccountController::class);
    Route::get('taikhoan/{id}/delete','AccountController@delete')->name('taikhoan.delete');
    Route::post('search1','AccountController@search')->name('taikhoan.search');
    //Binh Luan
    Route::resource('binhluan',BinhLuanController::class);
    Route::get('binhluan/{id}/delete','BinhLuanController@delete')->name('binhluan.delete');
    Route::get('binhluan/{id}/duyet','BinhLuanController@duyet')->name('binhluan.duyet');
    Route::post('allow_comment','BinhLuanController@allow_comment')->name('allow_comment');
    //Đường dẫn đến trang kho
    Route::resource('kho',KhoController::class);
    Route::get('kho/{id}/delete','KhoController@delete')->name('kho.delete');
    //Đường dẫn đến trang thể loại cha
    Route::resource('theloaicha',TheLoaiChaController::class);
    Route::get('theloaicha/{id}/delete','TheLoaiChaController@delete')->name('theloaicha.delete');
    //Đường dẫn đến trang mã giảm giá
    Route::resource('magiamgia',MaGiamGiaController::class);
    Route::get('magiamgia/{id}/delete','MaGiamGiaController@delete')->name('magiamgia.delete');
    //
    Route::resource('khuyenmai',KhuyenMaiController::class);
    Route::get('khuyenmai/{id}/delete','KhuyenMaiController@delete')->name('khuyenmai.delete');
    //
    Route::resource('hoadon',HoaDonController::class);

    Route::post('hoadon/{id}/chitiethoadon','HoaDonController@getDetail')->name('hoadon.getdetail');
    Route::post('hoadon/update-trang-thai', 'HoaDonController@changeStatusOrder')->name('hoadon.changeStatus');
    Route::get('hoadon/print-order/{id?}','HoaDonController@print_order')->name('print_order');
//
    Route::resource('nhaxuatban',NhaXuatBanController::class);
    Route::get('nhaxuatban/{id}/delete','NhaXuatBanController@delete')->name('nhaxuatban.delete');
    //
    Route::resource('tacgia',TacGiaController::class);
    Route::get('tacgia/{id}/delete','TacGiaController@delete')->name('tacgia.delete');
    //
    Route::resource('kichthuoc',KichThuocController::class);
    Route::get('kichthuoc/{id}/delete','KichThuocController@delete')->name('kichthuoc.delete');
});
