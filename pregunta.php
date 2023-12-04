<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Preguntas</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="agregarfaqs.php">
                <h2 class="mb-4">Formulario de Preguntas</h2>
                <div class="mb-3">
                    <label for="pregunta" class="form-label">Haz tu pregunta:</label>
                    <textarea class="form-control" name="pregunta" rows="4" cols="50" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar pregunta</button>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
