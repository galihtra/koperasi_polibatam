/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

    // document.addEventListener("DOMContentLoaded", function()) {
    //   var alamatTidakSesuaiKtp = document.getElementById("alamatTidakSesuaiKtp");
    //   var alamatTidakSesuaiKtpInp = document.getElementById("alamatTidakSesuaiKtpInp");

    //   alamatTidakSesuaiKtp.addEventListener('click', function() {
    //     if(alamatTidakSesuaiKtp.checked == true) {
    //       alamatTidakSesuaiKtpInp.display = "block";
    //     } else {
    //       alamatTidakSesuaiKtp.style.display = "none";
    //     }
    //   });
    // }

    function showAlamatInput() {
      var alamatTidakSesuaiKtp = document.getElementById("alamatTidakSesuaiKtp");
      var alamatTidakSesuaiKtpInp = document.getElementById("alamatTidakSesuaiKtpInp");
      
      if (alamatTidakSesuaiKtp.checked == true){
        alamatTidakSesuaiKtpInp.style.display = "none";
      } else {
        alamatTidakSesuaiKtpInp.style.display = "block";
      }
    }

    function showButtonRegister() {
      var konfimasiRegister = document.getElementById("konfimasiRegister");
      var konfimasiRegisterBtn = document.getElementById("konfimasiRegisterBtn");
      
      if (konfimasiRegister.checked == true){
        konfimasiRegisterBtn.style.display = "block";
      } else {
        konfimasiRegisterBtn.style.display = "none";
      }
    }

    function hideButtonIstriAnak(){
    var selectButton = document.getElementById("stat_kawin");
    var inputButton = document.getElementById("no_stat_kawin");

    selectButton.addEventListener("change", function() {
        if (selectButton.value === "Lajang") {
            inputButton.style.display = "none";
        } else {
            inputButton.style.display = "block";
        }
    });
    }


    function previewFoto(){
      const imageFoto = document.querySelector('#up_foto');
      const imgPreviewFoto = document.querySelector('.img-preview-foto');

      imgPreviewFoto.style.display = 'block';
      imgPreviewFoto.style.width = '600px';
      imgPreviewFoto.style.height = '300px';
      imgPreviewFoto.style.objectFit = 'cover';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(imageFoto.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreviewFoto.src = oFREvent.target.result;
      }
    }


    function previewKtp(){
      const imageKtp = document.querySelector('#up_fc_ktp');
      const imgPreviewKtp = document.querySelector('.img-preview-ktp');

      imgPreviewKtp.style.display = 'block';
      imgPreviewKtp.style.width = '600px';
      imgPreviewKtp.style.height = '300px';
      imgPreviewKtp.style.objectFit = 'cover';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(imageKtp.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreviewKtp.src = oFREvent.target.result;
      }
    }

    function previewIdCard(){
      const imageIdCard = document.querySelector('#up_id_card');
      const imgPreviewIdCard = document.querySelector('.img-preview-idCard');

      imgPreviewIdCard.style.display = 'block';
      imgPreviewIdCard.style.width = '600px';
      imgPreviewIdCard.style.height = '300px';
      imgPreviewIdCard.style.objectFit = 'cover';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(imageIdCard.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreviewIdCard.src = oFREvent.target.result;
      }
    }

    function previewTtd(){
      const imageTtd = document.querySelector('#up_ttd');
      const imgPreviewTtd = document.querySelector('.img-preview-ttd');

      imgPreviewTtd.style.display = 'block';
      imgPreviewTtd.style.width = '600px';
      imgPreviewTtd.style.height = '300px';
      imgPreviewTtd.style.objectFit = 'cover';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(imageTtd.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreviewTtd.src = oFREvent.target.result;
      }
    }



    // Untuk button lihat yang ada di user_candidate

    function lihatDataCalon(){
      document.getElementById('lihat-btn').addEventListener('click', function() {
        // Mengubah teks pada tombol
        this.innerHTML = 'Dilihat';
  
        // Mengubah warna pada tombol
        this.style.backgroundColor = '#28a745';
        this.style.borderColor = '#28a745';
  
        // Menambahkan class CSS pada tombol
        this.classList.add('text-white');
  
        // Mengirim request ajax ke server untuk menandai data sebagai sudah dilihat
        var xhr = new XMLHttpRequest();
        var url = "/lihat-data"; // ganti dengan URL endpoint Anda
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if(xhr.readyState == 4 && xhr.status == 200) {
            console.log("Data berhasil ditandai sebagai sudah dilihat.");
          } else {
            console.log("Terjadi kesalahan saat menandai data sebagai sudah dilihat.");
          }
        }
        var data = "id=123&_token={{ csrf_token() }}"; // ganti dengan data yang ingin Anda kirimkan
        xhr.send(data);
      });
    }
    

"use strict";
