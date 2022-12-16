<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContactFormShortcode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response =  $next($request);
        if(!method_exists($response, 'content')) {
            return $response;
        }
        $content = str_replace('[contact_form]', view('forms.contact-form'), $response->content());
        $response->setContent($content);
        return $response;
    }
}
