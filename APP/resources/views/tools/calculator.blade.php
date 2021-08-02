@extends('layouts.template')

@section('content')
    <section class="mb-4 mx-2 row bg-dark">
        <div class="col-xl-6">
            <div class="card shadow-1-strong mb-4 faded-dark">
                <div class="card-header pt-3 pb-0">
                    <h5 class="mb-2 text-center"><strong>Character</strong></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('tools.calculator.character')
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card shadow-1-strong mb-4 faded-dark">
                <div class="card-header pt-3 pb-0">
                    <h5 class="mb-2 text-center"><strong>Weapon</strong></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('tools.calculator.weapon')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        for (const option of document.querySelectorAll(".custom-option")) {
            option.addEventListener('click', function () {
                if (!this.classList.contains('selected')) {
                    if (this.parentNode.querySelector('.custom-option.selected'))
                        this.parentNode.querySelector('.custom-option.selected').classList.remove('selected');

                    this.classList.add('selected');
                    this.closest('.custom-select').querySelector('.custom-select__trigger div').innerHTML = this.innerHTML;

                    $.post(
                        '{{ route('ajax.char-select') }}',
                        {
                            _token: '{{ csrf_token() }}',
                            char: $(this).data('value')
                        },
                        function (response) {
                            $('#ascensions').removeClass('d-none');
                            $('#talents').removeClass('d-none');

                            $.each(response, function (index, item) {
                                $('#' + index + ' td:first-child').empty()
                                    .append('<img src="{{ asset('images/items') }}/' + item.replaceAll(' ', '-') + '.png" alt="' + item + '" width=30 height=30>')
                            });
                            costAscension($('#level_min option[selected]').val(), $('#level_max option[selected]').val());
                            costTalent($('#talent_min1 option[selected]').val(), $('#talent_max1 option[selected]').val(),
                                $('#talent_min2 option[selected]').val(), $('#talent_max2 option[selected]').val(),
                                $('#talent_min3 option[selected]').val(), $('#talent_max3 option[selected]').val());
                        },
                        'json'
                    );
                }
            });
        }

        $(document).ready(function ($) {
            if ($('#character').length) {
                costAscension($('#level_min').val(), $('#level_max').val());
                costTalent($('#talent_min1').val(), $('#talent_max1').val(),
                    $('#talent_min2').val(), $('#talent_max2').val(),
                    $('#talent_min3').val(), $('#talent_max3').val());
            }

            $('#level_min, #level_max').change(function () {
                costAscension($('#level_min').val(), $('#level_max').val());
            });

            $('#talent_min1, #talent_min2, #talent_min3, #talent_max1, #talent_max2, #talent_max3').change(function () {
                costTalent($('#talent_min1').val(), $('#talent_max1').val(),
                    $('#talent_min2').val(), $('#talent_max2').val(),
                    $('#talent_min3').val(), $('#talent_max3').val());
            });
        });

        function costAscension(lvl_min, lvl_max) {
            $.post(
                '{{ route('ajax.char-asc') }}',
                {
                    _token: '{{ csrf_token() }}',
                    lvl_min: lvl_min,
                    lvl_max: lvl_max
                },
                function (response) {
                    $.each(response, function (index, item) {
                        showCharacterItem($('#' + index + ' td:last-child').html(escapeNumber(item)));
                    });
                },
                'json'
            );
        }

        function costTalent(tal_min1, tal_max1, tal_min2, tal_max2, tal_min3, tal_max3) {
            $.post(
                '{{ route('ajax.char-tal') }}',
                {
                    _token: '{{ csrf_token() }}',
                    tal_min1: tal_min1,
                    tal_max1: tal_max1,
                    tal_min2: tal_min2,
                    tal_max2: tal_max2,
                    tal_min3: tal_min3,
                    tal_max3: tal_max3,
                },
                function (response) {
                    $.each(response, function (index, item) {
                        showCharacterItem($('#' + index + ' td:last-child').html(escapeNumber(item)));
                    });
                },
                'json'
            );
        }

        function escapeNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        }

        function number(number) {
            return Number(number.replaceAll(' ', ''));
        }

        function showCharacterItem(item) {
            if (item.html() === '0') item.parent('tr').addClass('d-none');
            else item.parent('tr').removeClass('d-none');
        }
    </script>
@endsection
