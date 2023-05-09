<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Nette\Schema\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $path_query_file = '/logs/query.log';
        $header = '---------------------------------------------------------';
        
        DB::listen(function($query) use ($path_query_file, $header) {
            File::append(
                storage_path($path_query_file),
                $header . PHP_EOL
           );
            File::append(
                storage_path($path_query_file),
                $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL
           );
        });
    }
}
