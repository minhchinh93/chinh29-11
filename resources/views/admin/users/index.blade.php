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
                    <div class="header" >
                        <h4 class="title">DANH SÁCH NGƯỜI DÙNG ĐĂNG KÝ</h4>
                            <form class="input-group" style="display: inline">
                                <input type="text" name="keyword"  class="rounded" placeholder="Search" aria-label="Search"
                                       aria-describedby="search-addon" value="{{ request()->keyword }}"/>
                                <button type="submit" class="btn btn-outline-primary">search</button>
                            </form>
                            <hr>
                        <p class="category"><a style="color: gray" href="{{ route('showList') }}">total user ({{ $index }}) </a> | <a  style="color: rgb(13, 182, 36)" href="{{ route('activeruser') }}">user activer ({{ $activeruser }})</a> | <a style="color:red" href="{{ route('trackuser') }}">user disable ({{ $trackuser }})</a></p>
                    </div>
                    <form action="{{ route('action') }}" class="form-control">

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
                                <th>EMAIL</th>
                                <th>ROLE</th>
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
                                    <td>{{ $show->name }}</td>
                                    <td>{{ $show->email }}</td>
                                    <td>{{ $show->role ==  1 ? 'customer' : 'admin'; }} </td>
                                    <td>{{ $show->deleted_at ==  null ? 'active' : 'disable' }}</td>
                                    <td><a class=" w-75 " href="{{ route('update.show',[$show->id]) }}">
                                        <i class="pe-7s-note mr-2"></i>
                                       </a>
                                       @if ( $show->id != 1)
                                       | <a href="{{ route('deleteUser',[$show->id]) }}">
                                        <i class="pe-7s-trash text-danger"></i>
                                       </a>
                                       @endif
                                    @if ( $show->deleted_at != null)
                                     | <a href="{{ route('restore',[$show->id]) }}"><i class="pe-7s-trash text-success"></i>
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
