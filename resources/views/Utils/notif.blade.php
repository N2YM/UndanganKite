
@foreach (['success', 'info', 'warning', 'danger'] as $status)
    @if (session()->has($status))
        <div class="alert alert-{{ $status }} alert-dismissible costum-alert" role="alert">
            <strong><i
                    class="icon fas fa-{{ $status === 'info' ? 'info' : ($status === 'warning' ? 'check' : ($status === 'danger' ? 'exclamation-triangle' : 'check')) }}"></i>
                Alert!</strong> {{ session($status) }}
        </div>
    @endif
@endforeach