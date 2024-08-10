<?php

use Livewire\Volt\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public Todo $todo;
    public string $todoName = '';

    public function createTodo()
    {
        $this->validate([
            'todoName' => 'required|min:3',
        ]);

        Auth::user()
            ->todos()
            ->create([
                'name' => $this->pull('todoName'),
            ]);

        $this->todoName = ''; // Limpiar el campo de entrada
        session()->flash('message', 'Todo created successfully!');
    }

    public function deleteTodoConfirm(int $id)
    {
        $todo = Todo::findOrFail($id);
        $this->authorize('delete', $todo);

        if ($todo->delete()) {
            session()->flash('message', 'Todo deleted successfully!');
        } else {
            session()->flash('error', 'Failed to delete Todo.');
        }
    }

    public function with()
    {
        return [
            'todos' => Todo::with('user')->get(),
        ];
    }
}; ?>

<div class="max-w-2xl mx-auto">
    <form wire:submit='createTodo' class="flex items-center justify-between mb-8 space-x-4">
        <x-text-input wire:model.defer='todoName' placeholder="New Todo" class="flex-1 w-full" />
        <x-primary-button type="submit">Create</x-primary-button>
        <x-input-error :messages="$errors->get('todoName')" class="mt-2" />
    </form>

    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-800 bg-green-200 border border-green-300 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="p-4 mb-4 text-red-800 bg-red-200 border border-red-300 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    @foreach ($todos as $todo)
        <div wire:transition wire:key='{{ $todo->id }}'
            class="flex items-center justify-between p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-md">
            <a href="{{ route('todo', $todo->id) }}" class="flex items-center space-x-4">
                <div class="text-sm font-medium text-gray-800">
                    {{ $todo->name }}
                </div>
            </a>
            <div class="flex items-center space-x-4">
                <div class="text-xs text-gray-400">
                    {{ $todo->user->name }}
                </div>
                <x-danger-button wire:click='$emit("confirmDelete", {{ $todo->id }})' class="flex-shrink-0">Delete</x-danger-button>
            </div>
        </div>
    @endforeach
</div>

<script>
    Livewire.on('confirmDelete', id => {
        if (confirm('Are you sure you want to delete this Todo?')) {
            @this.call('deleteTodoConfirm', id);
        }
    });
</script>
