const errorEmail = document.querySelector('#error-email');
const errorProfile = document.querySelector('#error-profile');



if(errorProfile !== null){
  toastr.error("<strong>Tolong lengkapi profil anda</strong>", "", {
     timeOut: 0,
     positionClass: "toast-bottom-right",
     containerId: "toast-bottom-right"
    })
}
if(errorEmail !== null){
  toastr.error("<strong>Tolong verifikasi email anda</strong>", "", {
    timeOut: 0,
    positionClass: "toast-bottom-right",
    containerId: "toast-bottom-right"
   })
}
