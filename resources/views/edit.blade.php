
@extends("layouts.app")

@section("content")
   <form id="createForm" action="{{route('MainController.editamFinal', ["idElDeEditat" => $elementulDeEditat->id])}}" method="POST">
       @csrf
       <img src={{$elementulDeEditat->imagine}}>
       <input type="text" name="nume" placeholder="nume" value="{{$elementulDeEditat->nume}}">
           @error('nume')
           <p class="text-bg-danger">*{{$message}}</p>
           @enderror
       <input type="text" name="imagine" placeholder="imagine" value="{{$elementulDeEditat->imagine}}">
           @error('imagine')
           <p class="text-bg-danger">*{{$message}}</p>
           @enderror

       <select name="gen">
           <option {{"Masculin" === $elementulDeEditat->gen ? "selected" : "" }} value="Masculin">Masculin</option>
           <option {{"Feminin" === $elementulDeEditat->gen ? "selected" : "" }} value="Feminin">Feminin</option>
       </select>

       <span>Interese: </span>
       <select name="subiecte[]" class="form-select" multiple aria-label="Multiple select example">
           @foreach($toateSubiectele as $t)
               <option {{ $subiecteleUtilizatorului->contains('id', $t->id) ? "selected" : "" }} value="{{$t->id}}">{{$t->titlu}}</option>
           @endforeach
       </select>
           @error('subiecte')
           <p class="text-bg-danger">*{{$message}}</p>
           @enderror

       <select name="imputerniciri_id">
           @foreach($toateImputernicirile as $t)
               <option {{$elementulDeEditat->imputerniciri_id === $t->id ? "selected": "" }} value={{$t->id}}>{{$t->imputerniciri}}</option>
           @endforeach
       </select>

       <button>Edit</button>
   </form>
@endsection
