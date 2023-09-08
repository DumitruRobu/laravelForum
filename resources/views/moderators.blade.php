@extends("layouts.app")

@section("content")
    <h1>All the forum's moderators are:</h1>
    <div id="moderatorsContent">
        @foreach($allModerators as $a)
            <div id="userModerator">

                <a href="{{ route('MainController.displayItem', ["id"=> $a->id])}}">
                    <img id="avatarImgs" src="{{$a->imagine}}">
                    <p id="username"><strong>{{$a->nume}}</strong></p>
                    <p>MODERATOR</p>
                </a>
            </div>
        @endforeach
    </div>
@endsection
