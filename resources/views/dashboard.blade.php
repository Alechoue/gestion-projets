@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tableau de Bord</h1>
        @foreach($projects as $project)
            <h2>{{ $project->name }}</h2>
            <ul>
                @foreach($project->tasks as $task)
                    <li>{{ $task->title }} - {{ $task->status }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection