<x-app-layout pageName="{{ __('Settings') }}">
    <x-slot name="breadcrumbs">
        <x-breadcrumb-item label="Settings" icon="settings" iscurrent=true/>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Settings</h4>
                </div>
                <div class="card-body p-0">
                    <div class="accordion" id="accordionExample">
					<div class="card mb-0">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">{{__('QR Code Settings')}}</a></h5>
						</div>
						<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
							<div class="card-body">
								
							</div>
						</div>
					</div>
					<div class="card mb-0">
						<div class="card-header" id="headingTwo">
							<h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Collapsible Group Item #2</a></h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
							<div class="card-body">
								{{ __("Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
								eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
								sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
								sustainable VHS.")}}
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingThree">
							<h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Collapsible Group Item #3</a></h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							<div class="card-body">
								
							</div>
						</div>
					</div>
				</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>