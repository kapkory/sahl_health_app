<script type="text/javascript">
    @if(session('force_redirect'))
        window.location.reload(true);
    @endif
    if(typeof jQuery == 'undefined'){
       window.location.reload(true);
    }
</script>
@if(session('message'))
    <div class="alert alert-{{ session('status') }}">{!! session('message') !!}</div>
@endif
<script type="text/javascript">
@if($notice = request()->session()->get('notice'))
@if($notice['type'] == 'warning')
        toastr.warning('{{ $notice['message'] }}');
    @elseif($notice['type'] == 'info')
    toastr.info('{{ $notice['message'] }}');
    @elseif($notice['type'] == 'error')
    toastr.error('{{ $notice['message'] }}');
    @elseif($notice['type'] == 'success')
    toastr.success('{{ $notice['message'] }}');
    @endif
@endif
</script>