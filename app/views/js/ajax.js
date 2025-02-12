const AjaxForms = document.querySelectorAll(".AjaxForm");

AjaxForms.forEach((forms) => {
  forms.addEventListener("submit", function (e) {
    e.preventDefault();

    Swal.fire({
      title: "¿Deseas realiza esta Acción?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");

        let header = new Headers();

        let config = {
          method: method,
          headers: header,
          mode: "cors",
          cache: "no-cache",
          body: data,
        };

        fetch(action, config)
          .then((response) => response.json())
          .then((response) => {
            return ajaxAlert(response);
          });
      }
    });
  });
});

function ajaxAlert(alert) {
  if (alert.type == "simple") {
    Swal.fire({
      icon: alert.icon,
      title: alert.title,
      text: alert.text,
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#3085d6",
    });
  } else if (alert.type == "reload") {
    Swal.fire({
      icon: alert.icon,
      title: alert.title,
      text: alert.text,
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#3085d6",
    }).then((result) => {
      if (result.isConfirmed) {
        location.reload();
      } 
    });
  } else if (alert.type == "clean") {
    Swal.fire({
      icon: alert.icon,
      title: alert.title,
      text: alert.text,
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#3085d6",
    }).then((result) => {
      if (result.isConfirmed) {
       document.querySelector(".AjaxForm").reset();
      }
    });
  } else if (alert.type == "redirect") {
      window.location.href=alert.url;
  }
}

// let exitButton = document.getElementById("logoutButton");
// exitButton.addEventListener("click", function (e) {
//   e.preventDefault();

//   Swal.fire({
//     title: "¿Deseas salir del Sistema?",
//     icon: "question",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     confirmButtonText: "Aceptar",
//     cancelButtonText: "Cancelar",
//   }).then((result) => {
//     if (result.isConfirmed) {
//       let url = this.getAttribute("href");
//       window.location.href = url;
//     }
//   });
// });
