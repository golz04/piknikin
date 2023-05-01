<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Packet;
use App\Models\PacketGalery;
use App\Models\PacketRating;

class PacketController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function lpaIndex(){
        try {
            $this->param['getPacket'] = Packet::all();

            return view('backend.pages.packet.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpaAdd(){
        try {
            return view('backend.pages.packet.add');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpaStore(Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'description' => 'required',
                'summary_and_detination' => 'required',
                'term_and_condition' => 'required',
                'schedule_and_activities' => 'required',
                'price_and_facilities' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'title' => 'Judul',
                'thumbnail' => 'Cover',
                'description' => 'Deskripsi',
                'summary_and_detination' => 'Ringkasan dan Tujuan Destinasi',
                'term_and_condition' => 'Syarat dan Ketentuan',
                'schedule_and_activities' => 'Jadwal dan Kegiatan',
                'price_and_facilities' => 'Harga dan Fasilitas',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $packet = new Packet();
            $packet->title = $request->title;
            $packet->slug = \Str::slug($random.'-'.$request->title);
            if ($request->file('thumbnail')) {
                $request->file('thumbnail')->move('assets/upload/packet', $date.$random.$request->file('thumbnail')->getClientOriginalName());
                $packet->thumbnail = $date.$random.$request->file('thumbnail')->getClientOriginalName();
            } else {
                $packet->thumbnail = 'default.jpg';
            }
            $packet->description = $request->description;
            $packet->summary_and_detination = $request->summary_and_detination;
            $packet->term_and_condition = $request->term_and_condition;
            $packet->schedule_and_activities = $request->schedule_and_activities;
            $packet->price_and_facilities = $request->price_and_facilities;
            $packet->save();
            

            return redirect('/admin/packet/list-packet')->withStatus('Berhasil menambahkan paket baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpaEdit(Packet $packet){
        try {
            $this->param['getDetailPacket'] = Packet::find($packet->id);
            $this->param['getGalleryPacket'] = PacketGalery::where('packet_id', $packet->id)->get();
            $this->param['getRatingPacket'] = PacketRating::where('packet_id', $packet->id)->get();

            return view('backend.pages.packet.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpaUpdate(Request $request, Packet $packet){
        $this->validate($request,
            [
                'title' => 'required',
                'description' => 'required',
                'summary_and_detination' => 'required',
                'term_and_condition' => 'required',
                'schedule_and_activities' => 'required',
                'price_and_facilities' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'title' => 'Judul',
                'description' => 'Deskripsi',
                'summary_and_detination' => 'Ringkasan dan Tujuan Destinasi',
                'term_and_condition' => 'Syarat dan Ketentuan',
                'schedule_and_activities' => 'Jadwal dan Kegiatan',
                'price_and_facilities' => 'Harga dan Fasilitas',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $packet = Packet::find($packet->id);
            $packet->title = $request->title;
            $packet->slug = \Str::slug($random.'-'.$request->title);

            if ($request->file('thumbnail')) {
                $packetPath = 'assets/upload/packet/';
                File::delete($packetPath.$packet->thumbnail);

                $request->file('thumbnail')->move('assets/upload/packet', $date.$random.$request->file('thumbnail')->getClientOriginalName());
                $packet->thumbnail = $date.$random.$request->file('thumbnail')->getClientOriginalName();
            }

            $packet->description = $request->description;
            $packet->summary_and_detination = $request->summary_and_detination;
            $packet->term_and_condition = $request->term_and_condition;
            $packet->schedule_and_activities = $request->schedule_and_activities;
            $packet->price_and_facilities = $request->price_and_facilities;
            $packet->save();
            

            return redirect('/admin/packet/list-packet')->withStatus('Berhasil memperbarui paket.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpaDrop(Packet $packet){
        try {
            $packetPath = 'assets/upload/packet/';
            File::delete($packetPath.$packet->thumbnail);
            PacketGalery::where('packet_id', $packet->id)->delete();
            PacketRating::where('packet_id', $packet->id)->delete();
            Packet::find($packet->id)->delete();

            return redirect('/admin/packet/list-packet')->withStatus('Berhasil menghapus paket.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpagIndex(){
        try {
            $this->param['getPacket'] = Packet::all();
            $this->param['getGalleryPacket'] = \DB::table('packet_galeries')
                                                    ->select('packets.title', 'packet_galeries.*')
                                                    ->join('packets', 'packet_galeries.packet_id', 'packets.id')
                                                    ->get();

            return view('backend.pages.packet-gallery.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpagStore(Request $request){
        $this->validate($request,
            [
                'packet' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ],
            [
                'required' => ':attribute harus diisi.',
                'image' => ':attribute hanya boleh gambar.',
                'mimes' => 'format yang boleh hanya jpeg,png,jpg,gif,svg.',
            ],
            [
                'packet' => 'Paket',
                'image' => 'Gambar Lainnya',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $packetGallery = new PacketGalery();
            $packetGallery->packet_id = $request->packet;

            if ($request->file('image')) {
                $request->file('image')->move('assets/upload/packet-gallery', $date.$random.$request->file('image')->getClientOriginalName());
                $packetGallery->image = $date.$random.$request->file('image')->getClientOriginalName();
            }

            if($request->caption == '' || $request->caption == null){
                $packetGallery->caption = '-';
            } else {
                $packetGallery->caption = $request->caption;
            }

            $packetGallery->save();
            

            return redirect('/admin/packet/list-gallery-packet')->withStatus('Berhasil menambahkan galeri paket baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpagEdit(PacketGalery $packetGallery){
        try {
            $this->param['getPacket'] = Packet::all();
            $this->param['getGalleryPacketDetail'] = PacketGalery::find($packetGallery->id);

            return view('backend.pages.packet-gallery.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpagUpdate(Request $request, PacketGalery $packetGallery){
        $this->validate($request,
            [
                'packet' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'packet' => 'Paket',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $packetGallery = PacketGalery::find($packetGallery->id);
            $packetGallery->packet_id = $request->packet;

            if ($request->file('image')) {
                $packetPath = 'assets/upload/packet-gallery/';
                File::delete($packetPath.$packetGallery->image);

                $request->file('image')->move('assets/upload/packet-gallery', $date.$random.$request->file('image')->getClientOriginalName());
                $packetGallery->image = $date.$random.$request->file('image')->getClientOriginalName();
            }

            if($request->caption == '' || $request->caption == null){
                $packetGallery->caption = '-';
            } else {
                $packetGallery->caption = $request->caption;
            }

            $packetGallery->save();
            

            return redirect('/admin/packet/list-gallery-packet')->withStatus('Berhasil memperbarui galeri paket.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lpagDrop(PacketGalery $packetGallery){
        try {
            $packetPath = 'assets/upload/packet-gallery/';
            File::delete($packetPath.$packetGallery->image);
            PacketGalery::find($packetGallery->id)->delete();

            return redirect('/admin/packet/list-gallery-packet')->withStatus('Berhasil menghapus paket.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lparIndex(){
        try {
            $this->param['getCountRatingPacket'] = PacketRating::where('status', 'belum dibaca')->count();
            $this->param['getPacket'] = Packet::all();
            $this->param['getRatingPacket'] = \DB::table('packet_ratings')
                                                    ->select('packets.title', 'packet_ratings.*')
                                                    ->join('packets', 'packet_ratings.packet_id', 'packets.id')
                                                    ->get();

            return view('backend.pages.packet-rating.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lparStore(Request $request){
        $this->validate($request,
            [
                'packet' => 'required',
                'full_name' => 'required',
                'email' => 'required|email',
                'accomodation' => 'required',
                'meal' => 'required',
                'destination' => 'required',
                'transport' => 'required',
                'value_for_money' => 'required',
                'overall' => 'required',
                'message' => 'required',
                'status' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'email' => 'Format email tidak benar.',
            ],
            [
                'packet' => 'Paket',
                'full_name' => 'Nama Lengkap',
                'email' => 'Surel',
                'accomodation' => 'Rating Akomodasi',
                'meal' => 'Rating Makanan',
                'destination' => 'Rating Destinasi',
                'transport' => 'Rating Kendaraan',
                'value_for_money' => 'Rating Biaya',
                'overall' => 'Rating Keseluruhan',
                'message' => 'Rating Pesan',
                'status' => 'Status',
            ],
        );
        try {
            $packetRating = new PacketRating();
            $packetRating->packet_id = $request->packet;
            $packetRating->name = $request->full_name;
            $packetRating->email = $request->email;
            $packetRating->accomodation = $request->accomodation;
            $packetRating->meal = $request->meal;
            $packetRating->destination = $request->destination;
            $packetRating->transport = $request->transport;
            $packetRating->value_for_money = $request->value_for_money;
            $packetRating->overall = $request->overall;
            $packetRating->message = $request->message;
            $packetRating->status = $request->status;
            $packetRating->save();
            

            return redirect('/admin/packet/list-rating-packet')->withStatus('Berhasil menambahkan rating paket baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lparUpdate(PacketRating $packetRating){
        try {
            $updateRating = PacketRating::find($packetRating->id);
            $updateRating->status = 'sudah dibaca';
            $updateRating->save();

            return redirect('/admin/packet/list-rating-packet')->withStatus('Berhasil memperbarui rating paket.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }


    public function lparDrop(PacketRating $packetRating){
        try {
            PacketRating::find($packetRating->id)->delete();

            return redirect('/admin/packet/list-rating-packet')->withStatus('Berhasil menghapus rating paket.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function lparAll(Request $request){
        try {
            PacketRating::where('status', 'belum dibaca')->update([
                'status' => 'sudah dibaca'
            ]);

            return redirect('/admin/packet/list-rating-packet')->withStatus('Berhasil memperbarui rating paket.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
