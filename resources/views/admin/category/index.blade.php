@extends('layouts.admin_layout')

@section('title', 'Все категории')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все категории </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))<!-- Зеленая полоска -->
            <div class="alert alert-success col-lg-10" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}} </h4>
            </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <div class="col-lg-10">
                    <div class="card">

                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 5%">
                                        ID
                                    </th>
                                    <th style="width: 30%">
                                        Название
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{$category['id']}}
                                        </td>
                                        <td>
                                            {{$category->title}}
                                        </td>

                                        <td class="project-actions text-right">

                                            <a class="btn btn-info btn-sm" href="{{route('category.edit', $category['id'])}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Редактировать
                                            </a>
                                           <form action="{{route('category.destroy',$category['id'])}}" method="POST" style="display: inline-block">
                                           @csrf <!-- какая-то защита -->
                                               @method('DELETE')
                                               <button type="submit" class="btn btn-danger btn-sm delete-btn" href="#">
                                                   <i class="fas fa-trash">
                                                   </i>
                                                   Удалить
                                               </button>
                                           </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
