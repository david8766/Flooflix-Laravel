<div class="form-group">
    <p>Sélectionner une couleur au survol de la souris:</p>
    <select class="custom-select" name="{{$name}}">
        <option value="">Choisir dans la liste</option>
        @foreach ($colors as $color)
        <option value="{{ $color->id }}" style="background-color: {{$color->rgb}}; opacity: {{$color->opacity}};">{{ $color->name }}</option>
        @endforeach
    </select>
</div>