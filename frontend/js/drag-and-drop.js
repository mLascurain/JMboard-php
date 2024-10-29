const draggables = document.querySelectorAll(".tarea");
const containers = document.querySelectorAll(".tareas-container");

draggables.forEach((draggable) => {
  draggable.addEventListener("dragstart", () => {
    draggable.classList.add("dragging");
  });
  draggable.addEventListener("dragend", () => {
    draggable.classList.remove("dragging");
  });
});

containers.forEach((container) => {
  container.addEventListener("dragover", (e) => {
    e.preventDefault();
    const draggable = document.querySelector(".dragging");
    const draggableId = draggable.id;
    const containerId = container.id;
    container.appendChild(draggable);
    console.log(containerId);
    updateTasks(draggableId, containerId);
  });
  container.addEventListener("dragleave", () => {
    container.classList.remove("drop-area");
  });
});

function updateTasks(draggableId, containerId) {
  fetch("../backend/update-tasks.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `tarea=${draggableId}&columna=${containerId}`,
  })
    .then((res) => res.text())
    .then((data) => {
      console.log("respuesta del servidor: ", data);
    })
    .catch((error) => {
      console.error("error al actualizar las tareas: ", error);
    });
}

document.addEventListener("DOMContentLoaded", () => {
  const tareas = document.querySelectorAll(".tarea");
  let columnaOrigen = null;

  tareas.forEach((tarea) => {
    // Capturar la columna origen en el dragstart
    tarea.addEventListener("dragstart", function (e) {
      columnaOrigen = this.closest(".tareas-container");
    });
  });

  const columnas = document.querySelectorAll(".columna");

  columnas.forEach((columna) => {
    const tareasContainer = columna.querySelector(".tareas-container");

    // Evento 'drop' para actualizar la columna destino
    tareasContainer.addEventListener("drop", function () {
      actualizarColumnas();
    });

    // Evento 'dragend' para actualizar la columna origen
    tareasContainer.addEventListener("dragend", function () {
      if (columnaOrigen) {
        actualizarColumnas();
      }
    });
  });
});

const container = document.querySelectorAll(".tareas-container");

function actualizarColumnas() {
  document.addEventListener("DOMContentLoaded", () => {
    const tareas = document.querySelectorAll(".tarea");

    tareas.forEach((tarea) => {
      // Aplicar la clase 'dragging' al comenzar a arrastrar
      tarea.addEventListener("dragstart", function (e) {
        this.classList.add("dragging");
      });

      // Eliminar la clase 'dragging' cuando termine el arrastre
      tarea.addEventListener("dragend", function () {
        this.classList.remove("dragging");
      });
    });

    // Otras funciones de drag-and-drop
  });
}
