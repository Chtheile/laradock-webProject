

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

                        <user-table :users="users"></user-table>
                        <create-user-modal v-on:update="changePage"></create-user-modal>
                        <nav>
                          <ul class="pagination">
                            <li v-if="pagination.current_page > 1">
                              <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                                <span aria-hidden="true">«</span>
                              </a>
                            </li>
                            <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                              <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                            </li>
                            <li v-if="pagination.current_page < pagination.last_page">
                              <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                                <span aria-hidden="true">»</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
