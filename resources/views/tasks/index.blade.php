<!DOCTYPE html>
<html>
<head>
    <title>Task App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="bg-white shadow">
    <div class="max-w-5xl mx-auto flex justify-between items-center p-4">

        <a href="/dashboard" class="font-bold text-lg">
            Task Manager
        </a>

        <div class="flex items-center gap-6">

            <a href="/dashboard" class="text-blue-500">Dashboard</a>

            <a href="#" class="text-gray-600">Profile</a>

            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="text-red-500">
                    Logout
                </button>
            </form>

        </div>

    </div>
</div>

<div class="flex justify-center mt-10">

    <div class="w-full max-w-xl bg-white p-6 rounded shadow text-center">

        <h1 class="text-2xl font-bold mb-1">Task Manager</h1>

        <p class="text-sm text-gray-500 mb-4">
            Add a new task
        </p>

        <form method="POST" action="/tasks" class="flex gap-2 mb-4">
            @csrf

            <input type="text"
                   name="title"
                   placeholder="New Task"
                   class="border p-2 flex-1 rounded"
                   required>

            <button class="bg-blue-500 text-white px-4 rounded">
                Add
            </button>
        </form>

        <div class="text-left">
            @foreach($tasks as $task)
                <div class="flex items-center justify-between p-2 border rounded mb-2">

                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @csrf
                        @method('PATCH')

                        <button>
                            {{ $task->is_done ? '✔' : '❌' }}
                        </button>
                    </form>

                    <span class="{{ $task->is_done ? 'line-through text-gray-400' : '' }}">
                        {{ $task->title }}
                    </span>

                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500">
                            Delete
                        </button>
                    </form>

                </div>
            @endforeach
        </div>

        <p class="text-sm text-gray-600 mt-6">
            You are logged in as: <strong>{{ auth()->user()->email }}</strong>
        </p>

    </div>

</div>

<div class="text-center text-sm text-gray-500 mt-10 mb-6">
    © 2026 Task Manager App. All rights reserved.
</div>

</body>
</html>