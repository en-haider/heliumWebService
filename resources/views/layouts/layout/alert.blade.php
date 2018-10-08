


@if(session('success'))
    <div class="alert alert-success no-border">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
		<span class="text-semibold">Well done!</span>  {{session('success')}} <a href="#" class="alert-link">this important</a> alert message.
	</div>
@endif


@if(session('info'))
    <div class="alert alert-success no-border">
    {session('info')}}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-success no-border">
    {session('danger')}}
    </div>
@endif


@if(session('warning'))
    <div class="alert alert-success no-border">
    {session('warning')}}
    </div>
@endif

