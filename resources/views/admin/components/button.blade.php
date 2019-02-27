<div class="row mt-4 mb-4 text-align-center">
    <button type="submit" class="btn @isset($color){{ ' btn-' . $color }}@else btn-danger @endisset">
    {{ $slot }}
    </button>
</div>
