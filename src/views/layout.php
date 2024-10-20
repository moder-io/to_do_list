<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Gestor de Tareas' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">Gestor de Tareas</a>
        </div>
    </nav>

    <div class="container">
        <?php if (isset($flashMessage)): ?>
            <div class="alert alert-<?= $flashMessage['type'] ?> alert-dismissible fade show" role="alert">
                <?= $flashMessage['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <?= $content ?? '' ?>
    </div>

    <footer class="mt-5 py-3 text-center">
        <div class="container">
            <span class="text-muted">© <?= date('Y') ?> Gestor de Tareas</span>
        </div>
    </footer>
</body>
</html>