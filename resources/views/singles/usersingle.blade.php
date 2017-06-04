<div class="thumbnail clearfix">
    <a  href="/users/{{$user->id}}">
        <img src="/images/{{ $user->avatar }}" alt="profilepic" class="pull-left clearfix img-circle" style="width: 100px;height:100px;"></a>
    <div class="caption pull-left">
        <h2>
            <a href="/users/{{$user->id}}" style="text-decoration: none;  ">{{$user->username}}</a>
        </h2>
    </div>
</div>