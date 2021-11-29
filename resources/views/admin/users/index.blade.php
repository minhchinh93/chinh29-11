@extends('admin.layout.hearder')

@section('content')

<div class="content">
    <div class="container-fluid">
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
                                <th>TOTAL PAYMENT</th>
                                <th>ROLE</th>
                                <th>ACTION</th>
                                <
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota dog</td>
                                    <td>ccc@gmail.com</td>
                                    <td>20,0000,000 đ</td>
                                    <td>Admin</td>
                                    <td>SUA|XOA</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota cat</td>
                                    <td>bbb@gmail.com</td>
                                    <td>20,0000,000 đ</td>
                                    <td>editor</td>
                                    <td>SUA|XOA</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>AAA@gmail.com</td>
                                    <td>20,0000,000 đ</td>
                                    <td>customer</td>
                                    <td>SUA|XOA</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>AAA@gmail.com</td>
                                    <td>20,0000,000 đ</td>
                                    <td>customer</td>
                                    <td>SUA|XOA</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>AAA@gmail.com</td>
                                    <td>20,0000,000 đ</td>
                                    <td>customer</td>
                                    <td>SUA|XOA</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>AAA@gmail.com</td>
                                    <td>20,0000,000 đ</td>
                                    <td>customer</td>
                                    <td>SUA|XOA</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
