<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                <fieldset>
                    <legend>Form Wilayah</legend>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Provinsi</label>
                            {!! Form::select('provinsi', $provinsi, '', [
                                'class' => 'form-control',
                                'placeholder' => 'Pilih Provinsi',
                                'id' => 'province_id',
                            ]) !!}
                        </div>

                        <div class="form-group" id="form-kota">

                        </div>

                        <div class="form-group" id="form-kecamatan">

                        </div>

                        <div class="form-group" id="form-kelurahan">

                        </div>
                    </div>
                </fieldset>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('body').on('change', '#province_id', function() {
                let id = $(this).val();
                let route = "{{ $route_get_kota }}";

                $.ajax({
                    type: 'get',
                    url: route,
                    data: {
                        province_id: id
                    },
                    success: function(data) {
                        $('#form-kota').html(data);
                    }
                })
            })

            $('body').on('change', '#city_id', function() {
                let id = $(this).val();
                let route = "{{ $route_get_kecamatan }}";

                $.ajax({
                    type: 'get',
                    url: route,
                    data: {
                        city_id: id
                    },
                    success: function(data) {
                        $('#form-kecamatan').html(data);
                    }
                })
            })

            $('body').on('change', '#kecamatan_id', function() {
                let id = $(this).val();
                let route = "{{ $route_get_kelurahan }}";

                $.ajax({
                    type: 'get',
                    url: route,
                    data: {
                        kecamatan_id: id
                    },
                    success: function(data) {
                        $('#form-kelurahan').html(data);
                    }
                })
            })
        })
    </script>
</body>

</html>