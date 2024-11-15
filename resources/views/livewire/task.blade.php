<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <input type="text" wire:model="task.text" class="form-control" placeholder="Tarea...">
            @error('task.text')
                <div class="">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Hecha</th>
                <th scope="col">Tarea</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr class="border-b border-gray-200 {{$task->done ? 'bg-green-200' : ''}}">
                    <td class=""><input type="checkbox" wire:click="done({{$task->id}})" {{$task->done ? 'checked' : ''}}></td>
                    <td class=" {{$task->done ? 'line-through' : ''}}">{{$task->text}}</td>
                    <td class="">
                        <button wire:click="edit({{$task->id}})" type="button" class="">Editar</button>
                        <button wire:click="delete({{$task->id}})" type="button" class="">Eliminar</button>
                    </td>
                </tr>                
            @empty
                <h3>No existen tareas para mostrar.</h3>
            @endforelse
        </tbody>
    </table>
</div>
