<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Task extends Component
{
    public $tasks; // Lista de tareas
    public $task = ['text' => '', 'done' => false]; // Datos del formulario

    public function mount()
    {
        $this->tasks = TaskModel::orderBy('id', 'desc')->get();
    }

    public function edit(TaskModel $task)
    {
        $this->task = $task->toArray(); // Convierte el modelo a array para Livewire
    }

    public function done(TaskModel $task)
    {
        $task->update(['done' => !$task->done]);
        $this->tasks = TaskModel::orderBy('id', 'desc')->get();
    }

    public function save()
    {
        // Valida los datos antes de guardar
        $this->validate([
            'task.text' => 'required|max:40',
        ]);

        if (isset($this->task['id'])) {
            // Actualiza la tarea existente
            $existingTask = TaskModel::find($this->task['id']);
            if ($existingTask) {
                $existingTask->update($this->task);
            }
        } else {
            // Crea una nueva tarea
            TaskModel::create($this->task);
        }

        // Reinicia el formulario y actualiza la lista de tareas
        $this->task = ['text' => '', 'done' => false];
        $this->tasks = TaskModel::orderBy('id', 'desc')->get();

        $this->dispatch('taskSaved', 'Tarea guardada correctamente.');
    }

    public function delete($id)
    {
        $taskToDelete = TaskModel::find($id);

        if (!is_null($taskToDelete)) {
            $taskToDelete->delete();
            $this->tasks = TaskModel::orderBy('id', 'desc')->get();
            $this->dispatch('taskSaved', 'Tarea eliminada correctamente.');
        }
    }

    public function render()
    {
        return view('livewire.task');
    }
}

