<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Tâche</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier une Tâche</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description">{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Statut</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminé" {{ $task->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
                </select>
            </div>
            <div class="form-group">
                <label for="due_date">Date d'échéance</label>
                <input type="date" name="due_date" class="form-control" id="due_date" value="{{ $task->due_date }}">
            </div>
            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select name="category_id" class="form-control" id="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
