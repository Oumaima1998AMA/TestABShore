@extends('layouts.app')

@section('content')
    <h1>Add New Task</h1>

    <div id="success-message"></div>

    <form id="task-form" action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

 


        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
