<?php

use App\Http\Controllers\LopHocController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/lop-hoc');

Route::resource('lop-hoc', LopHocController::class)
    ->except(['show'])
    ->parameters(['lop-hoc' => 'lopHoc']);