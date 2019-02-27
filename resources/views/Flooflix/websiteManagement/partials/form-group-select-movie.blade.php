<div class="form-group displayComboBox" >
    <label for="{{$name}}" class="font-alfa azure">{{ __('Rechercher le film dans la liste')}}</label>
    <input type="text" name="{{$name}}" class="form-control displayEditField" id="comboBoxEditField{{$number}}">
    <select disabled="disabled" name="{{$name}}" class="form-control hideComboBoxList" id="comboBoxList{{$number}}">
        @foreach ($movies as $id => $movie)
        <option value="{{ $id }}">{{ $movie->title }}</option>
        @endforeach
    </select>
</div>