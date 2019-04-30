@extends('_layouts.default')

@section('content')
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
                    <h3 class="sub-title">Pengaturan Persenan & Jumlah Biaya Titip yang di bayar</h3>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th> Jumlah Persenan</th>
                                            <th>Jumlah Biaya Titip yang Dibayar</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
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
