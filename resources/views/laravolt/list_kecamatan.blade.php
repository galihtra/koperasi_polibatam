<label for="exampleInputEmail1">Kecamatan (sesuai KTP) <b class="text-danger">*</b></label>
{!! Form::select('keca_ktp', $kecamatan, '', [
    'class' => 'form-control',
    'placeholder' => 'Pilih Kecamatan',
    'id' => 'kecamatan_id',
]) !!}