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
                                        <h2>Books</h2>
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
                                    <th>Publisher</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($books as $book)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$book['name']}}</td>
                                        <td>{{$book->publisher['name']}}</td>
                                        <td>{{$book->author['name']}}</td>
                                        <td>{{ \App\Utils\CommonFunction::getStatus($book['status']) }}</td>
                                       <td>
                                            @can(Config::get('constants.permissions.BOOK_EDIT'))
                                                <a href="{{route('book.edit',['id'=>$book['id']])}}"
                                                   class="btn btn-primary notika-btn-primary btn-icon-notika waves-effect"> Edit</a>
                                            @endcan
                                            @can(Config::get('constants.permissions.BOOK_DELETE'))
                                                <a href="#" data-href="{{route('book.delete',['id'=>$book['id']])}}"
                                                   class="deleteModals btn btn-danger notika-btn-danger btn-icon-notika waves-effect"> Delete</a>
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
