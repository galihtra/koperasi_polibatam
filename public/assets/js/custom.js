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

"use strict";
