<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // 1. Thibitisha data
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 2. Hapa unaweza kutuma email au ku save kwenye database (kwa sasa tunaacha tu)
        // Mail::to('admin@example.com')->send(new ContactMail($validated));

        // 3. Rudisha ujumbe wa success kwa mtumiaji
        return back()->with('success', 'Asante! Ujumbe wako umetumwa.');
    }
}