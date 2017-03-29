

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$name}}</div>
                    <div class="panel-body">
                  <div class="pull-left">
                      <h3>Benutzerverwaltung:<h3>
                  </div>
                        <div class="pull-right">
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">Benutzer anlegen</button>
                      </div>

                      <div id="app-2">

                        <create-user-modal></create-user-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
