@extends('Admin.layout')
@section('content')
    @component('Komponen.alert')
        
    @endcomponent
    <br><br><br><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <center><img class="center" src="https://fin.co.id/wp-content/uploads/2018/11/ADACC96E-286C-4515-AC1B-9DAF4E11FF40.jpeg" width="350" ></center>
                        <center><h2 style="font-size: 19px;">Data Center Kementerian Kesehatan Republik Indonesia</h2></center>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-8">
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-end">
                      <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                          <a class="nav-link active" href="#" data-toggle="modal" data-target="#formModal">Tambah</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @component('Komponen.table', ['tamu' => $tamu])
                                
                            @endcomponent
                        </div>
                    </div>
                  </div>
                
            </div>
        </div>
    </div>

    <!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buku Tamu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('tamu.store') }}">
                @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <style>
                                    form { margin-top: 15px; margin-bottom: 15px; }
                                    form > input { margin-right: 15px; }
                                    /* #results { float: right; background:#ccc; } */
                                </style>
                                <div id="results"></div>
    
                                <div id="my_camera"></div>
                                <!-- First, include the Webcam.js JavaScript Library -->
                                <script type="text/javascript" src="{{ asset('js/webcam.min.js') }}"></script>
                                
                                <!-- Configure a few settings and attach camera -->
                                <script language="JavaScript">
                                    Webcam.set({
                                        width: 320,
                                        height: 240,
                                        image_format: 'png',
                                        jpeg_quality: 90
                                    });
                                    Webcam.attach( '#my_camera' );
                                </script>
                    
                                <br><!-- A button for taking snaps -->
                                <div style="width: 87%;" class="form-group">
                                    <input type=button class="form-control" value="Take Snapshot" onClick="take_snapshot()">
                                </div>
                                <!-- Code to handle taking the snapshot and displaying it locally -->
                                <script language="JavaScript">
                                    function take_snapshot() {
                                        // take snapshot and get image data
                                        Webcam.snap( function(data_uri) {
                                            // display results in page
                                            document.getElementById('results').innerHTML = 
                                                /**'<h6>Here is your image:</h6>' + **/
                                                '<img src="'+data_uri+'"/> <input type="hidden" name="_meta" value="'+data_uri+'">';
                                                
                                        } );
        
                                        $('#my_camera').hide()
                                    }
                                </script>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                            
                                <div class="form-group form-name">
                                    <input class="form-control" type="text" name="nama" placeholder="Nama" required>
                                </div>
                                <div class="form-group form-name">
                                    <input class="form-control" type="text" placeholder="Unit / Instansi" name="instansi" required>
                                </div>
                                <div class="form-group form-name">
                                    <input class="form-control" type="number" required minlength="6" maxlength="13" placeholder="No. Telepon / Handphone" name="hp" inputmode="tel">
                                </div>
                                <div class="form-group form-name">
                                    <input class="form-control" type="email" name="email" placeholder="E-Mail">
                                </div>
                                <div class="form-group"><textarea class="form-control" name="keperluan" placeholder="Keperluan / Tujuan" rows="10"></textarea></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
              </form>
          </div>
        </div>
      </div>
@endsection