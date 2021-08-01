<div class="custom-select-wrapper">
    <div class="custom-select">
        <div class="custom-select__trigger">
            <div>Select character</div>
            <div class="arrow"></div>
        </div>
        <div class="custom-options">
            @foreach($characters as $c)
                <div class="custom-option" data-value="{{ $c->label }}">
                    <img src="{{ asset('images/characters/' . $c->label . '.png') }}"
                         alt="{{ $c->label }}" height="40" width="40">
                    <span class="ms-3">{{ $c->label }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
