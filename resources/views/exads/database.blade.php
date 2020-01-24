@extends('layouts.base')

@section('content')
    <div class="row p-6">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    @include('header')
                    <h5>{!! __('messages.db-connectivity') !!}</h5>
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
