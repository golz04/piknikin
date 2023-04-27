<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        try {
            $this->param['getFeedback'] = Feedback::all();
            $this->param['getCountFeedback'] = Feedback::where('status', 'belum dilihat')->count();

            return view('backend.pages.feedback.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'full_name' => 'required',
                'email' => 'required|email',
                'feedback' => 'required',
                'message' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'email' => 'Format surel tidak sesuai.',
            ],
            [
                'full_name' => 'Nama Lengkap',
                'email' => 'Surel',
                'feedback' => 'Kritik & Saran',
                'message' => 'Pesan',
            ],
        );
        try {
            $feedback = new Feedback();
            $feedback->name = $request->full_name;
            $feedback->email = $request->email;
            $feedback->feedback = $request->feedback;
            $feedback->message = $request->message;
            $feedback->status = $request->status;
            $feedback->save();
            

            return redirect('/admin/feedback')->withStatus('Berhasil menambahkan kritik & saran baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function update(Feedback $feedback){
        try {
            $feedback = Feedback::find($feedback->id);
            $feedback->status = 'sudah dilihat';
            $feedback->save();
            

            return redirect('/admin/feedback')->withStatus('Berhasil memperbarui kritik & saran.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function drop(Feedback $feedback){
        try {
            Feedback::find($feedback->id)->delete();

            return redirect('/admin/feedback')->withStatus('Berhasil menghapus kritik & saran.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function all(Request $request){
        try {
            Feedback::where('status', 'belum dilihat')->update([
                'status' => 'sudah dilihat'
            ]);

            return redirect('/admin/feedback')->withStatus('Berhasil memperbarui kritik & saran.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
