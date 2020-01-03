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
                                        <i class="notika-icon notika-form"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Assign permission to {{ucfirst($role['name'])}} role</h2>
                                        @include('admin.partials.flash')
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    {{--                                    <button data-toggle="tooltip" data-placement="left" title="" class="btn waves-effect" data-original-title="Download Report"><i class="notika-icon notika-sent"></i></button>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Permissions</h2>
                        </div>
                        <form method="post" action="{{route('permission.store')}}">
                            <input type="hidden" name="role" value="{{$role['name']}}" />
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="fm-checkbox">
                                        <label class="">
                                            <div id="slectAllPermissionDiv" class="icheckbox_square-green">
                                                <input id="allPermission" type="checkbox" class="i-checks" name="allPermission" value="allPermission" />
                                            </div>
                                            <i></i> Select all</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach(Config::get('constants.permissions') as $permission)
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="fm-checkbox">
                                            <label class="">
                                                <div class="icheckbox_square-green">
                                                    <input  {{$role->hasPermissionTo($permission) ? "checked='checked'":null}}  value="{{$permission}}" type="checkbox" name="permissions[]" class="i-checks permission-check-box"/>
                                                </div>
                                                <i></i> {{ucfirst($permission)}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-example-int mg-t-15">
                                <button type="submit" class="btn btn-success notika-btn-success waves-effect">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
