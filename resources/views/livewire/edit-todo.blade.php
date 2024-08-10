<?php

use Livewire\Volt\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public Todo $todo;

    public function mount($todoId)
    {
        $todo = Todo::findOrFail($todoId);
        $this->authorize('view', $todo);
        $this->todo = $todo;
    }

    public function deleteTodo()
    {
        $this->authorize('delete', $this->todo);

        if ($this->todo->delete()) {
            session()->flash('message', 'Todo deleted successfully!');
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Failed to delete Todo.');
        }
    }
}; ?>

<div>
    <div wire:transition
        class="flex items-center justify-between p-4 m-auto mb-4 space-x-4 bg-white border border-gray-200 rounded-lg shadow-md">

        <div class="flex-1 text-lg font-medium text-gray-800">
            {{ $todo->name }}
        </div>
        <div class="flex-shrink-0 text-sm text-gray-400">
            Created by {{ $todo->user->name }}
        </div>

        <x-danger-button wire:click='deleteTodo' class="flex-shrink-0">Delete</x-danger-button>
    </div>
    <a href="{{ route('dashboard') }}" class="text-sm text-gray-400 underline hover:text-gray-600">
        ← Back to All Todos
    </a>

    @if (session()->has('message'))
        <div class="p-4 mt-4 text-green-800 bg-green-200 border border-green-300 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="p-4 mt-4 text-red-800 bg-red-200 border border-red-300 rounded-lg">
            {{ session('error') }}
        </div>
    @endif
</div>
