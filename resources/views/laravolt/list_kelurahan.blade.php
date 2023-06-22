<label for="exampleInputEmail1">Kelurahan (sesuai KTP) <b class="text-danger">*</b></label>
{!! Form::select('kelu_ktp', $kelurahan, '', [
    'class' => 'form-control',
    'placeholder' => 'Pilih kelurahan',
    'id' => 'kelurahan_id',
]) !!}