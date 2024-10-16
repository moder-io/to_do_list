<?php require __DIR__ . '/../layout.php'; ?>

<h1>Lista de Tareas</h1>

<a href="index.php?action=create" class="btn btn-primary mb-3">Nueva Tarea</a>

<ul class="list-group">
    <?php foreach ($tasks as $task): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="<?= $task['completed'] ? 'text-muted' : '' ?>">
                <?= htmlspecialchars($task['title']) ?>
            </span>
            <div>
                <a href="index.php?action=toggle&id=<?= $task['id'] ?>&status=<?= $task['completed'] ? '0' : '1' ?>" class="btn btn-sm <?= $task['completed'] ? 'btn-success' : 'btn-secondary' ?>">
                    <?= $task['completed'] ? 'Completada' : 'Pendiente' ?>
                </a>
                <a href="index.php?action=delete&id=<?= $task['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">Eliminar</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>