<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 1/1/2019
 * Time: 2:27 AM
 */

if (!function_exists('setting'))
{
    function setting()
    {
        return \App\Setting::orderBy('id', 'desc')->first();
    }
}


if (!function_exists('lang'))
{
    function lang()
    {
        if (session() -> has('lang'))
        {
            return session('lang');
        }

        else
        {
            return 'ar';
        }
    }
}

if (!function_exists('currentLang'))
{
    function currentLang()
    {
       return app()->getLocale();
    }
}



if (!function_exists('direction'))
{
    function direction()
    {
        if (session() -> has('lang'))
        {
            if (session('lang') == 'ar')
            {
                return 'rtl';
            }
            else
            {
                return 'ltr';
            }
        }

        else
        {
            return 'rtl';
        }
    }
}



if (!function_exists('defaultLang'))
{
    function defaultLang()
    {
        return  \App\Setting::orderBy('created_at', 'desc')->first();
    }
}
