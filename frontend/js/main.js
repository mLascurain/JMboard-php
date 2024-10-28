const $tareas = document.querySelectorAll(".tarea");

function abrirTarea(index_task, index_column) {
  const $modal = document.getElementById(
    `edit-task-${index_task}-${index_column}`
  ); // Ajuste en el índice
  if ($modal) {
    $modal.classList.toggle("-show");
  }
}

function enviarForm(index_task, index_column) {
  const $form = document.getElementById(
    `edit-title-task-${index_task}-${index_column}`
  );
  $form.submit();
}

function editarTitulo(index_task, index_column) {
  const $title = document.getElementById(
    `title-task-${index_task}-${index_column}`
  );
  const $title_input = document.getElementById(
    `input-title-task-${index_task}-${index_column}`
  ); // Ajuste en el índice
  if ($title) {
    $title.classList.toggle("-hidden");
    $title_input.classList.toggle("-show");
    $title_input.focus();
    if ($title_input.value) {
      $title.innerHTML = $title_input.value;
    }
  }
}

function invertirTareas(id_columna) {
  const container = document.getElementById(id_columna); // Obtener el contenedor de las tareas
  const tareas = Array.from(container.querySelectorAll(".tarea")); // Obtener todas las tareas

  // Invertir el orden de las tareas
  tareas.reverse();

  // Vaciar el contenedor y reinsertar las tareas en el nuevo orden
  container.innerHTML = "";
  tareas.forEach((tarea) => container.appendChild(tarea));
  console.log("Columna invertida: ", id_columna);
}
