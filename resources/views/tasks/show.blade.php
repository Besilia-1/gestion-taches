
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Tâche</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Détails de la Tâche</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $task->id }}</td>
            </tr>
            <tr>
                <th>Titre</th>
                <td>{{ $task->title }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $task->description }}</td>
            </tr>
            <tr>
                <th>Statut</th>
                <td>{{ $task->status }}</td>
            </tr>
            <tr>
                <th>Date d'échéance</th>
                <td>{{ $task->due_date }}</td>
            </tr>
            <tr>
                <th>Catégorie</th>
                <td>{{ $task->category->name }}</td>
            </tr>
        </table>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Retour à la liste</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
