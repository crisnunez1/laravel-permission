@if (session('info'))
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                {{ session('info') }}
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
