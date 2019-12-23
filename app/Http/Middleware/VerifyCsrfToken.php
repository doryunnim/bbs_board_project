<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // CSRF 보호로 부터 특정 url제외 시키기
        'introduces',
        'introduces/*',
        'japan',
        'japan/*',
        'qnaArticles',
        'qnaArticles/*'
    ];

}
