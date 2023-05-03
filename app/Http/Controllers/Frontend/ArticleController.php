<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Packet;

use Alert;

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

    public function detail($slug){
        try {
            $this->param['getDetail'] = Article::where('slug', $slug)->first();
            $this->param['getPacket'] = Packet::orderBy('created_at', 'desc')->limit(2)->get();
            $this->param['getComment'] = ArticleComment::where('article_id', $this->param['getDetail']->id)->get();
            $this->param['countComment'] = ArticleComment::where('article_id', $this->param['getDetail']->id)->count();

            return view('frontend.pages.article-detail', $this->param);
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
            $this->param['article'] = Article::where('slug', $slug)->first();
            $url = '/article/detail/'.$slug;

            $articleComment = new ArticleComment();
            $articleComment->article_id = $this->param['article']->id;
            $articleComment->name = $request->full_name;
            $articleComment->email = $request->email;
            $articleComment->message = $request->message;
            $articleComment->status = 'belum dibaca';
            $articleComment->save();
            
            Alert::success('Berhasil', 'Komentarmu akan di tampilkan dalam waktu 1x24 jam kedepan.');

            return redirect($url);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
