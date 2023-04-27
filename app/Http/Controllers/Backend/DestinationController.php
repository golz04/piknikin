<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Destination;

class DestinationController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        try {
            $this->param['getDestination'] = Destination::all();

            return view('backend.pages.destination.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'image_destination' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'status' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'image_destination' => 'Gambar Wisata',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $destination = new Destination();
            if($request->caption == '' || $request->caption == null){
                $destination->name = '-';
            } else {
                $destination->name = $request->caption;
            }
            if ($request->file('image_destination')) {
                $request->file('image_destination')->move('assets/upload/destination', $date.$random.$request->file('image_destination')->getClientOriginalName());
                $destination->image = $date.$random.$request->file('image_destination')->getClientOriginalName();
            } else {
                $destination->image = 'default.jpg';
            }
            $destination->status = $request->status;
            $destination->save();
            

            return redirect('/admin/destination')->withStatus('Berhasil menambahkan destinasi baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function edit(Destination $destination){
        try {
            $this->param['getDetailDestination'] = Destination::find($destination->id);

            return view('backend.pages.destination.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function update(Request $request, Destination $destination){
        $this->validate($request,
            [
                'status' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'status' => 'status',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $destination = Destination::find($destination->id);
            if($request->caption == '' || $request->caption == null){
                $destination->name = '-';
            } else {
                $destination->name = $request->caption;
            }
            if ($request->file('image_destination')) {
                $destinationPath = 'assets/upload/destination/';
                File::delete($destinationPath.$destination->image);

                $request->file('image_destination')->move('assets/upload/destination', $date.$random.$request->file('image_destination')->getClientOriginalName());
                $destination->image = $date.$random.$request->file('image_destination')->getClientOriginalName();
            }
            $destination->status = $request->status;
            $destination->save();
            

            return redirect('/admin/destination')->withStatus('Berhasil memperbarui destinasi.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function drop(Destination $destination){
        try {
            $destinationPath = 'assets/upload/destination/';
            File::delete($destinationPath.$destination->image);
            Destination::find($destination->id)->delete();

            return redirect('/admin/destination')->withStatus('Berhasil menghapus destinasi.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
