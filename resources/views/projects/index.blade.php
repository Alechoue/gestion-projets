@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Liste des Projets</h1>
        <a href="{{route('projects.create')}}" class="btn btn-primary">Creer un Projet</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Date de debut</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{$project->name }}</td>
                        <td>{{$project->description }}</td>
                        <td>{{$project->start_date }}</td>
                        <td>{{$project->end_date}}</td>
                        <td>
                            <a href="{{route('projects.edit', $project->id)}}" class="btn btn-warning">Modifier</a>
                            <form action="{{route('projects.destroy', $project->id)}}" method="POST" style="display: inline-block;">
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