<?php

Route::get('/', 'Login@index');

Route::post('/loginAdmin','Login@loginAdmin');

// Route::get('/adminGenerate','Login@adminGenerate');

Route::get('/keluarAdmin', 'Login@keluarAdmin');

Route::get('/tambahSurat', 'Surat_masuk@tambahSurat');

Route::post('/tambahSuratMasuk','Surat_masuk@tambahSuratMasuk');

Route::get('/hapusSuratMasuk/{id}','Surat_masuk@hapusSuratMasuk');

Route::post('/ubahSuratMasuk/{id}','Surat_masuk@ubahSuratMasuk');

Route::get('/ubahSM/{id}','Surat_masuk@ubahSM');

Route::get('/listDisposisi', 'Disposisi@listDisposisi');

Route::get('/kirimSurat/{id}','Surat_masuk@kirimSurat');

Route::post('/tambahDisposisi','Disposisi@tambahDisposisi');

Route::get('/suratNaik','Surat_masuk@suratNaik');

Route::get('/tambahDis/{id}','Disposisi@tambahDis');
