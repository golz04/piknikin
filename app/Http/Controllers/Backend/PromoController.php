<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Promo;
use App\Models\PromoComment;

class PromoController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function lpIndex(){
        try {
            $this->param['getPromo'] = Promo::all();

            return view('backend.pages.promo-list.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpAdd(){
        try {
            return view('backend.pages.promo-list.add');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpStore(Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'date_post' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'description' => 'required',
                'period_booked_start' => 'required',
                'period_booked_end' => 'required',
                'period_depart_start' => 'required',
                'period_depart_end' => 'required',
                'term_and_condition' => 'required',
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
                'period_booked_start' => 'Periode Boking Mulai',
                'period_booked_end' => 'Periode Boking Selesai',
                'period_depart_start' => 'Periode Berangkat Mulai',
                'period_depart_end' => 'Periode Berangkat Selesai',
                'term_and_condition' => 'Syarat dan Ketentuan'
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $promo = new Promo();
            $promo->title = $request->title;
            $promo->slug = \Str::slug($random.'-'.$request->title);
            $promo->date_post = $request->date_post;
            if ($request->file('thumbnail')) {
                $request->file('thumbnail')->move('assets/upload/promo', $date.$random.$request->file('thumbnail')->getClientOriginalName());
                $promo->thumbnail = $date.$random.$request->file('thumbnail')->getClientOriginalName();
            } else {
                $promo->thumbnail = 'default.jpg';
            }
            $promo->description = $request->description;
            $promo->period_booked_start = $request->period_booked_start;
            $promo->period_booked_end = $request->period_booked_end;
            $promo->period_depart_start = $request->period_depart_start;
            $promo->period_depart_end = $request->period_depart_end;
            $promo->term_and_condition = $request->term_and_condition;
            $promo->save();
            

            return redirect('/admin/promo/list-promo')->withStatus('Berhasil menambahkan promo baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpEdit(Promo $promo){
        try {
            $this->param['getDetailPromo'] = Promo::find($promo->id);
            $this->param['getCommentPromo'] = PromoComment::where('promo_id', $promo->id)->get();

            return view('backend.pages.promo-list.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpUpdate(Promo $promo, Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'date_post' => 'required',
                'description' => 'required',
                'period_booked_start' => 'required',
                'period_booked_end' => 'required',
                'period_depart_start' => 'required',
                'period_depart_end' => 'required',
                'term_and_condition' => 'required',
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
                'period_booked_start' => 'Periode Boking Mulai',
                'period_booked_end' => 'Periode Boking Selesai',
                'period_depart_start' => 'Periode Berangkat Mulai',
                'period_depart_end' => 'Periode Berangkat Selesai',
                'term_and_condition' => 'Syarat dan Ketentuan'
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $promo = Promo::find($promo->id);
            $promo->title = $request->title;
            $promo->slug = \Str::slug($random.'-'.$request->title);
            $promo->date_post = $request->date_post;

            if ($request->file('thumbnail')) {
                $promoPath = 'assets/upload/promo/';
                File::delete($promoPath.$promo->thumbnail);

                $request->file('thumbnail')->move('assets/upload/promo', $date.$random.$request->file('thumbnail')->getClientOriginalName());
                $promo->thumbnail = $date.$random.$request->file('thumbnail')->getClientOriginalName();
            }

            $promo->description = $request->description;
            $promo->period_booked_start = $request->period_booked_start;
            $promo->period_booked_end = $request->period_booked_end;
            $promo->period_depart_start = $request->period_depart_start;
            $promo->period_depart_end = $request->period_depart_end;
            $promo->term_and_condition = $request->term_and_condition;
            $promo->save();
            

            return redirect('/admin/promo/list-promo')->withStatus('Berhasil memperbarui promo baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpdrop(Promo $promo){
        try {
            $promoPath = 'assets/upload/promo/';
            File::delete($promoPath.$promo->thumbnail);
            PromoComment::where('promo_id', $promo->id)->delete();
            Promo::find($promo->id)->delete();

            return redirect('/admin/promo/list-promo')->withStatus('Berhasil menghapus promo.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpcIndex(){
        try {
            // $this->param['getCommentPromo'] = PromoComment::all();
            $this->param['getCommentPromo'] = \DB::table('promo_comments')
                                                    ->select('promos.title', 'promo_comments.*')
                                                    ->join('promos', 'promo_comments.promo_id', 'promos.id')
                                                    ->get();
            $this->param['getPromo'] = Promo::all();
            $this->param['getCountCommentPromo'] = PromoComment::where('status', 'belum dibaca')->count();

            return view('backend.pages.promo-comment.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpcStore(Request $request){
        $this->validate($request,
            [
                'promo' => 'required',
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
                'promo' => 'Promo',
                'full_name' => 'Nama Lengkap',
                'email' => 'Surel',
                'message' => 'Pesan',
                'status' => 'Status',
            ],
        );
        try {
            $promoComment = new PromoComment();
            $promoComment->promo_id = $request->promo;
            $promoComment->name = $request->full_name;
            $promoComment->email = $request->email;
            $promoComment->message = $request->message;
            $promoComment->status = $request->status;
            $promoComment->save();
            

            return redirect('/admin/promo/list-comment-promo')->withStatus('Berhasil menambahkan komentar promo baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpcUpdate(PromoComment $promoComment, Request $request){
        try {
            $promoComment = PromoComment::find($promoComment->id);
            $promoComment->status = 'sudah dibaca';
            $promoComment->save();
            

            return redirect('/admin/promo/list-comment-promo')->withStatus('Berhasil memperbarui komentar promo.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpcDrop(PromoComment $promoComment){
        try {
            PromoComment::find($promoComment->id)->delete();

            return redirect('/admin/promo/list-comment-promo')->withStatus('Berhasil menghapus komentar promo.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpcAll(Request $request){
        try {
            PromoComment::where('status', 'belum dibaca')->update([
                'status' => 'sudah dibaca'
            ]);

            return redirect('/admin/promo/list-comment-promo')->withStatus('Berhasil memperbarui komentar promo.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
