@extends('errors::minimal')

@section('title', __('Not Found'))
{{--
@section('code', '404')
--}}
@if($exception)
    @section('message', $exception->getMessage())
@else
    @section('message', __('Not Found'))
@endif
<style>
    .parent {
        
    }
    .child {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .accio {
        font-size: 2.5rem;
        position: absolute;
        margin-top: 15rem;
    }
    .error {
        font-size: 7.5rem;
    }
</style>
<div class="parent">
    <div class="child">
        <img src="img/sad_harry.gif" style="transform: scaleX(-1);">
        <span class="accio">Accio</span> <span class="error">404</span>
    </div>
</div>

      