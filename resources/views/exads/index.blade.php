@extends('layouts.base')

@section('content')
    <div class="row p-6">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    @include('header')
                    <h5>{!! __('messages.author', ['name' => 'Donal Lynch']) !!}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
