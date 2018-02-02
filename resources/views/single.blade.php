<li class="list-group-item task" id="task-{{ $task->id }}">
    <div class="form-check font-weight-bold">
        <input class="form-check-input input-lg task-state" type="checkbox" value="" name="task-state-{{ $task->id }}"
               id="task-state-{{ $task->id }}" data-state-url="{{ route('task.state', $task) }}"{{ $task->done ? ' checked' : '' }}>
        <label class="form-check-label" for="task-state-{{ $task->id }}">
            {{ $task->title }}
        </label>
        @if(!empty($task->description))
            <a href="#task-body-{{ $task->id }}" data-toggle="collapse" class="task-collapse pull-right"
               aria-expanded="{{ $task->done ? 'false' : 'true' }}"><i
                        class="fa fa-angle-{{ $task->done ? 'down' : 'up' }}"></i></a>
        @endif
    </div>
    @if(!empty($task->description))
        <div class="task-body mt-3 collapse {{ $task->done ? '' : 'show' }}" id="task-body-{{ $task->id }}">
            {!! $task->description !!}
        </div>
    @endif
</li>