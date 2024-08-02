@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $task->title }}</h1>
        <p><strong>Description :</strong> {{ $task->description }}</p>
        <p><strong>Statut :</strong> {{ $task->status }}</p>
        <p><strong>Projet :</strong> {{ $task->project->name }}</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Retour à la Liste</a>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
@endsection