<div class="page-title">
    <h1>{!! __('messages.assignment') !!}</h1>
    <h5>{!! __('messages.instructions') !!}</h5>
</div>
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" href="{!! route('index') !!}">{!! __('messages.home') !!}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('fizz-buzz') !!}">{!! __('messages.fizzbuzz') !!}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('element') !!}">{!! __('messages.find-missing-element') !!}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('db-connectivity') !!}">{!! __('messages.db-connectivity') !!}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('lottery') !!}">{!! __('messages.lottery') !!}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('a-b-test') !!}">{!! __('messages.abtest') !!}</a>
    </li>
</ul>