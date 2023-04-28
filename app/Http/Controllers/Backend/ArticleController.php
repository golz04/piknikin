<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Article;
use App\Models\ArticleComment;

class ArticleController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function laIndex(){
        try {
            $this->param['getArticle'] = Article::all();

            return view('backend.pages.article-list.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function laAdd(){
        try {
            return view('backend.pages.article-list.add');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function laStore(Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'date_post' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'description' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'title' => 'Judul',
                'date_post' => 'Tanggal Posting',
                'thumbnail' => 'Cover',
                'description' => 'Deskripsi',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $article = new Article();
            $article->title = $request->title;
            $article->slug = \Str::slug($random.'-'.$request->title);
            $article->date_post = $request->date_post;
            if ($request->file('thumbnail')) {
                $request->file('thumbnail')->move('assets/upload/article', $date.$random.$request->file('thumbnail')->getClientOriginalName());
                $article->thumbnail = $date.$random.$request->file('thumbnail')->getClientOriginalName();
            } else {
                $article->thumbnail = 'default.jpg';
            }
            $article->description = $request->description;
            $article->save();
            

            return redirect('/admin/article/list-article')->withStatus('Berhasil menambahkan artikel baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function laEdit(Article $article){
        try {
            $this->param['getDetailArticle'] = Article::find($article->id);
            $this->param['getCommentArticle'] = ArticleComment::where('article_id', $article->id)->get();

            return view('backend.pages.article-list.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function laUpdate(Article $article, Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'date_post' => 'required',
                'description' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'title' => 'Judul',
                'date_post' => 'Tanggal Posting',
                'description' => 'Deskripsi',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $article = Article::find($article->id);
            $article->title = $request->title;
            $article->slug = \Str::slug($random.'-'.$request->title);
            $article->date_post = $request->date_post;

            if ($request->file('thumbnail')) {
                $articlePath = 'assets/upload/article/';
                File::delete($articlePath.$article->thumbnail);

                $request->file('thumbnail')->move('assets/upload/article', $date.$random.$request->file('thumbnail')->getClientOriginalName());
                $article->thumbnail = $date.$random.$request->file('thumbnail')->getClientOriginalName();
            }

            $article->description = $request->description;
            $article->save();
            

            return redirect('/admin/article/list-article')->withStatus('Berhasil memperbarui artikel.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function ladrop(Article $article){
        try {
            $articlePath = 'assets/upload/article/';
            File::delete($articlePath.$article->thumbnail);
            ArticleComment::where('article_id', $article->id)->delete();
            Article::find($article->id)->delete();

            return redirect('/admin/article/list-article')->withStatus('Berhasil menghapus artikel.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lacIndex(){
        try {
            $this->param['getCommentArticle'] = \DB::table('article_comments')
                                                    ->select('articles.title', 'article_comments.*')
                                                    ->join('articles', 'article_comments.article_id', 'articles.id')
                                                    ->get();
            $this->param['getArticle'] = Article::all();
            $this->param['getCountCommentArticle'] = ArticleComment::where('status', 'belum dibaca')->count();

            return view('backend.pages.article-comment.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lacStore(Request $request){
        $this->validate($request,
            [
                'article' => 'required',
                'full_name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
                'status' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'email' => 'Format surel tidak sesuai.',
            ],
            [
                'article' => 'Artikel',
                'full_name' => 'Nama Lengkap',
                'email' => 'Surel',
                'message' => 'Pesan',
                'status' => 'Status',
            ],
        );
        try {
            $articleComment = new ArticleComment();
            $articleComment->article_id = $request->article;
            $articleComment->name = $request->full_name;
            $articleComment->email = $request->email;
            $articleComment->message = $request->message;
            $articleComment->status = $request->status;
            $articleComment->save();
            

            return redirect('/admin/article/list-comment-article')->withStatus('Berhasil menambahkan komentar artikel baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lacUpdate(ArticleComment $articleComment, Request $request){
        try {
            $articleComment = ArticleComment::find($articleComment->id);
            $articleComment->status = 'sudah dibaca';
            $articleComment->save();
            

            return redirect('/admin/article/list-comment-article')->withStatus('Berhasil memperbarui komentar artikel.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lacDrop(ArticleComment $articleComment){
        try {
            ArticleComment::find($articleComment->id)->delete();

            return redirect('/admin/article/list-comment-article')->withStatus('Berhasil menghapus komentar artikel.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lacAll(Request $request){
        try {
            ArticleComment::where('status', 'belum dibaca')->update([
                'status' => 'sudah dibaca'
            ]);

            return redirect('/admin/article/list-comment-article')->withStatus('Berhasil memperbarui komentar artikel.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
