<?php $pageTitle = 'Lista de Tareas'; ?>

<?php ob_start(); ?>

<h1 class="mb-4">Lista de Tareas</h1>

<a href="index.php?action=create" class="btn btn-primary mb-3">Nueva Tarea</a>

<?php if (empty($tasks)): ?>
    <p class="alert alert-info">No hay tareas disponibles. ¡Crea una nueva tarea para comenzar!</p>
<?php else: ?>
    <ul class="list-group">
        <?php foreach ($tasks as $task): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="<?= $task['completed'] ? 'text-muted text-decoration-line-through' : '' ?>">
                    <?= htmlspecialchars($task['title']) ?>
                </span>
                <div>
                    <a href="index.php?action=toggle&id=<?= $task['id'] ?>&status=<?= $task['completed'] ? '0' : '1' ?>" 
                       class="btn btn-sm <?= $task['completed'] ? 'btn-success' : 'btn-secondary' ?>">
                        <?= $task['completed'] ? 'Completada' : 'Pendiente' ?>
                    </a>
                    <a href="index.php?action=delete&id=<?= $task['id'] ?>" 
                       class="btn btn-sm btn-danger" 
                       onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">
                        Eliminar
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/../../layout.php'; ?>