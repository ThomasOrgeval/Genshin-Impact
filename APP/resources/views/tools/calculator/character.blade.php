<div class="col-12">
    <div class="custom-select-wrapper">
        <div class="custom-select">
            <div class="custom-select__trigger">
                <div>Select character</div>
                <div class="arrow"></div>
            </div>
            <div class="custom-options">
                @foreach($characters as $c)
                    <div class="custom-option" data-value="{{ $c->label }}">
                        <img src="{{ asset('images/characters/' . $c->label . '/icon.png') }}"
                             alt="{{ $c->label }}" height="50" width="50">
                        <span class="ms-3">{{ $c->label }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<hr class="my-3">
@include('tools.calculator.ascension')
<hr class="my-3">
@include('tools.calculator.talent')
