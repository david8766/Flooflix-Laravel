<div class="form-group">
    <select class="custom-select" name="{{$name_color}}">
    <option value="">Choisir une couleur</option>
    @foreach ($colors as $color)
    <option value="{{ $color->id }}" style="background-color: {{$color->rgb}}; opacity: {{$color->opacity}};">{{$color->name}}</option>
    @endforeach
    </select>
    <p class="mt-3">ou</p>
    <select class="custom-select" name="{{$name_picture}}">
    <option value="">Choisir une image</option>
    @foreach ($pictures as $picture)
    <option value="{{ $picture->id }}">{{ $picture->name }}</option>
    @endforeach
    </select>            
</div>