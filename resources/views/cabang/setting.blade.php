@extends('_layouts.default')

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Pilih Cabang</h3>
                    <form action="{{route('cabang.setting.store')}}" method="post">
                        <input type="hidden" name="_method" value="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomor Cabang</label>
                            <div class="col-sm-10">
                                <select name="select" class="form-control" name="nomor_cabang">
                                    @foreach($cabang as $index => $item)
                                        <option value="{{$item->id_cabang}}" {{$user_cabang == $item->id_cabang ? 'selected' : ''}}>{{$item->id_cabang}}</option>
                                    @endforeach
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
