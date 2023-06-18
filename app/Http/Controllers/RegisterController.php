<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $provinsi = \Indonesia::allProvinces()->sortBy('name')->pluck('name', 'id');
        $route_get_kota = route('get.kota');
        $route_get_kecamatan = route('get.kecamatan');
        $route_get_kelurahan = route('get.kelurahan');
        $title = 'Register';
        $active = 'register';
        return view('register.index2', compact('title', 'active', 'provinsi', 'route_get_kota', 'route_get_kecamatan', 'route_get_kelurahan'));
    }

    public function get_kota()
    {
        $province_id = request('province_id');
        $kota = \Indonesia::findProvince($province_id, ['cities'])->cities->sortBy('name')->pluck('name', 'id');
        return view('laravolt.list_kota', compact('kota'));
    }

    public function get_kecamatan()
    {
        $city_id = request('city_id');
        $kecamatan = \Indonesia::findCity($city_id, ['districts'])->districts->sortBy('name')->pluck('name', 'id');

        return view('laravolt.list_kecamatan', compact('kecamatan'));
    }

    public function get_kelurahan()
    {
        $kecamatan_id = request('kecamatan_id');
        $kelurahan = \Indonesia::findDistrict($kecamatan_id, ['villages'])->villages->sortBy('name')->pluck('name', 'id');

        return view('laravolt.list_kelurahan', compact('kelurahan'));
    }

    //  digunakan untuk menyimpan data ke basis data
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255'],
            'no_anggota' => ['nullable', 'max:255'],
            'no_ktp' => ['required', 'max:255'],
            'masa_berlaku_ktp' => ['required', 'max:255'],
            'gender' => ['required', 'max:255'],
            'tmpt_lahir' => ['required', 'max:255'],
            'tgl_lahir' => ['required', 'max:255'],
            'alamat_ktp' => ['required', 'max:255'],
            'prov_ktp' => ['required', 'max:255'],
            'kelu_ktp' => ['required', 'max:255'],
            'keca_ktp' => ['required', 'max:255'],
            'kabu_ktp' => ['required', 'max:255'],
            'kode_pos' => ['required', 'max:255'],
            'alamat_pri' => ['nullable', 'max:255'],
            'prov_pri' => ['nullable', 'max:255'],
            'kelu_pri' => ['nullable', 'max:255'],
            'keca_pri' => ['nullable', 'max:255'],
            'kabu_pri' => ['nullable', 'max:255'],
            'kode_pos_pri' => ['nullable', 'max:255'],
            'no_telp_rmh' => ['required', 'max:255'],
            'no_hp' => ['required', 'max:255'],
            'stat_tmpt_tgl' => ['required', 'max:255'],
            'tgl_tmpti' => ['required', 'max:255'],
            'pendd_akhir' => ['required', 'max:255'],
            'stat_kawin' => ['required', 'max:255'],
            'nama_istri_suami' => ['nullable', 'max:255'],
            'jml_anak' => ['nullable', 'max:255'],
            'nama_ibu_kdg' => ['required', 'max:255'],
            'npwp' => ['required', 'max:255'],
            'nama_ahli_waris' => ['nullable', 'max:255'],
            'hub_ahli_waris' => ['nullable', 'max:255'],
            'no_telp_ext_ktr' => ['required', 'max:255'],
            'nik' => ['required', 'max:255'],
            'no_rek_bni' => ['required', 'max:255'],
            'divisi' => ['required', 'max:255'],
            'tgl_msk_prsh' => ['required', 'max:255'],
            'stat_karyawan' => ['required', 'max:255'],
            'up_foto' => ['required', 'image', 'file', 'max:1024'],
            'up_fc_ktp' => ['required', 'image', 'file', 'max:1024'],
            'up_id_card' => ['required', 'image', 'file', 'max:1024'],
            'up_ttd' => ['required', 'image', 'file', 'max:1024'],
            'stat_akun' => ['nullable', 'max:255']
        ]);

        if ($request->file('up_foto')) {
            $validatedData['up_foto'] = $request->file('up_foto')->store('post-images', 'public');
        }

        if ($request->file('up_fc_ktp')) {
            $validatedData['up_fc_ktp'] = $request->file('up_fc_ktp')->store('post-images', 'public');
        }

        if ($request->file('up_id_card')) {
            $validatedData['up_id_card'] = $request->file('up_id_card')->store('post-images', 'public');
        }

        if ($request->file('up_ttd')) {
            $validatedData['up_ttd'] = $request->file('up_ttd')->store('post-images', 'public');
        }

        // if ($validatedData->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validatedData)
        //         ->withInput();

        // cara enkripsi dengan bcyrpt
        // $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['prov_ktp'] = $request->input('prov_ktp');
        $validatedData['kabu_ktp'] = $request->input('kabu_ktp');
        $validatedData['kelu_ktp'] = $request->input('kelu_ktp');
        $validatedData['keca_ktp'] = $request->input('keca_ktp');

        $user = User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull!, please login');
        if ($user->save()) {
            return redirect('/login')->with('success', 'Registrasi Berhasil, Tunggu persetujuan dari Admin');
        } else {
            return redirect()->back()->with('registerError', 'Registrasi gagal, Periksa kembali data yang Anda input.');
        }


        // return redirect('/login')->with('success', 'Registration successfull!, Please wait for admin approval');

    }


}