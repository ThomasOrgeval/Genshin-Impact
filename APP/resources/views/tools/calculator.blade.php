@extends('layouts.template')

@section('content')
    <section class="mb-4 mx-2 row bg-dark">
        <div class="col-xl-6 mb-4">
            <div class="card faded-dark">
                @include('tools.calculator.character')
            </div>
        </div>

        <div class="col-xl-6 mb-4">
            <div class="card faded-dark">
                @include('tools.calculator.weapon')
            </div>
        </div>
    </section>

    <script>
        $(function () {
            $(".dropdown-menu").on('click', 'li a', function () {
                $(".btn:first-child").text($(this).text()).val($(this).text());
            });
        });
    </script>
@endsection
