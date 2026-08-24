<?php

use App\Models\AmlaAttachment;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    info('AmlaAttachment cleanup job is running');
    AmlaAttachment::where('deletedAt', '<', now()->subDays(7))
        ->delete();
})
    ->daily();
