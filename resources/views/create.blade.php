
@extends("layouts.app")

@section("content")
    <form id="createForm" action="{{route('MainController.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input value="{{old('nume')}}" type="text" name="nume" placeholder="nume">
            @error('nume')
                <p class="text-bg-danger">*{{$message}}</p>
            @enderror

        <input value="{{old('imagine')}}" type="text" name="imagine" placeholder="imagine">
            @error('imagine')
                <p class="text-bg-danger">*{{$message}}</p>
            @enderror


        <select name="gen">
            <option value="Masculin" {{ old('gen') === 'Masculin' ? 'selected' : '' }}>Masculin</option>
            <option value="Feminin" {{ old('gen') === 'Feminin' ? 'selected' : '' }}>Feminin</option>
        </select>
            @error('gen')
                <p class="text-bg-danger">*{{$message}}</p>
            @enderror


        <select name="imputerniciri_id">
        @foreach($toateImputernicirile as $t)
                <option value="{{$t->id}}" {{old('imputerniciri_id') == $t->id ? 'selected' : '' }}>{{$t->imputerniciri}}</option>
            @endforeach
        </select>
            @error('imputerniciri_id')
                <p class="text-bg-danger">*{{$message}}</p>
            @enderror

        <span>Interese: </span>
        <select name="subiecte[]" class="form-select" multiple aria-label="Multiple select example">
            @foreach($toateSubiectele as $t)
                <option value="{{$t->id}}" {{ in_array($t->id, old('subiecte', [])) ? "selected" : '' }}>{{$t->titlu}}</option>
            @endforeach
        </select>

            @error('subiecte')
                <p class="text-bg-danger">*{{$message}}</p>
            @enderror

        <button>Create</button>
    </form>
@endsection
