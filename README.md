# nil.github.io
1.
react device detect
`https://z5qyl2.csb.app/`


2.

https://stackoverflow.com/questions/24426423/laravel-generate-secure-https-url-from-route

Laravel 8

I recently resolved this by modifying this file:

app/Providers/AppServiceProvider.php

in the method boot() add the following:

use Illuminate\Support\Facades\URL;
to work in your local environment you can leave it like this:

public function boot()
{
    if(env('APP_ENV') !== 'local') {
        URL::forceScheme('https');
    }
}

