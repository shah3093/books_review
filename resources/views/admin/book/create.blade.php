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
                                    <h2>Create Book</h2>
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


<div class="form-example-area">
    <div class="container">
        <div class="row">
            <form id="createUserFrmId" action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control input-sm" name="name"
                                                value="{{old('name')}}" placeholder="Enter Name">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Author <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="nk-int-st">

                                            <select required class="form-control input-sm" name="author_id">
                                                @foreach ($authors as $author)
                                                <option  {{old('author_id') == $author['id'] ? 'selected':null }} value="{{$author['id']}}">{{$author['name']}}</option>
                                                @endforeach
                                            </select>

                                            @error('author_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Publisher <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="nk-int-st">

                                            <select required class="form-control input-sm" name="publisher_id">
                                                @foreach ($publishers as $publisher)
                                                <option  {{old('publisher_id') ==$publisher['id'] ? 'selected':null }} value="{{$publisher['id']}}">{{$publisher['name']}}</option>
                                                @endforeach
                                            </select>

                                            @error('publisher_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Satus <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="nk-int-st">

                                            <select required class="form-control input-sm" name="status">
                                                @foreach (App\Models\Book::BOOK_STATUS as $key=>$status)
                                                <option {{old('status') ==$key ? 'selected':null }} value="{{$key}}">{{$status}}</option>
                                                @endforeach
                                            </select>

                                            @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Image <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="nk-int-st">
                
                                            <input accept="image/*" required type="file" class="form-control input-sm" name="image"
                                                value="{{old('image')}}" />

                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Summary</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <textarea name="summary" type="text" rows="5"
                                                class="form-control input-sm"> {{old('summary')}} </textarea>
                                            @error('summary')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection