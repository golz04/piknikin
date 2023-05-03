<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rental;
use App\Models\RentalGalery;
use App\Models\RentalRating;
use App\Models\Testimonial;
use App\Models\Packet;

use Alert;

class RentalController extends Controller
{
    private $param;
    public function index(){
        try {
            $this->param['getRental'] = Rental::all();

            return view('frontend.pages.rental', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function detail($slug){
        try {
            $this->param['getDetail'] = Rental::where('slug', $slug)->first();
            $this->param['getGallery'] = RentalGalery::where('rental_id', $this->param['getDetail']->id)->get();
            $this->param['getRating'] = RentalRating::where('rental_id', $this->param['getDetail']->id)->get();
            $this->param['getTestimonial'] = Testimonial::all();
            $this->param['getPacket'] = Packet::orderBy('created_at', 'desc')->limit(3)->get();

            return view('frontend.pages.rental-detail', $this->param);
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
                'rating_accomodation' => 'required',
                'rating_meal' => 'required',
                'rating_destination' => 'required',
                'rating_transport' => 'required',
                'rating_money' => 'required',
                'rating_overall' => 'required',
                'message' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'email' => 'Format email tidak benar.',
            ],
            [
                'full_name' => 'Nama Lengkap',
                'email' => 'Surel',
                'rating_accomodation' => 'Rating Akomodasi',
                'rating_meal' => 'Rating Makanan',
                'rating_destination' => 'Rating Destinasi',
                'rating_transport' => 'Rating Kendaraan',
                'rating_money' => 'Rating Biaya',
                'rating_overall' => 'Rating Keseluruhan',
                'message' => 'Rating Pesan',
            ]
        );
        try {
            $this->param['rental'] = Rental::where('slug', $slug)->first();
            $url = '/rental/detail/'.$slug;
            // dd($request);
            $rentalRating = new RentalRating();
            $rentalRating->rental_id = $this->param['rental']->id;
            $rentalRating->name = $request->full_name;
            $rentalRating->email = $request->email;
            $rentalRating->accomodation = $request->rating_accomodation;
            $rentalRating->meal = $request->rating_meal;
            $rentalRating->destination = $request->rating_destination;
            $rentalRating->transport = $request->rating_transport;
            $rentalRating->value_for_money = $request->rating_money;
            $rentalRating->overall = $request->rating_overall;
            $rentalRating->message = $request->message;
            $rentalRating->status = 'belum dibaca';
            $rentalRating->save();

            Alert::success('Berhasil', 'Komentarmu akan di tampilkan dalam waktu 1x24 jam kedepan.');
            

            return redirect($url);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
