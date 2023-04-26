<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rental;
use App\Models\Packet;
use App\Models\Article;
use App\Models\Promo;
use App\Models\Testimonial;
use App\Models\Feedback;
use App\Models\Destination;
use App\Models\User;
use App\Models\RequestTour;

class DashboardController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        try {
            $this->param['countRental'] = Rental::count();
            $this->param['countPacket'] = Packet::count();
            $this->param['countArticle'] = Article::count();
            $this->param['countPromo'] = Promo::count();
            $this->param['countTestimonial'] = Testimonial::count();
            $this->param['countFeedback'] = Feedback::count();
            $this->param['countDestination'] = Destination::count();
            $this->param['countAdmin'] = User::count();
            $this->param['countRequestTourDone'] = RequestTour::where('status', 'selesai')->count();
            $this->param['countRequestTourAccept'] = RequestTour::where('status', 'diterima')->count();
            $this->param['countRequestTourReject'] = RequestTour::where('status', 'ditolak')->count();

            return view('backend.pages.dashboard.dashboard', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
