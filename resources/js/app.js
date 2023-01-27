$(function () {
  collapseWhite();
  showModalLoad();
  confirmDeleteUser()
});

function showModalLoad() {
  //activar modal al enviar, se cierra al retornar controlador
  $("#create-user-admin,#edit-user-admin").submit(function (e) {
    $("#modal-spinner").modal("show");
  });
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
  swal.fire("Error!", $message["message"], "error");
});

Livewire.on("success-auto-close", function ($message) {
  swal({
    title: "¡Buen trabajo!",
    text: $message["message"],
    type: "success",
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

Livewire.on("success-fixed", function ($message) {
  Swal.fire("¡Buen trabajo!", $message["message"], "success");
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
