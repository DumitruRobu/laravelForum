@extends("layouts.app")

@section("content")
    <div id="profilulUtilizatorului">
        <h4>Profilul utilizatorului {{$user->nume}}</h4>
        <img id="avatarImgs" src="{{$user->imagine}}">
        <p id="username">Nume: <strong>{{$user->nume}}</strong></p>
        <p id="username">Gen: <strong>{{$user->gen}}</strong></p>
        <p id="username">Statut: <strong>
                @if($user->imputerniciri_id === 1)
                    user
                @elseif($user->imputerniciri_id === 2)
                    moderator
                @elseif($user->imputerniciri_id === 3)
                    administrator
                @elseif($user->imputerniciri_id === 4)
                    owner
                @else

                @endif
            </strong></p>

        <span id="username">Interese:
                <ul><strong>
                    @foreach($subiecteFin as $s)
                       <li> {{$s}} </li>
                    @endforeach
                    </strong>
                </ul>
        </span>

        <div>
            <a href="/items"> <button> All items page </button> </a>
            <a href="{{route('MainController.editItem', ["idElDeEditat"=>$user->id])}}"> <button> Edit </button> </a>

            <a href="{{route('MainController.deleteItem', ["idElDeSters"=>$user->id])}}"> <button> Delete</button> </a>
        </div>

    </div>
@endsection
