<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Rental;
use App\Models\RentalGalery;
use App\Models\RentalRating;

class RentalController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function lrIndex(){
        try {
            $this->param['getRental'] = Rental::all();

            return view('backend.pages.rental.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrAdd(){
        try {
            return view('backend.pages.rental.add');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrStore(Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'start_from' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'description' => 'required',
                'type_and_price' => 'required',
                'term_and_condition' => 'required',
                'faq' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'title' => 'Judul',
                'start_from' => 'Harga Mulai',
                'thumbnail' => 'Cover',
                'description' => 'Deskripsi',
                'type_and_price' => 'Tipe dan Harga',
                'term_and_condition' => 'Syarat dan Ketentuan',
                'faq' => 'Faq',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $rental = new Rental();
            $rental->title = $request->title;
            $rental->slug = \Str::slug($random.'-'.$request->title);
            $rental->start_from = $request->start_from;
            if ($request->file('thumbnail')) {
                $request->file('thumbnail')->move('assets/upload/rental', $date.$random.$request->file('thumbnail')->getClientOriginalName());
                $rental->thumbnail = $date.$random.$request->file('thumbnail')->getClientOriginalName();
            } else {
                $rental->thumbnail = 'default.jpg';
            }
            $rental->description = $request->description;
            $rental->type_and_price = $request->type_and_price;
            $rental->term_and_condition = $request->term_and_condition;
            $rental->faq = $request->faq;
            $rental->save();
            

            return redirect('/admin/rental/list-rental')->withStatus('Berhasil menambahkan rental baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrEdit(Rental $rental){
        try {
            $this->param['getDetailRental'] = Rental::find($rental->id);
            $this->param['getGalleryRental'] = RentalGalery::where('rental_id', $rental->id)->get();
            $this->param['getRatingRental'] = RentalRating::where('rental_id', $rental->id)->get();

            return view('backend.pages.rental.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrUpdate(Rental $rental, Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'start_from' => 'required',
                'description' => 'required',
                'type_and_price' => 'required',
                'term_and_condition' => 'required',
                'faq' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'title' => 'Judul',
                'start_from' => 'Harga Mulai',
                'description' => 'Deskripsi',
                'type_and_price' => 'Tipe dan Harga',
                'term_and_condition' => 'Syarat dan Ketentuan',
                'faq' => 'Faq',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $rental = Rental::find($rental->id);
            $rental->title = $request->title;
            $rental->slug = \Str::slug($random.'-'.$request->title);
            $rental->start_from = $request->start_from;

            if ($request->file('thumbnail')) {
                $rentalPath = 'assets/upload/rental/';
                File::delete($rentalPath.$rental->thumbnail);

                $request->file('thumbnail')->move('assets/upload/rental', $date.$random.$request->file('thumbnail')->getClientOriginalName());
                $rental->thumbnail = $date.$random.$request->file('thumbnail')->getClientOriginalName();
            }

            $rental->description = $request->description;
            $rental->type_and_price = $request->type_and_price;
            $rental->term_and_condition = $request->term_and_condition;
            $rental->faq = $request->faq;
            $rental->save();
            

            return redirect('/admin/rental/list-rental')->withStatus('Berhasil memperbarui rental.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrDrop(Rental $rental){
        try {
            $rentalPath = 'assets/upload/rental/';
            File::delete($rentalPath.$rental->thumbnail);
            RentalGalery::where('rental_id', $rental->id)->delete();
            RentalRating::where('rental_id', $rental->id)->delete();
            Rental::find($rental->id)->delete();

            return redirect('/admin/rental/list-rental')->withStatus('Berhasil menghapus rental.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrgIndex(){
        try {
            $this->param['getRental'] = Rental::all();
            $this->param['getGalleryRental'] = \DB::table('rental_galeries')
                                                    ->select('rentals.title', 'rental_galeries.*')
                                                    ->join('rentals', 'rental_galeries.rental_id', 'rentals.id')
                                                    ->get();

            return view('backend.pages.rental-gallery.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrgStore(Request $request){
        $this->validate($request,
            [
                'rental' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'rental' => 'Rental',
                'image' => 'Gambar Lainnya',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $rentalGallery = new RentalGalery();
            $rentalGallery->rental_id = $request->rental;

            if ($request->file('image')) {
                $request->file('image')->move('assets/upload/rental-gallery', $date.$random.$request->file('image')->getClientOriginalName());
                $rentalGallery->image = $date.$random.$request->file('image')->getClientOriginalName();
            }

            if($request->caption == '' || $request->caption == null){
                $rentalGallery->caption = '-';
            } else {
                $rentalGallery->caption = $request->caption;
            }

            $rentalGallery->save();
            

            return redirect('/admin/rental/list-gallery-rental')->withStatus('Berhasil menambahkan galeri rental baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrgEdit(RentalGalery $rentalGallery){
        try {
            $this->param['getRental'] = Rental::all();
            $this->param['getGalleryRentalDetail'] = RentalGalery::find($rentalGallery->id);

            return view('backend.pages.rental-gallery.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrgUpdate(Request $request, RentalGalery $rentalGallery){
        $this->validate($request,
            [
                'rental' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'rental' => 'Paket',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $rentalGallery = RentalGalery::find($rentalGallery->id);
            $rentalGallery->rental_id = $request->rental;

            if ($request->file('image')) {
                $rentalPath = 'assets/upload/rental-gallery/';
                File::delete($rentalPath.$rentalGallery->image);

                $request->file('image')->move('assets/upload/rental-gallery', $date.$random.$request->file('image')->getClientOriginalName());
                $rentalGallery->image = $date.$random.$request->file('image')->getClientOriginalName();
            }

            if($request->caption == '' || $request->caption == null){
                $rentalGallery->caption = '-';
            } else {
                $rentalGallery->caption = $request->caption;
            }

            $rentalGallery->save();
            

            return redirect('/admin/rental/list-gallery-rental')->withStatus('Berhasil memperbarui galeri rental.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lrgDrop(RentalGalery $rentalGallery){
        try {
            $rentalPath = 'assets/upload/rental-gallery/';
            File::delete($rentalPath.$rentalGallery->image);
            RentalGalery::find($rentalGallery->id)->delete();

            return redirect('/admin/rental/list-gallery-rental')->withStatus('Berhasil menghapus galeri rental.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
