
@extends('admin.layout.hearder')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="{{ route('postCategory') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>tên danh mục</label>
                                        <input type="text" class="form-control" name="category_name" placeholder="Company" value="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>mô tả</label>
                                        <input type="text" class="form-control" name="description"  placeholder="Company" value="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="file" class="form-control" name="img"  placeholder="Company" value="">
                                    </div>
                                </div>
                           </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">add Categories</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400" alt="...">
                    </div>
                    <div class="content">
                        <div class="author">
                             <a href="#">
                            <img class="avatar border-gray" src="{{ asset('assets/assets/img/faces/face-3.jpg') }}" alt="...">

                              <h4 class="title"><br>
                                 <small></small>
                              </h4>
                            </a>
                        </div>
                        <p class="description text-center"> <br>

                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
