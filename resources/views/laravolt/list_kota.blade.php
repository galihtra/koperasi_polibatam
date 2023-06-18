<label for="exampleInputEmail1">Kota <b class="text-danger">*</b></label>
<select name="kabu_ktp" id="city_id" class="form-control">
    <option value="">Pilih Kota</option>
    @foreach($kota as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
