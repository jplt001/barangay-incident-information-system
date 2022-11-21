@push("styles")

@endpush
<style>
    .show-qr-container {
        position: absolute;
        top: 1rem;
        right: 1rem;
    }
</style>
<x-app-layout pageName="{!! __($barangay->name . '\'' . 's Information') !!}">
    <x-slot name="breadcrumbs">
        <x-breadcrumb-item label="{{$barangay->name}}'s Information" icon="home" iscurrent=true/>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-12 text-center">
                            @if(!is_null($barangay->logo))
                            <img src="{{ asset($barangay->logo) }}" alt="{{ $barangay->name }} Custom logo" class="img-radius">
                            @else
                            <img src="{{ asset('assets/img/favicon (1).png') }}" width="150" height="150" alt="default logo" class="img-radius">
                            @endif
                            
                        </div>
                        <div class="show-qr-container">
                            <button class="btn btn-show-qr" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-qrcode"></i></button>
                        </div>

                        <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalCenterTitle">{{ __("QR Code") }}</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										{!! QrCode::size(300)->style("round")->generate($barangay->code) !!}
									</div>
									<div class="modal-footer">
										<button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn  btn-primary">Save changes</button>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>