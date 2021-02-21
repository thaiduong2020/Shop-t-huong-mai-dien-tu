@extends('admin.master')
@section('headd')
    <style>
        .box{
            margin-top: 1em;
            display: flex;
            flex-wrap: wrap;
            margin: 1em;
            background: white;
            width: 100%;
        }
        .cpn{

            padding: 2em;
            background: white;
            width: 25%;
        }
        .text{
            color: #555;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="    max-width: 100% !important;">
        <div class="row">
            <div class="box">
                <a href="{{ route('Categories') }}" class="cpn">
                    <div >
                        <div style="width=100%;height: 16em;">
                            <img src="/storage/image/forder.png" width="100%" alt="">
                        </div>
                        <div class="text"><h3>Danh mục sản phẩm ({{count( $categories)}}) </h3></div>
                    </div>
                </a>
                <a href="{{ route('Products') }}" class="cpn">
                    <div >
                        <div style="width=100%;height: 16em;">
                            <img src="/storage/image/forder.png" width="100%" alt="">
                        </div>
                        <div class="text"><h3>Danh sách sản phẩm ({{count( $product)}})</h3></div>
                    </div>
                </a>
                <a href="{{ route('comment') }}" class="cpn">
                    <div >
                        <div style="width=100%;height: 16em;">
                            <img src="/storage/image/comment.png" width="100%" alt="">
                        </div>
                        <div class="text"><h3>Bình luận sản phẩm ({{count( $comment)}})</h3></div>
                    </div>
                </a>
                <a href="{{ route('User') }}" class="cpn">
                    <div >
                        <div style="width=100%;height: 16em;">
                            <img src="/storage/image/user.png" width="100%" alt="">
                        </div>

                        <div class="text"><h3>Quản lý người dùng ({{count( $user)}})</h3></div>

                    </div>
                </a>
                <a href="{{ route('Roles') }}" class="cpn">
                    <div >
                        <div style="width=100%;height: 16em;">
                            <img src="/storage/image/role.png" width="100%" alt="">
                        </div>
                        <div class="text"><h3>Vai trò ({{count( $role)}})</h3> </div>
                    </div>
                </a>
                <a href="{{ route('bills') }}" class="cpn">
                    <div >
                        <div style="width=100%;height: 16em;">
                            <img src="/storage/image/bill.png" width="100%" alt="">
                        </div>
                        <div class="text"><h3>Đơn hàng ({{count( $order)}})</h3></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
