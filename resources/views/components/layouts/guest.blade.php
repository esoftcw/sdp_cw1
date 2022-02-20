<x-layouts.master :guest="true">
    <div class="login-logo">
        <a href="/">Pick & Go</a>
    </div>
    <div class="card">
        <div class="card-body">
            @if($title)
                <p class="login-box-msg">{{$title}}</p>
            @endif
            {{$slot}}
        </div>
    </div>
</x-layouts.master>
