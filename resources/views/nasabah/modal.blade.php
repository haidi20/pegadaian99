<div class="modal fade" id="modal-detail"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Nasabah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="view-info">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="general-info">
                                <div class="row" id="data-loading">
                                    <div class="col-lg-12 col-xl-12 col-sm-12">
                                        <div align="center">
                                            <div class="loader-block" id="loader-block">
                                                <div class="preloader3 loader-block">
                                                    <div class="circ1 loader-primary"></div>
                                                    <div class="circ2 loader-primary"></div>
                                                    <div class="circ3 loader-primary"></div>
                                                    <div class="circ4 loader-primary"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="data-detail">
                                    <div class="col-sm-12 col-md-7">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody id="table-detail-one">
                                                    {{-- fetch data from jquery --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="table-responsive">
                                            <table class="table m-0" >
                                                <tbody id="table-detail-two">
                                                   {{-- fetch data from jquery --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of general info -->
                        </div>
                        <!-- end of col-lg-12 -->
                    </div>
                    <!-- end of row -->
                </div>
                <!-- end of view-info -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-coba"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Nasabah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="sub-title">Pilih Cabang</h3>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Oke</button>
            </div> --}}
        </div>
    </div>
</div>