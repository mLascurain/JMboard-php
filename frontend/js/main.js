const $tareas = document.querySelectorAll(".tarea");

function abrirTarea(index_task, index_column) {
  const $modal = document.getElementById(
    `edit-task-${index_task}-${index_column}`
  ); // Ajuste en el índice
  if ($modal) {
    $modal.classList.toggle("-show");
  }
}

function enviarForm(index) {
  const $form = document.getElementById(
    `edit-title-task-${index_task}-${index_column}`
  );
  $form.submit();
}

function editarTitulo(index) {
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
