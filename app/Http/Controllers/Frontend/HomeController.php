<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Packet;
use App\Models\Destination;
use App\Models\Article;

class HomeController extends Controller
{
    private $param;
    public function index(){
        try {
            $this->param['getPacket'] = Packet::orderBy('created_at', 'desc')->limit(3)->get();
            $this->param['getDestination'] = Destination::where('status', 'tampilkan')->orderBy('created_at', 'desc')->limit(6)->get();
            $this->param['getArticle'] = Article::orderBy('created_at', 'desc')->limit(3)->get();

            return view('frontend.pages.home', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
