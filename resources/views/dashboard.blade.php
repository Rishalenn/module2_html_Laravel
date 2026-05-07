<x-app-layout>

    <div class="bg-gray-950 min-h-screen pt-6">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <!-- Card -->
            <div class="bg-gray-900 overflow-hidden shadow-2xl sm:rounded-2xl p-8 border border-gray-800">

                <!-- Title -->
                <h1 class="text-4xl font-bold text-white mb-6">
                    📝 Task Manager
                </h1>

                <!-- Add Task -->
                <form method="POST"
                      action="/tasks"
                      class="flex gap-3 mb-6">

                    @csrf

                    <input type="text"
                           name="title"
                           placeholder="New Task"
                           class="bg-gray-800 border border-gray-700 text-white placeholder-gray-400 p-3 flex-1 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"
                           required>

                    <button class="bg-red-600 hover:bg-red-700 text-white px-6 rounded-lg transition">
                        Add
                    </button>

                </form>

                <!-- Tasks -->
                @foreach($tasks as $task)

                <div class="flex items-center justify-between border border-gray-700 bg-gray-800 p-3 rounded-lg mb-3">

                    <div class="flex items-center gap-3">

                        <!-- Toggle -->
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @csrf
                            @method('PATCH')

                            <button class="text-lg">
                                {{ $task->is_done ? '✔️' : '❌' }}
                            </button>
                        </form>

                        <!-- Title -->
                        <span class="text-lg text-white {{ $task->is_done ? 'line-through text-gray-500' : '' }}">
                            {{ $task->title }}
                        </span>

                    </div>

                    <!-- Delete -->
                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500 hover:text-red-400 transition">
                            Delete
                        </button>
                    </form>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</x-app-layout>