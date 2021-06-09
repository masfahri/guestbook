@extends('Admin.layout')
@section('content')
    @component('Komponen.alert')
        
    @endcomponent
    <div class="mx-auto">
        <img class="center" src="{{ asset('img/logo-kemenkes.png') }}" width="350" style="margin: 0 36%;">
        <h2 class="text-center">Data Center Kementerian Kesehatan Republik Indonesia</h2>
        <h5 class="text-center">Guest Book</h5>
    </div>
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					@component('Komponen.table', ['tamu' => $tamu])
						
					@endcomponent
				</div>
			</div>
            
            <div class="col-md-8">
				
            </div>
        </div>
    </div>
	<div class="col">
		<footer class="footer-basic">
			<a href="#" class="float" data-toggle="modal" data-target="#formModal">
				<i class="fa fa-plus my-float"></i>
			</a>
			<div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
			<ul class="list-inline">
				<li class="list-inline-item"><a href="#">Home</a></li>
				<li class="list-inline-item"><a href="#">Services</a></li>
				<li class="list-inline-item"><a href="#">About</a></li>
				<li class="list-inline-item"><a href="#">Terms</a></li>
				<li class="list-inline-item"><a href="#">Privacy Policy</a></li>
			</ul>
			<p class="copyright">Kementerian Kesehatan Republik Indonesia - Data Center</p>
		</footer>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
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
					<div>
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
			
						<!-- A button for taking snaps -->
                        <br><div class="form-group">
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
@section('js')

@endsection
