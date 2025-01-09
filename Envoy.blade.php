@servers(['local' => ['127.0.0.1']])

@task('test', ['on' => 'local'])
{{--    ls -a--}}

    @if($branch)
        echo {{$branch}}
    @endif
@endtask

@story('deploy')
    test
    lint
    migrate
@endstory

@task('test')
    echo 'Start testing...'
    sleep 1
    echo 'Tests are successful!'
@endtask

@task('lint')
    echo 'Checking code...'
    sleep 1
    echo 'Code are fine!'
@endtask

@task('migrate')
    php artisan migrate
@endtask
