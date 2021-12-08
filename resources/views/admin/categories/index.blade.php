@extends('admin.layout.hearder')

@section('content')

<div class="content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success " role="alert">
                {{  session('success') }}
        </div>
        @elseif (session('erros'))
        <div class="alert alert-danger " role="alert">
            {{ session('erros') }}
       </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div>
                        <h4 class="title">DANH SÁCH NGƯỜI DÙNG ĐĂNG KÝ</h4>
                        <h4 class="title " style=" text-align: right"><a href="{{ route('addCategory') }}">THÊM DANH MỤC</a></h4>
                        <form class="input-group" style="display: inline">
                            <input type="text" name="keyword"  class="rounded" placeholder="Search" aria-label="Search"
                                   aria-describedby="search-addon" value="{{ request()->keyword }}"/>
                            <button type="submit" class="btn btn-outline-primary">search</button>
                        </form>
                        </div>
                        <p class="category"><a style="color: gray" href="{{ route('categoriesList') }}">total categori ({{ $index ?? null }}) </a> | <a  style="color: rgb(13, 182, 36)" href="{{ route('activerCategory') }}">category activer ({{ $activeruser ?? null }})</a> | <a style="color:red" href="{{ route('trackCategory') }}">category disable ({{ $trackuser ?? null }})</a></p>
                    </div>
                    <form action="{{ route('categoryaction') }}" class="form-control">

                        <select id="cars" name="action">
                            <option >chon</option>
                            <option value="disabled">disabled</option>
                            <option value="restore">restore</option>
                            <option value="delete">delete</option>
                          </select>
                          <button type="submit" value="Submit">Submit</button>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th ><input type="checkbox" name="checkall" value=""></th>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>description</th>
                                <th>Ghi chus</th>
                                <th>ACTION</th>

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
                                    <td  ><input type="checkbox" name="checkbox[]" value="{{ $show->id }}"></td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $show->category_name }}</td>
                                    <td>{{ $show->description }}</td>
                                    <td>{{ $show->deleted_at ==  null ? 'active' : 'disable' }}</td>
                                    <td><a class=" w-75 " href="{{ route('updatetemplateCategory',[$show->id]) }}"><i class="pe-7s-note mr-2"></i></a>
                                    |<a href="{{ route('deleteCategory',[$show->id]) }}"><i class="pe-7s-trash text-danger"></i></a>
                                    @if ( $show->deleted_at != null)
                                     | <a href="{{ route('restoreCategory',[$show->id]) }}"><i class="pe-7s-trash text-success"></i>
                                       </a>
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
{{ $shows->links() }}
@endsection
