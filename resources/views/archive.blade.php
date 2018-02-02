<div class="container">
    @foreach($user->taskGroupsWithTasks() as $group)
        <div class="row">
            <div class="col-8 offset-2 my-3">
                <div class="card taskgroup">
                    <div class="card-header">
                        {{ $group->title }}
                        <a href="#taskgroup-body-{{ $group->id }}" data-toggle="collapse" class="pull-right"
                           aria-expanded="{{ $group->allDone() ? 'false' : 'true' }}"><i
                                    class="fa fa-angle-{{ $group->allDone() ? 'down' : 'up' }}"></i></a>
                    </div>
                    <div class="collapse {{ $group->allDone() ? '' : 'show' }} taskgroup-body" id="taskgroup-body-{{ $group->id }}">
                        @if(!empty($group->description))
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">{{ $group->description }}</h6>
                            </div>
                        @endif
                        <ul class="list-group list-group-flush taskgroup-list">
                            @foreach($group->tasks as $task)
                                @include('single')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>