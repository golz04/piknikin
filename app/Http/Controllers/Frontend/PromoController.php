<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Promo;
use App\Models\Packet;

class PromoController extends Controller
{
    private $param;
    public function index(){
        try {
            $this->param['getPromo'] = Promo::all();
            $this->param['getPacket'] = Packet::orderBy('created_at', 'desc')->limit(2)->get();

            return view('frontend.pages.promo', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function detail(){
        try {
            return view('frontend.pages.promo-detail');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
