<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

abstract class Controller
{
    protected function toast(string $message, ?string $type = null)
    {
        Session::flash("message", $message);
        if ($type)
            Session::flash("message-type", $type);
    }
}
