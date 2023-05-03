<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;
use App\Models\Feedback;

use Alert;

class AboutController extends Controller
{
    private $param;
    public function index(){
        try {
            $this->param['getTestimonial'] = Testimonial::all();

            return view('frontend.pages.about', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function feedback(Request $request){
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
            $feedback->status = 'belum dilihat';
            $feedback->save();
            
            Alert::success('Berhasil', 'Terima kasih telah memberikan kritik dan saran kepada kami.');

            return redirect('/about-us');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
