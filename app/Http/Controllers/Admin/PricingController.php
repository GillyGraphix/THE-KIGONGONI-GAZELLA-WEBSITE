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
                // Tunahakikisha meal_plans na standard_family zipo hata kama file ni la zamani
                if (!isset($data['standard_family'])) {
                    $data['standard_family'] = ['low' => 100, 'high' => 140];
                }
                if (!isset($data['meal_plans'])) {
                    $data['meal_plans'] = ['hb' => 20, 'fb' => 40];
                }
                return $data;
            }
        }

        // Bei za default (Kama ulivyotolea mfano, Family Low = $100 ili siku 2 iwe $200. FB = $40)
        return [
            'standard_double' => ['low' => 50,  'high' => 80],
            'standard_triple' => ['low' => 75,  'high' => 110],
            'standard_family' => ['low' => 100, 'high' => 140],
            'meal_plans'      => ['hb' => 20,   'fb' => 40],
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
        // Tumeongeza validation za family room na meal plans
        $request->validate([
            'standard_double_low'  => 'required|numeric|min:0',
            'standard_double_high' => 'required|numeric|min:0',
            'standard_triple_low'  => 'required|numeric|min:0',
            'standard_triple_high' => 'required|numeric|min:0',
            'standard_family_low'  => 'required|numeric|min:0',
            'standard_family_high' => 'required|numeric|min:0',
            'hb_price'             => 'required|numeric|min:0',
            'fb_price'             => 'required|numeric|min:0',
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
            'standard_family' => [
                'low'  => (int) $request->input('standard_family_low'),
                'high' => (int) $request->input('standard_family_high'),
            ],
            'meal_plans' => [
                'hb'  => (int) $request->input('hb_price'),
                'fb'  => (int) $request->input('fb_price'),
            ],
        ];

        file_put_contents($this->pricingFile(), json_encode($pricing, JSON_PRETTY_PRINT));

        return redirect()->route('admin.pricing')->with('success', 'Bei zimehifadhiwa!');
    }
}