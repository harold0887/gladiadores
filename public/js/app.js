/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

//import Swal from "sweetalert2";
$(function () {
  collapseWhite();
  showModalLoad();
  confirmDeleteUser();
  confirmDeleteMembership();
  autoplay();
  mostrarComentarios();

  //$("#payment-info").modal("show");
  //$("#datetimepicker").datetimepicker();
});

function showModalLoad() {
  //activar modal al enviar, se cierra al retornar controlador
  $("#create-user-admin,#edit-user-admin,#edit-user-profile,#create-membership-admin").submit(function (e) {
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
      confirmButtonText: "Si, eliminar!"
    }).then(function (result) {
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
      confirmButtonText: "Si, eliminar!"
    }).then(function (result) {
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
    $(".collapse").on("show.bs.collapse", function () {
      $(this).closest("#navbar-transparent,#navbar-transparent-admin").removeClass("navbar-transparent").addClass("bg-white");
    }).on("hide.bs.collapse", function () {
      $(this).closest("#navbar-transparent,#navbar-transparent-admin").addClass("navbar-transparent").removeClass("bg-white");
    });
  }
}
Livewire.on("reload", function () {
  setTimeout("location.reload()", 2000);
});
Livewire.on("error", function ($message) {
  swal("¡error!", $message["message"], "error");
});
Livewire.on("success", function ($message) {
  swal("¡Buen trabajo!", $message["message"], "success");
});
Livewire.on("confirmarCancelacion", function ($message) {
  Swal.fire({
    title: "Cancelar la suscripción ?",
    text: $message["message"],
    type: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, cancelar suscripción!"
  }).then(function (result) {
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
    button: false
  });
});
Livewire.on("warning", function ($message) {
  text = $message["message"] + "<b>" + $message["message1"] + "</b>";
  Swal.fire({
    title: "Error !",
    html: text,
    type: "warning",
    showCancelButton: false
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
    confirmButtonText: "Si, remover permisos!"
  }).then(function (result) {
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
    confirmButtonText: "Si, autorizar!"
  }).then(function (result) {
    if (result.value) {
      Livewire.emit("authorizeAdmin", $data["id"]);
    }
  });
});
Livewire.on("confirmMembershipRegister", function ($data) {
  Swal.fire({
    title: "Registrar ?",
    html: $data["message"] + "</br></br>Fecha de inicio: " + $data["date"] + "</br></br> Frecuencia: " + $data["frecuencia"] + "</br></br>Precio: <b>" + $data["price"] + "</b> MXN",
    //icon: "info",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, registrar!"
  }).then(function (result) {
    if (result.value) {
      Livewire.emit("addSubscription", $data["id"], $data["date"]);
    }
  });
});
Livewire.on("activeDatePicker", function () {
  initDateTimePicker();
});
Livewire.on("confirmPayment", function ($data) {
  Swal.fire({
    title: "Ingresa la cantidad recibida.",
    input: "text",
    showCancelButton: true,
    confirmButtonText: "Confirmar pago",
    cancelButtonText: "Cancelar",
    inputValidator: function inputValidator(cantida) {
      // Si el valor es válido, debes regresar undefined. Si no, una cadena
      if (!cantida) {
        return "Por favor ingresa la cantidad";
      } else {
        return undefined;
      }
    }
  }).then(function (resultado) {
    if (resultado.value) {
      var cantida = resultado.value;
      //alert(cantida+'.00');
      Livewire.emit("setPayment", cantida, $data["id"]);
    }
  });
});
Livewire.on("ConfirmCancelOrder", function ($data) {
  swal({
    title: "¿Realmente quiere cancelar esta orden de pago ? ",
    //type: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!"
  }).then(function (result) {
    if (result.value) {
      Livewire.emit("cancelOrder", $data["id"]);
    }
  });
});
Livewire.on("confirm-user-add-membreship", function () {
  $("#payment-info").modal("show");
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

//slider
function autoplay() {
  $(".lazy").slick({
    autoplay: true,
    lazyLoad: "ondemand",
    // ondemand progressive anticipated
    infinite: true,
    dots: true,
    speed: 500,
    fade: true,
    cssEase: "linear",
    arrows: false
  });
  $(".coments-autoplay").slick({
    autoplay: true,
    autoplaySpeed: 2300,
    arrows: false,
    infinite: true,
    responsive: [{
      breakpoint: 2048,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 700,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
}
function mostrarComentarios() {
  $("#comments-show").click(function () {
    $("#comments-all").toggle();
    $("#comments-slick").toggle();
    autoplay();
  });
}

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;