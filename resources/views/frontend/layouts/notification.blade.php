@if (session('success'))
    <div class="alert alert-success alert-dismissable fade show text-center"
        style="position: fixed;top: 50px;right: 20px; z-index: 999;">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        {{ session('success') }}
    </div>
@endif


@if (session('error'))
    <div class="alert alert-danger alert-dismissable fade show text-center "
        style="position: fixed;top: 50px;right: 20px; z-index: 999;">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        {{ session('error') }}
    </div>
@endif


