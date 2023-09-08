@extends('layouts.admin')
@section('content')
    <div id="mainContent">
        <div id="contentCuUseri">
            @foreach($allInfo as $a)
                <div id="user">

                    <a href="{{ route('MainController.displayItem', ["id"=> $a->id])}}">
                        <img id="avatarImgsAdmin" src="{{$a->imagine}}">
                        <p id="username"><strong>{{$a->nume}}</strong></p>
                    </a>
                </div>
            @endforeach

        </div>


        <div id="tailWindPagination">
            {{--            {{$allInfo->links()}}--}}
            {{ $allInfo->appends(request()->input())->links() }}

        </div>

        <form action="{{route('MainController.items')}}" method="GET">
            <input type="text" name="name" placeholder="Search by name...">
            <button>Search</button>
        </form>

    </div>
@endsection
