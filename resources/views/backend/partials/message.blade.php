@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">
            <i class="glyphicon glyphicon-remove"></i>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($messageError = Session::get('errorsMessage'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>{{ $messageError }}</strong>
    </div>
@endif