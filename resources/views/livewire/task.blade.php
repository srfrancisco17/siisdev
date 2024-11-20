<div>
    <style>
        .custom-check {
          transform: scale(1.5); /* Adjust the scale value to make the checkbox larger */
          transform-origin: top left; /* Ensures the checkbox scales from its top-left corner */
          cursor: pointer;
        }
    </style>    
    <form class="form" wire:submit.prevent="save">
        <div class="form-group">
            <label for="task">Tarea:</label>
            <input id="task" wire:model="task.text" class="form-control" placeholder="Tarea..."/>
            @error('task.text')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mb-2"><i class="bi bi-floppy"></i> Guardar</button>
    </form>

    <div class="card">
        <div class="card-header">
            Listado de tareas
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" >Hecha</th>
                        <th scope="col" style="width:70%">Tarea</th>
                        <th scope="col" style="width:20%">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr class="border-b border-gray-200 {{$task->done ? 'table-success' : ''}}">
                            <td><input type="checkbox" wire:click="done({{$task->id}})" {{$task->done ? 'checked' : ''}} class="custom-check"></td>
                            <td style="{{$task->done ? 'text-decoration: line-through;' : ''}}">{{$task->text}}</td>
                            <td>
                                <button wire:click="edit({{$task->id}})" type="button" class="btn btn-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button wire:click="delete({{$task->id}})" type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</button>
                            </td>
                        </tr>                
                    @empty
                        <h3>No existen tareas para mostrar.</h3>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</div>
