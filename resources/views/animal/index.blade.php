@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-12  margin-tb mt-4">
                            <div class="row justify-content-center" style="margin-bottom: 10px;">
                                <h2>Register of chipped animals </h2>
                            </div>
                            <div class="row justify-content-center" style="margin-bottom: 10px;">
                                <a class="btn btn-primary" href="{{ route('animal.create') }}" title="Create an animal">Add new animal</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div>
                    <div class="mx-auto pull-right">
                        <div class="">
                            <form action="{{ route('animal.index') }}" method="GET" role="search">

                                <div class="input-group">
                                    <span class="input-group-btn mr-5 mt-1">
                                        <button class="btn btn-info" type="submit" title="Search projects">
                                            <span class="fas fa-search">Search</span>
                                        </button>
                                    </span>
                                    <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                                    <a href="{{ route('animal.index') }}" class=" mt-1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="button" title="Refresh page">
                                                <span class="fas fa-sync-alt">Refresh</span>
                                            </button>
                                        </span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->

                <div class="card-body">

                    <table class="table col-md-12">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th class="text-center d-none d-md-table-cell" scope="col">Breed</th>
                            <th class="text-center d-none d-md-table-cell" scope="col">Location</th>
                            <th class="text-center d-none d-lg-table-cell" scope="col">Chip</th>
                            <th class="text-center d-none d-lg-table-cell" scope="col">Created</th>
                            <th class="text-center d-none d-lg-table-cell" scope="col">Created by</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                          </thead>
                          <tbody>
                            <tr>
                                @foreach($animals as $key => $value)
                                <th scope="row">{{ $value->id }}</th>
                                <td>{{ $value->name }}</td>
                                <td class="text-center d-none d-md-table-cell">{{ $value->breed }}</td>
                                <td class="text-center d-none d-md-table-cell">{{ $value->location }}</td>
                                <td class="text-center d-none d-lg-table-cell">{{ $value->chip }}</td>
                                <td class="text-center d-none d-lg-table-cell">{{ $value->created_at }}</td>
                                <td class="text-center d-none d-lg-table-cell">{{ $value->user_name }}</td>

                              <td>
                                               
                                  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <form method="POST" action="{{ route('animal.destroy', $value->id)}}" onsubmit="return confirm('Do you really want to delete?');">
                                      <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <!-- show the animal (uses the show method found at GET /sharks/{id} -->
                                        <button type="button" class="btn btn-secondary"><a href="{{ URL::to('animal/' . $value->id) }}">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-eye" viewBox="0 0 16 16">
                                              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a></button>
                                        <!-- edit this animal (uses the edit method found at GET /sharks/{id}/edit -->
                                        <button type="button" class="btn btn-secondary"><a href="{{ URL::to('animal/' . $value->id . '/edit') }}">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                      </a></button>
                                        <!-- delete animal (uses the destroy method DESTROY /animal/{id} -->
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-secondary">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                              <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                                            </svg>
                                        </button>
                                      </div>
                                    </form>
                                    <div>
                                        <form method="POST" action="{{ route('sms')}}" onsubmit="return confirm('Do you want to send alert?');" accept-charset="UTF-8">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                                </svg></button>
                                        </form>
                                    </div>
                                </div>
                            </td>   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

<!-- WprXpYvf6@Ytq9L -->