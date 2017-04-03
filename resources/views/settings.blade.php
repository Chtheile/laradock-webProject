

@extends('layouts.app')

@section('content')

  <transition name="slide-fade">
        <component :is="currentView" ></component>
  </transition>


@endsection
