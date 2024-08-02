@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tâches</h1>
        
        <form action="{{ route('tasks.index') }}" method="GET" class="mb-4">
            <div class="form-row">
                <div class="col">
                    <select name="project_id" class="form-control">
                        <option value="">-- Filtrer par Projet --</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="status" class="form-control">
                        <option value="">-- Filtrer par Statut --</option>
                        <option value="To Do" {{ request('status') == 'To Do' ? 'selected' : '' }}>To Do</option>
                        <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Done" {{ request('status') == 'Done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </div>
            </div>
        </form>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">Créer une Tâche</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Projet</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->project->name }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection