<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DependentDropdownController extends Controller
{
    public function index()
    {
        $provinsi = \Indonesia::allProvinces()->sortBy('name')->pluck('name', 'id');
        $route_get_kota = route('get.kota');
        $route_get_kecamatan = route('get.kecamatan');
        $route_get_kelurahan = route('get.kelurahan');

        return view('laravolt.tester', compact('provinsi', 'route_get_kota', 'route_get_kecamatan', 'route_get_kelurahan'));
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
}