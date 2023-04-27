<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestTour;
use App\Models\Destination;

class RequestTourController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        try {
            $this->param['getRequestTour'] = RequestTour::all();

            return view('backend.pages.request-tour.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function add(){
        try {
            $this->param['getDestination'] = Destination::all();

            return view('backend.pages.request-tour.add', $this->param);
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
                'date_departure' => 'required',
                'phone_number' => 'required',
                'destination' => 'required',
                'long_vacation' => 'required',
                'lodge' => 'required',
                'qty_participant' => 'required',
                'from' => 'required',
                'message' => 'required',
                'status' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'email' => 'Format surel tidak benar.',
            ],
            [
                'full_name' => 'Nama Lengkap',
                'email' => 'Surel',
                'date_departure' => 'Tanggal Pemberangkantan',
                'phone_number' => 'Nomor Telepon',
                'destination' => 'Destinasi',
                'long_vacation' => 'Lama Berlibur',
                'lodge' => 'Penginapan',
                'qty_participant' => 'Jumlah Peserta',
                'from' => 'Berangkat Dari',
                'message' => 'Pesan',
                'status' => 'Status',
            ],
        );
        try {
            $requestTour = new RequestTour();
            $requestTour->name = $request->full_name;
            $requestTour->email = $request->email;
            $requestTour->date_departure = $request->date_departure;
            $requestTour->phone_number = $request->phone_number;
            $requestTour->destination = implode(', ', $request->destination);
            $requestTour->long_vacation = $request->long_vacation;
            $requestTour->lodge = $request->lodge;
            $requestTour->qty_participant = $request->qty_participant;
            $requestTour->from = $request->from;
            $requestTour->message = $request->message;
            $requestTour->status = $request->status;
            $requestTour->save();

            return redirect('/admin/request-tour')->withStatus('Berhasil menambahkan request tour baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function detail(RequestTour $requestTour){
        try {
            $this->param['getDetailRequestTour'] = RequestTour::find($requestTour->id);

            return view('backend.pages.request-tour.detail', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function update(RequestTour $requestTour, Request $request){
        try {
            $requestTour = RequestTour::find($requestTour->id);
            $requestTour->status = $request->status;
            $requestTour->save();

            return redirect('/admin/request-tour')->withStatus('Berhasil memperbarui request tour.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function drop(RequestTour $requestTour){
        try {
            RequestTour::find($requestTour->id)->delete();

            return redirect('/admin/request-tour')->withStatus('Berhasil menghapus request tour.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
