import Swal from "sweetalert2";
$(function () {
  collapseWhite();
  showModalLoad();
  confirmDeleteUser();
  confirmDeleteMembership();

 
  $('#datetimepicker').datetimepicker();


});





function showModalLoad() {
  //activar modal al enviar, se cierra al retornar controlador
  $("#create-user-admin,#edit-user-admin,#create-membership-admin").submit(
    function (e) {
      $("#modal-spinner").modal("show");
    }
  );
}

function confirmDeleteUser() {
  $(".show-alert-delete-user").click(function (event) {
    var form = $(this).closest("form");
    //var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
      title: "¿Realmente quiere eliminar el usuario ? ",
      //type: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar!",
    }).then((result) => {
      if (result.value) {
        form.submit();
      }
    });
  });
}

function confirmDeleteMembership() {
  $(".show-alert-delete-membership").click(function (event) {
    var form = $(this).closest("form");
    //var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
      title: "¿Realmente quiere eliminar la membresía ? ",
      //type: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar!",
    }).then((result) => {
      if (result.value) {
        form.submit();
      }
    });
  });
}

function collapseWhite() {
  // modificacion de  navbar
  //Esta es la original
  // if ($('.full-screen-map').length == 0 && $('.bd-docs').length == 0) {
  //   // On click navbar-collapse the menu will be white not transparent
  //   $('.collapse').on('show.bs.collapse', function() {
  //     $(this).closest('.navbar').removeClass('navbar-transparent').addClass('bg-white');
  //   }).on('hide.bs.collapse', function() {
  //     $(this).closest('.navbar').addClass('navbar-transparent').removeClass('bg-white');
  //   });
  // }

  //Esta es la nueva, se agrega ahora por id

  if ($(".full-screen-map").length == 0 && $(".bd-docs").length == 0) {
    // On click navbar-collapse the menu will be white not transparent
    $(".collapse")
      .on("show.bs.collapse", function () {
        $(this)
          .closest("#navbar-transparent,#navbar-transparent-admin")
          .removeClass("navbar-transparent")
          .addClass("bg-white");
      })
      .on("hide.bs.collapse", function () {
        $(this)
          .closest("#navbar-transparent,#navbar-transparent-admin")
          .addClass("navbar-transparent")
          .removeClass("bg-white");
      });
  }
}

Livewire.on("reload", function () {
  setTimeout("location.reload()", 2000);
});
Livewire.on("error", function ($message) {
  Swal.fire("¡error!", $message["message"], "error");
});

Livewire.on("success", function ($message) {
  Swal.fire("¡Buen trabajo!", $message["message"], "success");
});

Livewire.on("confirmarCancelacion", function ($message) {
  Swal.fire({
    title: "Cancelar la suscripción ?",
    text: $message["message"],
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, cancelar suscripción!",
  }).then((result) => {
    if (result.value) {
      Livewire.emit("CancelarSuscripcion");
    }
  });
});






Livewire.on("success-auto-close", function ($message) {
  Swal.fire({
    title: "¡Buen trabajo!",
    text: $message["message"],
    //type: "success",
    icon: "success",
    timer: 2000,
    button: false,
  });
});

Livewire.on("warning", function ($message) {
  text = $message["message"] + "<b>" + $message["message1"] + "</b>";

  Swal.fire({
    title: "Error !",
    html: text,
    type: "warning",
    showCancelButton: false,
  });
});

Livewire.on("removeAdminConfirm", function ($message) {
  Swal.fire({
    title: "Remover",
    text: $message["message"],
    icon: "error",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, remover permisos!",
  }).then((result) => {
    if (result.value) {
      Livewire.emit("removeAdmin", $message["id"]);
    }
  });
});

Livewire.on("confirmAdminRegister", function ($data) {
  Swal.fire({
    title: "Autorizar ?",
    text: $data["message"],
    //icon: "info",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, autorizar!",
  }).then((result) => {
    if (result.value) {
      Livewire.emit("authorizeAdmin", $data["id"]);
    }
  });
});

Livewire.on("confirmMembershipRegister", function ($data) {
  Swal.fire({
    title: "Registrar ?",
    html:
      $data["message"] +
      "</br></br>Fecha de inicio: " +
      $data["date"] +
      "</br></br> Frecuencia: " +
      $data["frecuencia"] +
      "</br></br>Precio: <b>" +
      $data["price"] +
      "</b> MXN",

    //icon: "info",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, registrar!",
  }).then((result) => {
    if (result.value) {
      Livewire.emit("addSubscription", $data["id"],$data["date"]);
    }
  });
});

Livewire.on("activeDatePicker", function () {
  initDateTimePicker();
});

// function initDateTimePicker() {


//     $("#dateMembership").datetimepicker({
//       format: "YYYY-MM-DD HH:mm:ss",
//       icons: {
//         time: "fa fa-clock-o",
//         date: "fa fa-calendar",
//         up: "fa fa-chevron-up",
//         down: "fa fa-chevron-down",
//         previous: "fa fa-chevron-left",
//         next: "fa fa-chevron-right",
//         today: "fa fa-screenshot",
//         clear: "fa fa-trash",
//         close: "fa fa-remove",
//       },
//     });


 


// }
