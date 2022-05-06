@if($errors->count())
    <div class="message is-error">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(session('message'))
    <div class="message">{{ session('message') }}</div>
@endif
@if(session('verified'))
    <div class="message">Your email has been verified!</div>
@endif
@if(session('resent'))
    <div class="message">Verification email has been sent!</div>
@endif
