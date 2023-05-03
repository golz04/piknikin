<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Promo;
use App\Models\PromoComment;
use App\Models\Packet;

use Alert;

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

    public function detail($slug){
        try {
            $this->param['getDetail'] = Promo::where('slug', $slug)->first();
            $this->param['getPacket'] = Packet::orderBy('created_at', 'desc')->limit(2)->get();
            $this->param['getComment'] = PromoComment::where('promo_id', $this->param['getDetail']->id)->get();
            $this->param['countComment'] = PromoComment::where('promo_id', $this->param['getDetail']->id)->count();

            return view('frontend.pages.promo-detail', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function comment(Request $request, $slug){
        $this->validate($request,
            [
                'full_name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'email' => 'Format surel tidak sesuai.',
            ],
            [
                'full_name' => 'Nama Lengkap',
                'email' => 'Surel',
                'message' => 'Pesan',
            ],
        );
        try {
            $this->param['promo'] = Promo::where('slug', $slug)->first();
            $url = '/promo/detail/'.$slug;

            $promoComment = new PromoComment();
            $promoComment->promo_id = $this->param['promo']->id;
            $promoComment->name = $request->full_name;
            $promoComment->email = $request->email;
            $promoComment->message = $request->message;
            $promoComment->status = 'belum dibaca';
            $promoComment->save();
            
            Alert::success('Berhasil', 'Komentarmu akan di tampilkan dalam waktu 1x24 jam kedepan.');

            return redirect($url);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
