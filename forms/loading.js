function loading() {
    document.querySelector(".php-email-form").addEventListener("submit", function (event) {
      // Evitar la recarga de la página
      event.preventDefault();
  
      // Mostrar el mensaje y el elemento de carga
      document.getElementById("message").classList.remove("ocultar");
      document.getElementById("loading").classList.remove("ocultar");
  
      // Obtener los datos del formulario
      const formData = new FormData(this);
  
      // Realizar la solicitud POST al servidor
      fetch("https://formsubmit.co/f20b23daa80c2760a7b74656a054d79d", {
        method: "POST",
        body: formData,
      })
      .then(response => response.json()) // Puedes usar .text() si el servidor devuelve un texto en lugar de JSON
      .then(data => {
        // Aquí puedes manejar la respuesta del servidor
        console.log("Respuesta del servidor:", data);
  
        // Puedes agregar más lógica según la respuesta del servidor
      })
      .catch(error => {
        // Manejar errores de la solicitud
        console.error("Error al enviar el formulario:", error);
      })
      .finally(() => {
        // Ocultar el mensaje y el elemento de carga después de la operación
        document.getElementById("message").classList.add("ocultar");
        document.getElementById("loading").classList.add("ocultar");
  
        // Puedes reiniciar el formulario después de enviar los datos si es necesario
        this.reset();
      });
    });
  }
  
  // Llama a la función loading al cargar la página
  loading();
  