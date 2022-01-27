<?php

use Illuminate\Support\Facades\Route;
use Filbertmsaki\Nextsms\Http\Controllers\NextSmsController;


    Route::get('sms',[NextSmsController::class,'index'])->name('sms.endex');
    Route::get('sms-balance',[NextSmsController::class,'sms_balance'])->name('sms.balance');
    Route::post('sms',[NextSmsController::class,'send_single_sms'])->name('sms.send.single');
    Route::get('sms-delivery-report-range',[NextSmsController::class,'delivery_report_by_date_range'])->name('sms.report.range');
    Route::get('all-sms-delivery-report',[NextSmsController::class,'all_sms_delivery_report'])->name('all.sms.report');
    Route::get('single-sms-delivery-report',[NextSmsController::class,'single_sms_delivery_report'])->name('single.sms.report');


