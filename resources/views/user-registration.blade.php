@extends('layout')


@section('content')

<!-- Newsletter Widget -->
<div class="newsletter-widget mb-70 col-12">
    <h4>Sign up to <br>our newsletter</h4>
    <form method="POST">
        <input type="text" name="name" placeholder="Name">
        @if($messages !== null && $messages->has('name'))
            @foreach($messages->get('name') as $message)
                <p style="color: #4efc03">{{$message}}</p>
            @endforeach
        @endif
        <input type="email" name="email" placeholder="Email">
        @if($messages !== null && $messages->has('email'))
            @foreach($messages->get('email') as $message)
                <p style="color: #4efc03">{{$message}}</p>
            @endforeach
        @endif
        <input type="password" name="password" placeholder="Password">
        @if($messages !== null && $messages->has('password'))
            @foreach($messages->get('password') as $message)
                <p style="color: #4efc03">{{$message}}</p>
            @endforeach
        @endif
        <input type="password" name="password_confirmation" placeholder="Confirm password">
        @if($messages !== null && $messages->has('password_confirmation'))
            @foreach($messages->get('password_confirmation') as $message)
                <p style="color: #4efc03">{{$message}}</p>
            @endforeach
        @endif
        <button type="submit" class="btn w-100">Sign up</button>
    </form>
</div>

@endsection