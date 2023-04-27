<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        try {
            $this->param['getTestimonial'] = Testimonial::all();

            return view('backend.pages.testimonial.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function add(){
        try {
            return view('backend.pages.testimonial.add');
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
                'job' => 'required',
                'message' => 'required',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'full_name' => 'Nama Lengkap',
                'job' => 'Pekerjaan / Jabatan',
                'message' => 'Pesan',
                'avatar' => 'Foto',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $testimonial = new Testimonial();
            $testimonial->name = $request->full_name;
            $testimonial->job = $request->job;
            $testimonial->message = $request->message;
            if ($request->file('avatar')) {
                $request->file('avatar')->move('assets/upload/testimonial', $date.$random.$request->file('avatar')->getClientOriginalName());
                $testimonial->avatar = $date.$random.$request->file('avatar')->getClientOriginalName();
            } else {
                $testimonial->avatar = 'default.jpg';
            }
            $testimonial->save();
            

            return redirect('/admin/testimonial')->withStatus('Berhasil menambahkan testimoni baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function edit(Testimonial $testimonial){
        try {
            $this->param['getDetailTestimonial'] = Testimonial::find($testimonial->id);

            return view('backend.pages.testimonial.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function update(Request $request, Testimonial $testimonial){
        $this->validate($request,
            [
                'full_name' => 'required',
                'job' => 'required',
                'message' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'full_name' => 'Nama Lengkap',
                'job' => 'Pekerjaan / Jabatan',
                'message' => 'Pesan',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $testimonial = Testimonial::find($testimonial->id);
            $testimonial->name = $request->full_name;
            $testimonial->job = $request->job;
            $testimonial->message = $request->message;
            if ($request->file('avatar')) {
                $testimonialPath = 'assets/upload/testimonial/';
                File::delete($testimonialPath.$testimonial->avatar);

                $request->file('avatar')->move('assets/upload/testimonial', $date.$random.$request->file('avatar')->getClientOriginalName());
                $testimonial->avatar = $date.$random.$request->file('avatar')->getClientOriginalName();
            }
            $testimonial->save();
            

            return redirect('/admin/testimonial')->withStatus('Berhasil memperbarui testimoni.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function drop(Testimonial $testimonial){
        try {
            $testimonialPath = 'assets/upload/testimonial/';
            File::delete($testimonialPath.$testimonial->avatar);
            Testimonial::find($testimonial->id)->delete();

            return redirect('/admin/testimonial')->withStatus('Berhasil menghapus testimonial.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
