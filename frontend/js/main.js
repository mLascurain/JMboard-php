const $tareas = document.querySelectorAll(".tarea");

function abrirTarea(index) {
  setTimeout(function () {
    const $modal = document.getElementById(`edit-task-${index}`); // Ajuste en el índice
    if ($modal) {
      $modal.classList.toggle("-show");
    }
  }, 50);
}

function enviarForm(index) {
  const $form = document.getElementById(`edit-title-task-${index}`);
  $form.submit();
}

function editarTitulo(index) {
  const $title = document.getElementById(`title-task-${index}`);
  const $title_input = document.getElementById(`input-title-task-${index}`); // Ajuste en el índice
  if ($title) {
    $title.classList.toggle("-hidden");
    $title_input.classList.toggle("-show");
    $title_input.focus();
    if ($title_input.value) {
      $title.innerHTML = $title_input.value;
    }
  }
}
