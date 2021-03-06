@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <form method="post" action="{{route('companies.update', $company->id)}}" enctype="multipart/form-data"> 
        	
        	@csrf
            <input type="hidden" name="_method" value="PUT">
            
        	<div class="form-group">
        		<label>Name</label>
        		<input type="text" name="name" class="form-control" value="{{$company->name}}">
        	</div>
        	@if($errors->get('name'))
        		@foreach($errors->get('name') as $error)
        			<p class="error">{{$error}}</p>
        		@endforeach
            @endif  
        	<div class="form-group">
        		<label>Email</label>
        		<input type="text" name="email" class="form-control" value="{{$company->email}}">
        	</div>
        	@if($errors->get('email'))
        		@foreach($errors->get('email') as $error)
        			<p class="error">{{$error}}</p>
        		@endforeach
            @endif  
   	
        	<div class="form-group">
        		<label>Change Logo</label><br>
                <img src="{{URL::asset($company->logo)}}" width="100px">
        		<div class="custom-file">
    				<input type="file" class="custom-file-input" id="inputGroupFile01"
      				aria-describedby="inputGroupFileAddon01" name="logo">
    				<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  				</div>
        	</div>
        	@if($errors->get('logo'))
        		@foreach($errors->get('logo') as $error)
        			<p class="error">{{$error}}</p>
        		@endforeach
            @endif  
        	<div class="form-group">
        		<label>Website</label>
        		<input type="text" name="website" class="form-control" value="{{$company->website}}">
        	</div>
        	@if($errors->get('website'))
        		@foreach($errors->get('website') as $error)
        			<p class="error">{{$error}}</p>
        		@endforeach
            @endif  

        	<button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
