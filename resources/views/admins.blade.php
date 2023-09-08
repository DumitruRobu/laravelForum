@extends("layouts.app")

@section("content")
    <h1>All the forum's admins are:</h1>
    <div id="moderatorsContent">
        @foreach($allAdmins as $a)
            <div id="userModerator">
              <a href="{{ route('MainController.displayItem', ["id"=> $a->id])}}">
                    <img id="avatarImgs" src="{{$a->imagine}}">
                    <p id="username"><strong>{{$a->nume}}</strong></p>
                    <p>ADMIN</p>
                </a>
            </div>
        @endforeach
    </div>
@endsection
