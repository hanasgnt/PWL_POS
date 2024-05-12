<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }
    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:500',
        ]);

        // Penamaan file
        $extfile = $request->berkas->getClientOriginalName();
        $namaFile = 'web-' . time() . "." . $extfile;

        // Path file
        // $path = $request->berkas->store('uploads');
        $path = $request->berkas->storeAs('public', $namaFile);

        $pathBaru = asset('storage/' . $namaFile);
        echo "Proses upload berhasil, file berada di: $path";
        echo "<br>";
        echo "Tampilkan link: <a href='$pathBaru'>$pathBaru</a>";
        // echo $request->berkas->getClientOriginalName() . "lolos validasi";
    }
}
