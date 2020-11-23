@extends('layouts.app')
@section('content')
        <!-- die action zegt ga in de todocontroller en pak de store methode/function -->







<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>sprints</h1>
		</div>
	</div>
	<div class="row">

		<!-- tasks -->
		<div class="col-md-4">
			<div class="inner border bg-white">

				<div class="row">
					<div class="col-md-12 text-center">
						<h1>task</h1>
					</div>
					<div class="col-md-12 text-center">	
						<div class="inner">
							@foreach($dataSprint as $data)
							<div id="open">
								<div class="inner-inner" style="    padding: 7px;">
									<div class="border">
										<span >{{$data->name}}</span>
										<span>{{$data->description}}</span>
										<span style="background-color: yellow;">{{$data->id}}</span>
										<form class="form_sprint">
											<div class="row">
												<div class="col-md-5 ">
													<span>move to</span>
												</div>
												<div class="col-md-4">
													<a href="">busy</a>
												</div>
												<div class="col-md-3">
													<a href="">done</a>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
							@endforeach()
						</div>		
						
					</div>
				</div> 
			</div>
		</div>


		<!-- busy -->
		<div class="col-md-4 ">
			<div class="inner border bg-white">

				<div class="row">
					<div class="col-md-12 text-center">
						<h1>busy</h1>
					</div>
					<div class="col-md-12 text-center">	
						<div class="inner">
							@foreach($dataBusy as $data)
								<div class="inner-inner" style="    padding: 7px;">
									<div class="border" style="box-shadow: 0 1px 0 rgba(9,30,66,.25);">
										{{$data->description}}
									</div>
								</div>
							@endforeach()
						</div>		
						
					</div>
				</div> 
			</div>
		</div>

		<!-- done -->
		<div class="col-md-4">
			<div class="inner border bg-white">

				<div class="row">
					<div class="col-md-12 text-center">
						<h1>done</h1>
					</div>
					<div class="col-md-12 text-center">	
						<div class="inner">
							@foreach($dataDone as $data)
								<div class="inner-inner" style="    padding: 7px;">
									<div class="border" style="box-shadow: 0 1px 0 rgba(9,30,66,.25);">
										{{$data->description}}
									</div>
								</div>
							@endforeach()
						</div>		
						
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>

   

@endsection