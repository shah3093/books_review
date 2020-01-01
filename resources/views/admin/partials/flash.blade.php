@if(session()->has('flash_message'))
<div class="alert alert-{{session()->get('flash_message_level')}} alert-dismissible alert-mg-b-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
    </button> {!! session()->get('flash_message') !!}
</div>
@endif
