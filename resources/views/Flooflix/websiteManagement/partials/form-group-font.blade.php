<div class="form-group">
    <p>Sélectionner une police d'écriture :</p>
    <select class="custom-select" name="{{$name}}">
        <option value="">Choisir dans la liste</option>
        @foreach ($fonts as $font)
        <option value="{{ $font->id }}" style="font-family:{{$font->style}}; ">{{$font->name}}</option>
        @endforeach
    </select>
</div>