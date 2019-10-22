<?php declare(strict_types=1);

namespace PosLifestyle\DateRangeFilter;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FilterServiceProvider extends ServiceProvider
{
    protected const JS_FILE = __DIR__ . '/../dist/js/filter.js';
    protected const CSS_FILE = __DIR__ . '/../dist/css/filter.css';
    protected const LANGUAGE_FILES = [
        'de' => __DIR__ . '/../resources/lang/de/filter.json',
    ];

    public function boot(): void
    {
        Nova::serving(static function () {
            Nova::script('date-range-filter', self::JS_FILE);
            Nova::style('date-range-filter', self::CSS_FILE);

            foreach (self::LANGUAGE_FILES as $languageFile) {
                Nova::translations($languageFile);
            }
        });
    }
}