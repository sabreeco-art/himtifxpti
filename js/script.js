console.log("cek");

//Disable klik kanan => agar web tydack bisa di copy
/*document.addEventListener("contextmenu", function(e){
    e.preventDefault();
}, false);*/

//Animasi ScrollBar
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-100px";
  }
  prevScrollpos = currentScrollPos;
};

// const container = document.querySelector(".container-form"),
//   pwLihat = document.querySelectorAll(".lihatSembunyikanPW"),
//   pwFields = document.querySelectorAll(".password"),
//   signUp = document.querySelector(".signup-link"),
//   login = document.querySelector(".login-link");
// sukses = document.querySelectorAll(".login-succes");

//   code js buat melihat/menyembunyikan password dan untuk mengganti icon nys
// pwLihat.forEach((eyeIcon) => {
//   eyeIcon.addEventListener("click", () => {
//     pwFields.forEach((pwField) => {
//       if (pwField.type === "password") {
//         pwField.type = "text";

//         pwLihat.forEach((icon) => {
//           icon.classList.replace("uil-eye-slash", "uil-eye");
//         });
//       } else {
//         pwField.type = "password";

//         pwLihat.forEach((icon) => {
//           icon.classList.replace("uil-eye", "uil-eye-slash");
//         });
//       }
//     });
//   });
// });

// kode js buat merubah tampilan antara login dan sign up
// signUp.addEventListener("click", () => {
//   container.classList.add("active");
// });
// login.addEventListener("click", () => {
//   container.classList.remove("active");
// });

// sukses.addEventListener("click", () => {
//   container.classList.remove("active");
// });

// function toggleMobileMenu(menu) {
//   menu.classList.toggle("open");
//   console.log("button-berhasil");
// }
