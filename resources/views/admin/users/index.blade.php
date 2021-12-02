@extends('admin.layout.hearder')

@section('content')

<div class="content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success " role="alert">
                {{  session('success') }}
        </div>
        @elseif (session('erros'))
        <div class="alert alert-erros " role="alert">
            {{ session('erros') }}
       </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">DANH SÁCH NGƯỜI DÙNG ĐĂNG KÝ</h4>
                        <p class="category">THỐNG KÊ VÀ PHÂN QUYỀN</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>ROLE</th>
                                <th>Ghi chus</th>
                                <th>ACTION</th>
                                <
                            </thead>
                            <tbody>
                                @php
                                    $i=0
                                @endphp
                                @foreach ($shows as $show )
                                @php
                                    $i++
                                 @endphp

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $show->name }}</td>
                                    <td>{{ $show->email }}</td>
                                    <td>{{ $show->role ==  1 ? 'customer' : 'admin'; }} </td>
                                    <td>note</td>
                                    <td><a class=" w-75 " href="{{ route('update.show',[$show->id]) }}"><i class="pe-7s-note mr-2"></i></a>|<a href="{{ route('deleteUser',[$show->id]) }}"><i class="pe-7s-trash text-danger"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
=
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
