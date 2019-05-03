@extends('_layouts.default')

@section('script-bottom')
@endsection

@section('content')
@include('setting.modal')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
             {!! session()->get('message') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Data Pengguna</h3>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="{{route('user.create')}}" class="btn btn-success">Buat</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table table-striped table-bordered nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Cabang</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($user as $index => $item)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{$item->username}}</td>
                                                <td>{{$cabang[$item->id_user]}}</td>
                                                <td>{{$item->level}}</td>
                                                <td align="left">
                                                    <a href="{{route('user.edit', $item->id_user)}}" title="Detail Data" class="btn btn-sm btn-info">
                                                        <i class="icofont icofont-external icofont-lg"></i>
                                                    </a>
                                                    <a href="{{route('user.destroy', $item->id_user)}}" class="btn btn-sm btn-primary" title="Edit Data">
                                                        {{-- <i class="icofont icofont-ui-delete icofont-lg"></i> --}}
                                                        <i class="icofont icofont-edit icofont-lg"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                       @empty
                                            
                                       @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right  m-r-20">
                                {{-- <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a> --}}
                            </div>
                        </div>
                    </div>   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
