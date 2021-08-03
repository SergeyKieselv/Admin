@extends('layouts.admin_layout')

@section('title', 'Добавить статью')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить статью</h1>
                </div>
            </div>
        @if(session('success'))<!-- Зеленая полоска -->
            <div class="alert alert-success col-lg-10" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}} </h4>
            </div>
            @endif
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card card-primary">
                        <form action="{{route('post.store')}}" method="POST">
                        @csrf <!-- какая-то защита -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название статьи </label>
                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Введите название статьи" required>
                                </div>
                                <div class="form-group">

                                    <label>Выберите категрию</label>
                                            <select name="categories_id" class="form-control" required>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                </div>
                            <div class="form-group" >
                                    <textarea  id="editor" name="text" class="editor">
                                    </textarea>
                            </div>
                                
                    </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
