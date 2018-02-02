(function ($) {
    console.log($);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var body;
    $(function () {
        body = $('body');
        body.on('change', '.task .task-state', task_state);
        $('.collapse')
            .on('show.bs.collapse', function () {
                var $this = $(this),
                    trigger = $('[data-target="#' + $this.attr('id') + '"], a[href="#' + $this.attr('id') + '"]').find('.fa');
                console.log($this, trigger);
                trigger.removeClass('fa-angle-down');
                trigger.addClass('fa-angle-up');

            })
            .on('hide.bs.collapse', function () {
                var $this = $(this),
                    trigger = $('[data-target="#' + $this.attr('id') + '"], a[href="#' + $this.attr('id') + '"]').find('.fa');
                console.log($this, trigger);
                trigger.removeClass('fa-angle-up');
                trigger.addClass('fa-angle-down');
            });
    });

    function task_state() {
        var $this = $(this);
        $.post($this.data('state-url'))
            .done(function (resp) {
                if (resp.code === 200) {
                    if (resp.state !== $this.is(':checked')) {
                        body.off('change', '.task .task-state', task_state);
                        $this.prop('checked', resp.state);
                        body.on('change', '.task .task-state', task_state);
                    }
                    $this.parents('.task').find('.collapse').collapse(resp.state ? 'hide' : 'show');
                    var list = $this.parents('.taskgroup-list'),
                        done = true;
                    list.find('.task-state').each(function () {
                        if(!$(this).is(':checked')) {
                            done = false;
                        }
                    });
                    if(done) {
                        $this.parents('.taskgroup-body.collapse').collapse('hide');
                    }
                }
            });
    }
})(jQuery);