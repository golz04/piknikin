<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Packet;
use App\Models\Destination;
use App\Models\RequestTour;

use Alert;

class TourPackageController extends Controller
{
    private $param;
    public function index(){
        try {
            $this->param['getPacket'] = Packet::all();
            return view('frontend.pages.tour-package', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function detail(){
        try {
            return view('frontend.pages.tour-package-detail');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function request(){
        try {
            $this->param['getDestination'] = Destination::all();

            return view('frontend.pages.tour-package-request', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function send(Request $request){
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
            $requestTour->status = 'menunggu';
            $requestTour->save();

            Alert::success('Berhasil', 'Berhasil melakukan request tour. Permintaan kamu sedang di proses, tunggu maksimal 1x24 jam tim kami menghubungi anda.');
            // Alert::toast('Berhasil melakukan request tour. Permintaan kamu sedang di proses, tunggu maksimal 1x24 jam tim kami menghubungi anda.', 'success');

            return redirect('/tour-packages/request');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
