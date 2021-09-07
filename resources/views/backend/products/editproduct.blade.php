@extends('backend/master/master')
@section('main')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-md-8">
                                @if (isset($products))
                                <form method="POST" enctype="multipart/form-data" action="{{asset("/admin/product/update/$products->id")}}">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="categories" class="form-control">
                                                {{!! showCat($category,0, '',$products->categories_id)!!}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" name="code" class="form-control"
                                                value="SP0{{ $products->id }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $products->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input type="number" name="price" class="form-control"
                                                value="{{ $products->price }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Sản phẩm có nổi bật</label>
                                            <select name="featured" class="form-control">
                                                <option @if ($products->featured == 0) selected @endif value="0">Không</option>
                                                <option @if ($products->featured == 1) selected @endif value="1">Có</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select name="state" class="form-control">
                                                <option @if ($products->state == 1) selected @endif value="1">Còn hàng</option>
                                                <option @if ($products->state == 0) selected @endif value="0">Hết hàng</option>
                                            </select>
                                        </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input id="img" type="file" name="img" class="form-control hidden"
                                        onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="100%" height="350px"
                                        src="../uploads/{{ $products->image }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thông tin</label>
                                    <textarea name="info" style="width: 100%;height: 100px;">{{$products->info}}</textarea>
                                    <script>CKEDITOR.replace('info')</script>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Miêu tả</label>
                                    <textarea id="editor" name="describe" style="width: 100%;height: 100px;" >{{$products->describer}}</textarea>
                                    <script>CKEDITOR.replace('editor')</script>
                                </div>
                                <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                                <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        @endif
                        {{ csrf_field() }}
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>

    <!--end main-->
@stop
