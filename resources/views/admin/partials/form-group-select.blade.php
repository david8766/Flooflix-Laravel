<div class="form-group">
    <p>{{ $title }}</p>
    <select name="{{ $name }}" id="{{ $name }}" class="custom-select">
        @forelse ( $$name as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @empty
            <option value="">{{ $empty }}</option>
        @endforelse
    </select>   
</div>
