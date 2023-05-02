<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Packet;

class ArticleController extends Controller
{
    private $param;
    public function index(){
        try {
            $this->param['getArticle'] = Article::all();
            $this->param['getPacket'] = Packet::orderBy('created_at', 'desc')->limit(2)->get();

            return view('frontend.pages.article', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function detail(){
        try {
            return view('frontend.pages.article-detail');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
