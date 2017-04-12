@extends('layouts.app')

@section('content')

<home v-if="currentView === 'home'"  :text="text"></home>
  <!--<transition name="slide-fade">
        <component :is="currentView" ></component>
  </transition>-->
<frage v-if="currentView === 'frage'"   v-bind:frage="frage" v-on:increment="incrementTotal"></frage>
@endsection
