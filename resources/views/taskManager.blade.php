<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .completed {
      text-decoration: line-through;
      color: rgb(208, 88, 142);
    }
  </style>
</head>
<body class="bg-amber-600">
  <div class="container mt-5">
    <h2 class="text-center mb-4">📝 Task Manager</h2>

    <!-- Alert Area -->
    <div id="alertBox"></div>

    <!-- Task Input -->
    <div class="input-group mb-3">
      <input type="text" id="taskInput" class="form-control" placeholder="Enter a new task">
      <button class="btn btn-primary" id="addTaskBtn">Add Task</button>
    </div>

    <!-- Task Count -->
    <p><strong>Total Tasks:</strong> <span id="taskCount">0</span></p>

    <!-- Task List -->
    <ul class="list-group" id="taskList"></ul>
  </div>

  <!-- JavaScript -->
  <script>
    const taskInput = document.getElementById('taskInput');
    const addTaskBtn = document.getElementById('addTaskBtn');
    const taskList = document.getElementById('taskList');
    const taskCount = document.getElementById('taskCount');
    const alertBox = document.getElementById('alertBox');

    let tasks = JSON.parse(localStorage.getItem('tasks')) || [];

    function updateTaskCount() {
      taskCount.textContent = tasks.length;
    }

    function saveTasks() {
      localStorage.setItem('tasks', JSON.stringify(tasks));
    }

    function showAlert(message, type) {
      alertBox.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      `;
    }

    function createTaskElement(taskObj, index) {
      const li = document.createElement('li');
      li.className = 'list-group-item d-flex justify-content-between align-items-center';

      const span = document.createElement('span');
      span.textContent = taskObj.text;
      span.style.cursor = 'pointer';
      if (taskObj.completed) {
        span.classList.add('completed');
      }

      const deleteBtn = document.createElement('button');
      deleteBtn.className = 'btn btn-danger btn-sm';
      deleteBtn.textContent = 'Delete';

      // Toggle completed
      span.addEventListener('click', () => {
        tasks[index].completed = !tasks[index].completed;
        saveTasks();
        renderTasks();
      });

      // Delete task
      deleteBtn.addEventListener('click', () => {
        tasks.splice(index, 1);
        saveTasks();
        renderTasks();
        showAlert('Task deleted!', 'warning');
      });

      li.appendChild(span);
      li.appendChild(deleteBtn);

      return li;
    }

    function renderTasks() {
      taskList.innerHTML = '';
      tasks.forEach((task, index) => {
        const taskItem = createTaskElement(task, index);
        taskList.appendChild(taskItem);
      });
      updateTaskCount();
    }

    addTaskBtn.addEventListener('click', () => {
      const taskText = taskInput.value.trim();
      if (taskText === '') {
        showAlert('Please enter a task.', 'danger');
        return;
      }

      tasks.push({ text: taskText, completed: false });
      saveTasks();
      renderTasks();
      taskInput.value = '';
      showAlert('Task added successfully!', 'success');
    });

    // Initial render on page load------------------------------
    renderTasks();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
