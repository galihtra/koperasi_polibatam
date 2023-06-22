<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Email Notification</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <style>
        .email-notification {
            background-color: #f5f5f5;
            border-radius: 8px;
            padding: 20px;
        }

        .notification-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .notification-heading {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .summary-section {
            margin-bottom: 20px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .summary-label {
            color: #333;
        }

        .summary-value {
            color: #888;
        }

        .track-order {
            text-align: center;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #F2D230;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #4b5661;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-primary" style="widows: 18rem;">
                            <div class="card-header justify-content-center">
                                <img src="https://i.postimg.cc/8chrwwtM/koperasi-polibatam-png.png" alt="logo"
                                    width="300">
                                {{-- <h4>Register</h4> --}}
                            </div>

                            <div class="card-body">
                                <div class="email-notification">
                                    <div class="notification-content">
                                        <h5 class="text-bold mb-4">Pinjaman Konsumtif Khusus Anda Telah
                                            Disetujui dan Dikirim.</h5>

                                        <div class="summary-section">
                                            <div class="summary-item">
                                                <span class="summary-label">Nomor Rekening BNI</span>
                                                <span class="summary-value">{{ $emailData['no_rek_bni'] }}</span>
                                            </div>

                                            <div class="summary-item">
                                                <span class="summary-label">Jumlah yang Harus Dibayarkan per
                                                    Bulan</span>
                                                <span class="summary-value">Rp
                                                    {{ number_format($emailData['amount_per_month'], 0, ',', '.') }}</span>
                                            </div>

                                            <div class="summary-item">
                                                <span class="summary-label">Durasi Waktu Pembayaran</span>
                                                <span class="summary-value">{{ $emailData['duration'] }} Bulan</span>
                                            </div>

                                            <div class="summary-item">
                                                <span class="summary-label">Total Pinjaman</span>
                                                <span class="summary-value">Rp
                                                    {{ number_format($emailData['amount'], 0, ',', '.') }}</span>
                                            </div>
                                        </div>

                                        <div class="track-order">
                                            <a href="http://koperasi.test/" class="btn btn-primary">Kembali ke Dashboard</a>
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>
