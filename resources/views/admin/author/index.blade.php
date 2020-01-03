@extends('admin.layouts.app')


@section('content')
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-windows"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Author</h2>
                                        @include('admin.partials.flash')
                                    </div>
                                </div>
                            </div>
                            {{--                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">--}}
                            {{--                                <div class="breadcomb-report">--}}
                            {{--                                    <button data-toggle="tooltip" data-placement="left" title="" class="btn waves-effect" data-original-title="Download Report"><i class="notika-icon notika-sent"></i></button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">

                        <div class="bsc-tbl-hvr">
                            <table class="table table-hover" id="data-table-basic">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($authors as $author)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$author['name']}}</td>
                                        <td>{{$author['email']}}</td>
                                        <td>{{$author['address']}}</td>
                                        <td>
                                            @can(Config::get('constants.permissions.author_EDIT'))
                                                <a href="{{route('author.edit',['id'=>$author['id']])}}"
                                                   class="btn btn-primary notika-btn-primary btn-icon-notika waves-effect">
                                                    Edit</a>
                                            @endcan
                                            @can(Config::get('constants.permissions.author_DELETE'))
                                                <a href="#" data-href="{{route('author.delete',['id'=>$author['id']])}}"
                                                   class="deleteModals btn btn-danger notika-btn-danger btn-icon-notika waves-effect">
                                                    Delete</a>
                                            @endcan
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

    @include('admin.partials.delete_alert_modal')
@endsection
