<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * ==========================================================
     * 1. KUFUNGUA UKURASA WA GALLERY NA KUHESABU PICHA
     * ==========================================================
     */
    public function index()
    {
        $directory = public_path('images/gallery');
        $photos = [];

        if (File::exists($directory)) {
            $files = File::files($directory);
            
            foreach ($files as $file) {
                $extension = strtolower($file->getExtension());
                // TUMEBORESHA HAPA: Inaruhusu 'jpg' na 'jpeg' pekee
                if (in_array($extension, ['jpg', 'jpeg'])) {
                    $photos[] = '/images/gallery/' . $file->getFilename();
                }
            }
        }

        return view('gallery', compact('photos'));
    }

    /**
     * ==========================================================
     * 2. KUDOWNLOAD PICHA (BILA WATERMARK KWA SASA)
     * ==========================================================
     */
    public function downloadImage(Request $request)
    {
        // Pata njia (path) ya picha kutoka kwenye URL
        $imagePath = $request->query('image');

        // Hakikisha picha halisi ipo na sio folder
        $fullPath = public_path($imagePath);
        if (!$imagePath || !file_exists($fullPath) || is_dir($fullPath)) {
            abort(404, 'Samahani, picha haijapatikana.');
        }

        // Tengeneza jina jipya la picha wakati wa kudownload (inachukua extension halisi ya picha)
        $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
        $fileName = 'Kigongoni_Gazella_' . time() . '.' . $extension;

        // Shusha picha moja kwa moja kutumia uwezo wa asili wa Laravel
        return response()->download($fullPath, $fileName);
    }
}