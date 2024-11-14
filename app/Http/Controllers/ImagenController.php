<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        /* Se usa para que las imaganes subidas sus nombres no se repitan
        composer require intervention/image
        composer require intervention/image-laravel
        php artisan vendor:publish --provider="Intervention\Image\Laravel\ServiceProvider"
        */

        $imagenServidor = Image::read($imagen);
        $imagenServidor->resize(1000,1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
