<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    public function upload(Request $request):  JsonResponse
    {
        $file = $request->file('file');
        if ($file === null) {
            return response()->json([
                'message' => 'Вы не отправили файл'
            ], 400);
        }

        $fileName = Storage::putFile('',$file);

//        $file->store('');

        return response()->json([
            'url' => Storage::url($fileName)
        ]);
    }

    public function download(): StreamedResponse
    {
        return Storage::download('test.txt');
    }
}
