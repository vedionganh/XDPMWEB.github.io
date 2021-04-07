@extends('admin_welcome')
@section('admin_content')

   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa sản phẩm
                        </header>
                        <div class="panel-body">
                             <?php
                            $message=Session::get('message');
                            if($message)
                            {
                                echo $message;
                                Session::put('message',null);
                            }
                            ?>
                            <div class="position-center">
                                @foreach($edit_product as $key =>$gt)

                                <form role="form" action="{{URL::to('/update-product/'.$gt->product_id)}}" method="post" enctype="multipart/form-data" >
                                    {{(csrf_field())}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text"name="tensanpham"class="form-control" id="exampleInputEmail1" value="{{$gt->ten}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none" rows="5" class="form-control"id="exampleInputPassword1"name="mota" >{{$gt->mota}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text"name="gia"class="form-control" id="exampleInputEmail1" value="{{$gt->gia}}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình</label>
                                    <input type="file"name="hinh"class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <img src="{{URL::to('public/uploads/sanpham/'.$gt->hinh)}}"  width="100" height="100" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <select name="danhmuc" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key=>$value)
                                        @if($value->danhmuc_id==$gt->danhmuc_id)
                                        <option selected value="{{$value->danhmuc_id}}">{{$value->tendm}}</option>
                                        @else
                                        <option value="{{$value->danhmuc_id}}">{{$value->tendm}}</option>
                                        @endif
                                        @endforeach

                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <select name="trangthai" class="form-control input-sm m-bot15">
                                        <option value="0">ẩn</option>
                                        <option value="1">hiện</option>

                                    </select>
                                </div> --}}

                                <button type="submit" name="them" class="btn btn-info">Sửa sản phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
</div>


@endsection
