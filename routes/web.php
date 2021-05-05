<?php
use Illuminate\Support\Facades\Route;

// login security
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

// student
Route::prefix('siswa')->name('siswa.')->namespace('Student')->middleware(['auth', 'checkRole:siswa'])->group(function(){
    // home
    Route::get('/perpus', 'HomeController@index')->name('index');
    Route::get('/perpus/latest', 'HomeController@bookLatest')->name('latest');
    Route::get('/perpus/ascending', 'HomeController@bookAsc')->name('asc');
    Route::get('/perpus/descending', 'HomeController@bookDesc')->name('desc');
    // book orderby category
    Route::get('/category_show/{id}', 'HomeController@categoryShow')->name('showcategory');
    // book orderby author
    Route::get('/author_show/{id}', 'HomeController@authorShow')->name('showauthor');
    // search book
    Route::get('/search', 'HomeController@search')->name('search');
    // book detail
    Route::get('/show/{id}', 'HomeController@detail')->name('detail');
});

// admin
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware(['auth', 'checkRole:admin'])->group(function(){
    // dashboard
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    // user register
    Route::resource('pengguna', 'RegisterUserController');
    // change password
    Route::prefix('account')->name('password.')->group(function(){
        Route::get('/password', 'PasswordController@edit')->name('edit');
        Route::patch('/password', 'PasswordController@update')->name('edit');
    });
    // student
    Route::resource('siswa', 'StudentController');
    // classroom
    Route::resource('kelas', 'ClassroomController')->except('delete_all_class');
    Route::delete('delete_all_class', 'ClassroomController@delete_all_class')->name('kelas.delete');
    // borrowing
    Route::resource('pinjam', 'BorrowingController')->except('denda');
    Route::get('/fine', 'BorrowingController@fine')->name('fine');
    // book management
    Route::namespace('Book')->group(function(){
        // book
        Route::resource('buku', 'BookController');
        // category
        Route::resource('kategori', 'CategoryController');
         // author
         Route::resource('pengarang', 'AuthorController');
         // publisher
         Route::resource('penerbit', 'PublisherController');
    });
    // Borrowing Report
    Route::get('/borrowing_report', 'ReportController@borrowingReport')->name('laporan.peminjaman');
    Route::get('/borrowing_report/search', 'ReportController@borrowingReportSearch')->name('laporan.peminjaman.search');
    // generate report borrowing to pdf
    Route::get('/borrowing_report/generate', 'ReportController@generateReportPdf')->name('laporan.generate.pdf');
});

