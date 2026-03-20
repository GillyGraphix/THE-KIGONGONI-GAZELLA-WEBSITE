<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * Faili la kuhifadhi bei — liko kwenye storage/app/pricing.json
     */
    private function pricingFile(): string
    {
        return storage_path('app/pricing.json');
    }

    /**
     * Soma bei zilizohifadhiwa, au rudisha bei za default
     */
    private function getPricing(): array
    {
        $file = $this->pricingFile();

        if (file_exists($file)) {
            $data = json_decode(file_get_contents($file), true);
            if (is_array($data)) {
                return $data;
            }
        }

        // Bei za default kama file haipo bado
        return [
            'standard_double' => ['low' => 50,  'high' => 80],
            'standard_triple' => ['low' => 75,  'high' => 110],
            'deluxe_suite'    => ['low' => 120, 'high' => 200],
        ];
    }

    /**
     * Onyesha ukurasa wa admin pricing
     */
    public function index()
    {
        $pricing = $this->getPricing();
        return view('admin.room-pricing', compact('pricing'));
    }

    /**
     * Hifadhi bei mpya
     */
    public function update(Request $request)
    {
        $request->validate([
            'standard_double_low'  => 'required|numeric|min:0',
            'standard_double_high' => 'required|numeric|min:0',
            'standard_triple_low'  => 'required|numeric|min:0',
            'standard_triple_high' => 'required|numeric|min:0',
            'deluxe_suite_low'     => 'required|numeric|min:0',
            'deluxe_suite_high'    => 'required|numeric|min:0',
        ]);

        $pricing = [
            'standard_double' => [
                'low'  => (int) $request->input('standard_double_low'),
                'high' => (int) $request->input('standard_double_high'),
            ],
            'standard_triple' => [
                'low'  => (int) $request->input('standard_triple_low'),
                'high' => (int) $request->input('standard_triple_high'),
            ],
            'deluxe_suite' => [
                'low'  => (int) $request->input('deluxe_suite_low'),
                'high' => (int) $request->input('deluxe_suite_high'),
            ],
        ];

        file_put_contents($this->pricingFile(), json_encode($pricing, JSON_PRETTY_PRINT));

        return redirect()->route('admin.pricing')->with('success', 'Bei zimehifadhiwa!');
    }
}