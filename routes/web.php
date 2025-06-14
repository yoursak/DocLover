<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ResumeTemplatesController;
use App\Http\Controllers\TransferFileController;

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


Route::prefix('/')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/', [HomeController::class, 'Home'])->name('home.index');
        Route::get('/about-us', [HomeController::class, 'aboutus'])->name('home.aboutus');
        Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
        Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('home.privacy');
        Route::get('/terms-and-conditions', [HomeController::class, 'terms'])->name('home.terms');
        Route::get('/all-tools', [HomeController::class, 'AllTools'])->name('home.AllTools');
    });
    Route::prefix('/transfer-file')->group(function () {
        Route::get('/', [TransferFileController::class, 'index'])->name('transfer-file.index');
        Route::post('/upload', [TransferFileController::class, 'uploadForTransfer'])->name('transfer-file.send');
        Route::get('/download-transfer/{filename}', [TransferFileController::class, 'downloadTransfer'])->name('transfer.download');
    });
    Route::prefix('/docs')->group(function () {
        Route::get('/pdf-to-zip', [DocumentController::class, 'pdf_to_zip'])->name('pdf-to-zip');
        Route::get('/pdf-to-doc', [DocumentController::class, 'pdf_to_doc'])->name('pdf-to-doc');
        Route::get('/pdf-to-jpg', [DocumentController::class, 'pdf_to_jpg'])->name('pdf-to-jpg');
        Route::get('/pdf-to-html', [DocumentController::class, 'pdf_to_html'])->name('pdf-to-html');
        Route::get('/pdf-to-xl', [DocumentController::class, 'pdf_to_xl'])->name('pdf-to-xl');
        Route::get('/jpg-to-png', [DocumentController::class, 'jpg_to_png'])->name('jpg-to-png');
        Route::get('/png-to-jpg', [DocumentController::class, 'png_to_jpg'])->name('png-to-jpg');
        Route::get('/jpg-to-doc', [DocumentController::class, 'jpg_to_doc'])->name('jpg-to-doc');
        Route::get('/jpg-to-xl', [DocumentController::class, 'jpg_to_xl'])->name('jpg-to-xl');
        Route::get('/crop', [DocumentController::class, 'crop'])->name('crop');
        Route::get('/photo-clarity-enhancement', [DocumentController::class, 'photo_clarity_enhancement'])->name('photo-clarity-enhancement');
        Route::get('/passport-photo', [DocumentController::class, 'passport_size_photo'])->name('passport-photo');
        Route::get('/background-change', [DocumentController::class, 'background_change'])->name('background-change');
        Route::get('/photo-size-compression', [DocumentController::class, 'photo_size_compression'])->name('photo-size-compression');
        Route::get('/image-to-text-conversion', [DocumentController::class, 'image_to_text_conversion'])->name('image-to-text-conversion');
        Route::get('/sign-picker', [DocumentController::class, 'sign_picker'])->name('sign-picker');
        Route::get('/pdf-to-excel', [DocumentController::class, 'pdf_to_excel'])->name('pdf-to-excel');
        Route::get('/pdf-to-ppt', [DocumentController::class, 'pdf_to_ppt'])->name('pdf-to-ppt');

        Route::get('/merge-pdf', [DocumentController::class, 'merge_pdf'])->name('merge-pdf');
        Route::get('/split-pdf', [DocumentController::class, 'split_pdf'])->name('split-pdf');
        Route::get('/rotate-pdf', [DocumentController::class, 'rotate_pdf'])->name('rotate-pdf');
        Route::get('/delete-pdf-pages', [DocumentController::class, 'delete_pdf_pages'])->name('delete-pdf-pages');
        Route::get('/extract-pdf-pages', [DocumentController::class, 'extract_pdf_pages'])->name('extract-pdf-pages');
        Route::get('/protect-pdf', [DocumentController::class, 'protect_pdf'])->name('protect-pdf');
        Route::get('/unlock-pdf', [DocumentController::class, 'unlock_pdf'])->name('unlock-pdf');
        Route::get('/add-watermark', [DocumentController::class, 'add_watermark'])->name('add-watermark');
        Route::get('/pdf-metadata-editor', [DocumentController::class, 'pdf_metadata_editor'])->name('pdf-metadata-editor');
        Route::get('/pdf-form-filler', [DocumentController::class, 'pdf_form_filler'])->name('pdf-form-filler');
        Route::get('/pdf-size-compress', [DocumentController::class, 'pdf_size_compress'])->name('pdf-size-compress');
    });
    Route::prefix('/convert')->group(function () {
        Route::post('/pdf-to-zip', [DocsController::class, 'PDFtoZIP'])->name('convert.PDFtoZIP');
        Route::post('/jpg-to-png', [DocsController::class, 'JPGtoPNG'])->name('convert.JPGtoPNG');
        Route::post('/remove-background', [DocsController::class, 'removeBG'])->name('remove.background');
        Route::post('/image-quality-enhance', [DocsController::class, 'enhanceImageQuality'])->name('enhance.image');
        Route::post('/pdf-to-word', [DocsController::class, 'convertPDFtoWord'])->name('convert.convertPDFtoWord');
        Route::post('/pdf-to-html', [DocsController::class, 'convertPDFtoHTML'])->name('convert.convertPDFtoHTML');
        Route::post('/image-to-text', [DocsController::class, 'imageToText'])->name('convert.imageToText');
        Route::post('/image-to-word', [DocsController::class, 'convertImageToWord'])->name('convert.imageToWord');
        Route::post('/pdf-merge', [DocsController::class, 'mergePDF'])->name('pdf.merge');
        Route::post('/split-pdf', [DocsController::class, 'split'])->name('pdf.split');
    });
    Route::prefix('/resume')->group(function () {
        Route::get('/', [ResumeController::class, 'index'])->name('resume.index');
        Route::get('/templates', [ResumeController::class, 'ResumeTemplate'])->name('resume.ResumeTemplate');
        Route::prefix('/template')->group(function () {
            Route::post('/collect-data', [ResumeTemplatesController::class, 'collectAllData'])->name('resume.collectAllData');
            Route::get('/preview', [ResumeTemplatesController::class, 'preview'])->name('resume.preview');
            Route::get('/completed-resume', [ResumeTemplatesController::class, 'getResumeTemplate'])->name('resume.getResumeTemplate');
            Route::get('/temp/{id}', [ResumeTemplatesController::class, 'index'])->name('resumeTemp.index');
            Route::get('/download-pdf', [ResumeTemplatesController::class, 'downloadPDF'])->name('resumeTemp.download.PDF');
        });
    });
});
