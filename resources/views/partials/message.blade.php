@if($errors->count())
    <div class="row justify-content-center alert alert-error mb-0 ms-auto" role="alert" id="alert-disappear">
        @foreach($errors->all() as $error)
        <p class="mb-0">{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(session('message'))
    <div class="row justify-content-center alert alert-success mb-0 ms-auto" role="alert" id="alert-disappear">
        <p class="mb-0">{{ session('message') }}</p>
    </div>
@endif
@if(session('verified'))
    <div class="row justify-content-center alert alert-success mb-0 ms-auto" role="alert" id="alert-disappear">Your email has been verified!</div>
@endif
@if(session('resent'))
    <div class="row justify-content-center alert alert-success mb-0 ms-auto" role="alert" id="alert-disappear">Verification email has been sent!</div>
@endif
