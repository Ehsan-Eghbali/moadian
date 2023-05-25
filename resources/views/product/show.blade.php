@extends('admin.layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-user"></i>
                انواع حالت {{$requestType->name}}
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($requestType->requestTypeItem as $requestTypeItem)
                        <tr>
                            <td>{{$requestTypeItem->name}}</td>
                            <td>
                                <a href="{{route('request-type.edit',$requestTypeItem->id)}}" class="btn btn-outline-warning">
                                    ویرایش
                                </a>
                            </td>
                            <td>
                                <form id="delete{{$requestTypeItem->id}}" method="post" action="{{route('request-type-item.destroy',$requestTypeItem->id)}}">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">
                                    <button form="delete{{$requestTypeItem->id}}" class="btn btn-danger">حذف</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{route('request-type-item.create',$requestType->id)}}"  class="btn btn-success">حالت جدید</a>
        </div>
    </div>


@endsection
