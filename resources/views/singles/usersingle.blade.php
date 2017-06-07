<div class="thumbnail clearfix">
    <a  href="/users/{{$user->id}}">
        <img src="/images/{{ $user->avatar }}" alt="profilepic" class="pull-left clearfix img-circle" style="width: 100px; height: 100px;"></a>
    <div class="caption pull-left">
        <h4>
            <a href="/users/{{$user->id}}">{{$user->username}}</a>
            <h5 style="color: gray">Role: {{$user->role}}</h5>
            <h5 style="color: gray">Reputation: {{$user->reputation}}</h5>
        </h4>
    </div>
</div>
