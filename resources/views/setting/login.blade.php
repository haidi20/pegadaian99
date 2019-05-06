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
                    <h3 class="sub-title">Log User Login</h3>
                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="javascript:void(0)" onClick="create()" class="btn btn-success">Buat</a>
                        </div>
                    </div> --}}
                    <br>
                    <form method="get">
                        <div class="card-block">
                            <!-- Row start -->
                            <div class="row">
                            <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                    {{-- Show &nbsp; --}}
                                    <select name="perpage" id="perpage" class="form-control">
                                        <option {{ selected(10, 'perpage', 'request')}}>10</option>
                                        <option {{ selected(25, 'perpage', 'request')}}>25</option>
                                        <option {{ selected(50, 'perpage', 'request')}}>50</option>
                                        <option {{ selected(100, 'perpage', 'request')}}>100</option>
                                    </select> 
                                    {{-- &nbsp; Entries --}}
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 offset-md-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <select name="by" id="by" class="form-control">
                                                @foreach($column as $index => $item)
                                                    <option value="{{$index}}" {{selected($index, 'by', 'request')}}>{{$item}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="input-group input-group-success">
                                            <span class="input-group-addon">
                                                <i class="icofont icofont-ui-search"></i>
                                            </span>
                                            <input type="text" name="q" id="q" value="{{ request('q') }}" class="form-control" placeholder="Search">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        <button type="submit" class="btn btn-default" id="btn-search">Oke</button>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                    </form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="table-responsive">
                                <table id="dt-ajax-array" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            @foreach ($column as $index => $item)
                                                <td>{{$item}}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($login as $index => $item)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{$item->username_login}}</td>
                                                <td>{{$item->ip_addr}}</td>
                                                <td>{{$item->waktu_login}}</td>
                                                <td>{{$item->waktu_logout}}</td>
                                                <td></td>
                                                <td> {{$item->status}} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $login->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}
                        </div>
                    </div>   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
