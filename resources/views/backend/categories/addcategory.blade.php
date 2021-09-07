@extends('backend/master/master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ asset('/index') }}"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh mục</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý danh mục</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-md-6" >
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <form method="POST">
                               
                                @if (isset($errors))
                                @foreach ($errors->all() as $errors)
                                <div class="alert bg-danger" role="alert">
                                    <svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg>{{$errors}}<a href="#" class="pull-right"><span
                                            class="glyphicon glyphicon-remove"></span></a>
                                </div>                                @endforeach
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Danh mục cha:</label>
                                    <select class="form-control text-center" name="category" id="">
                                        @if(isset($categories))
                                        @foreach($categories as $category)
                                        <option value="{{$category->cat_id}}">{{$category->cat_name}}</option>
                                        @endforeach
                                        @endif
                                        <option value="">Không</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên Danh mục</label>
                                    <input type="text" class="form-control text-center" name="name" id=""
                                        placeholder="Tên danh mục mới">
                                </div>

                            </div>
                            <div class="col-md-12">

                            <div class="form-group text-right" >
                                <button class="btn btn-success" name="submit" type="submit">Thêm thành viên</button>
                                <button class="btn btn-danger" type="reset"><a class="btn-danger" href="{{asset('/adduser')}}">Huỷ bỏ</a></button>
                                {{ csrf_field() }}
                            </div>
                            </div>
                            </form>
                        @endsection
