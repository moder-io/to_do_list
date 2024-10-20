<?php $pageTitle = 'Crear Nueva Tarea'; ?>

<?php ob_start(); ?>

<h1 class="mb-4">Crear Nueva Tarea</h1>

<form action="index.php?action=create" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Título de la tarea</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción (opcional)</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Crear Tarea</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/../../layout.php'; ?>