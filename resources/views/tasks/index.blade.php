<!DOCTYPE html>
<html>
<head>
    <title>Task App</title>
</head>
<body>

<h1>Task Manager</h1>

<form method="POST" action="/tasks">
    @csrf
    <input type="text" name="title" placeholder="New Task" required>
    <button>Add</button>
</form>

<hr>

@foreach($tasks as $task)
<div>
    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PATCH')
        <button>
            {{ $task->is_done ? '✔' : '❌' }}
        </button>
    </form>

    {{ $task->title }}

    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
</div>
@endforeach

</body>
</html>