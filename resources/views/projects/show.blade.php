@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->name }}</h1>
        <p><strong>Description :</strong> {{ $project->description }}</p>
        <p><strong>Date de Début :</strong> {{ $project->start_date }}</p>
        <p><strong>Date de Fin :</strong> {{ $project->end_date }}</p>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Retour à la Liste</a>
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
@endsection