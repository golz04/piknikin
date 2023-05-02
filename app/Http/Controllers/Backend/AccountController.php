<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    private $param;
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        try {
            $this->param['getUser'] = User::all();

            return view('backend.pages.account.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function add(){
        try {
            return view('backend.pages.account.add');
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
                'email' => 'required|email|unique:users',
                'password' => 'required|required_with:password_confirm|same:password_confirm',
                'password_confirm' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'email' => 'Format surel tidak benar.',
                'same' => 'Kata Sandi dan Konfirmasi Kata Sandi harus sama.',
                'unique' => 'Email sudah terdaftar.',
            ],
            [
                'full_name' => 'Nama Pengguna',
                'email' => 'Surel Pengguna',
                'password' => 'Kata Sandi',
                'password_confirm' => 'Konfirmasi Kata Sandi',
            ],
        );
        try {
            $account = new User();
            $account->name = $request->full_name;
            $account->email = $request->email;
            $account->email_verified_at = now();
            $account->password = bcrypt($request->password);
            $account->remember_token = \Str::random(60);
            $account->save();

            return redirect('/admin/account')->withStatus('Berhasil menambahkan akun baru.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function detail(User $user){
        try {
            $this->param['getDetailUser'] = User::find($user->id);

            return view('backend.pages.account.detail', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function reset(User $user){
        try {
            $account = User::find($user->id);
            $account->password = bcrypt('@piknikIn123');
            $account->updated_at = now();
            $account->save();

            return redirect('/admin/account')->withStatus('Berhasil mengatur ulang kata sandi akun.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function drop(User $user){
        try {
            User::find($user->id)->delete();

            return redirect('/admin/account')->withStatus('Berhasil menghapus akun.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function editProfile(){
        try {
            return view('backend.pages.account.edit-profile');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function saveProfile(Request $request){
        if($request->email == auth()->user()->email)
            {
                $this->validate($request,
                    [
                        'name' => 'required',
                        'password' => 'required'
                    ],
                    [
                        'required' => ':attribute harus diisi.',
                    ],
                    [
                        'name' => 'Nama Pengguna',
                        'password' => 'Kata Sandi Saat Ini',
                    ],
                );
            }
            else
            {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|min:6|max:32|unique:users',
                    'password' => 'required'
                ]);
            }

        try {
            $last_password = $request->password;
            if(\Hash::check($last_password, auth()->user()->password))
            {
                User::where('id', auth()->user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
                return redirect('/admin/dashboard')->withStatus('Berhasil Memperbarui Profil');
            }
            else
            {
                return redirect('/admin/dashboard')->withStatus('Gagal Memperbarui Profil');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function saveProfilePassword(Request $request){
        $request->validate([
            'new_password' => 'Required_with:confirm-password|same:confirm-password|min:8',
            'confirm-password' => 'min:8',
            'password' => 'Required'
        ]);
        
        try {
            $last_password = $request->password;
            if(\Hash::check($last_password, auth()->user()->password))
            {
                User::where('id', auth()->user()->id)->update([
                    'password' => bcrypt($request->new_password)
                ]);
                return redirect('/admin/dashboard')->withStatus('Berhasil Memperbarui Profil');
            }
            else
            {
                return redirect('/admin/dashboard')->withStatus('Gagal Memperbarui Profil');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
