@extends('layouts.template')

@section('content')
    <section class="mb-4 mx-2">
        <div id="characters" class="row row-cols-xxl-3 row-cols-md-2 row-cols-1">
            @foreach($characters as $c)
                <div id="char{{ $c->id }}" class="my-1 my-md-2">
                    <a href="{{ route('character', ['label' => $c->label]) }}" class="card bg-dark">
                        <div class="faded-dark">
                            <div style="position:absolute;top: 10px;left: 10px">
                                <h3 class="card-title character_name text-white-50" style="white-space: nowrap">
                                    {{ $c->label }}
                                </h3>
                            </div>
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img class="img-fluid" alt="char"
                                     src="{{ asset('images/characters/' . $c->label . '.png') }}">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
