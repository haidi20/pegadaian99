@extends('_layouts.default')

@section('script-bottom')

@endsection

@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 ">
            {{-- @include('_layout.breadcrumb') --}}
        </div>
        <div class="col-md-6">
            <a href="{{ route('user.index') }}" class="btn btn-info float-md-right mt-0">
                <i class="icon-reply3"></i> Kembali
            </a>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Form Pengguna</h3>
                    <form action="{{$action}}" method="post">
                        <input type="hidden" name="_method" value="POST">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="username">Username</label>
                            <div class="col-sm-10">
                                <input value="{{old('username')}}" type="text" class="form-control" name="username" id="username" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="password">Password</label>
                            <div class="col-sm-10">
                                <input value="" type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="level">Level</label>
                            <div class="col-sm-10">
                                <select name="level" id="level" class="form-control">
                                    <option {{ selected('moderator', 'level', 'old')}} value="moderator">Moderator</option>
                                    <option {{ selected('investor', 'level', 'old')}} value="investor">Investor</option>
                                    <option {{ selected('admin', 'level', 'old')}} value="admin">Admin</option>
                                </select> 
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-xs">Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
