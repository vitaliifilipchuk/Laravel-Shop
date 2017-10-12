@if(session()->has('success'))
    <div class="row">
        <div class="col-sm-3 col-md-4"></div>
        <div class="col-sm-6 col-md-4">
            <div id="charge-message" class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
        <div class="col-sm-3 col-md-4"></div>
    </div>
@endif