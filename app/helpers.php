<?php
if(! function_exists('markdown')){
    function markdown($text = null){
        return app(ParsedownExtra::class)->text($text);
    }
}

function attachments_path($path='')
{
    return public_path('files'.($path ? DIRECTORY_SEPARATOR.$path : $path));
}