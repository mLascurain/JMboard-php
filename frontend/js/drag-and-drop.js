const draggables = document.querySelectorAll(".tarea");
const containers = document.querySelectorAll(".tareas-container");

draggables.forEach(draggable =>{
  draggable.addEventListener('dragstart', () => {
    draggable.classList.add('dragging');
  })
  draggable.addEventListener('dragend', () => {
    draggable.classList.remove('dragging');
  })   
})

containers.forEach(container => {
  container.addEventListener('dragover', e => {
    e.preventDefault();
    const draggable = document.querySelector('.dragging');
    const draggableId = draggable.id;
    const containerId = container.id;
    container.appendChild(draggable);
    console.log(containerId);
    updateTasks(draggableId, containerId);
    }); 
  container.addEventListener('dragleave',()=>{
    container.classList.remove('drop-area');
  })
}) 

function updateTasks(draggableId, containerId){
  fetch('../backend/update-tasks.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body:`tarea=${draggableId}&columna=${containerId}`
    })
    .then(res=>res.text())
    .then(data=>{
        console.log("respuesta del servidor: ", data);
      })
    .catch(error=> {
        console.error("error al actualizar las tareas: ", error);
      })
}
