@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <form method="post" action="{{route('employees.update', $employee->id)}}" enctype="multipart/form-data"> 
        	
        	@csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstName" class="form-control" value="{{$employee->firstName}}">
            </div>
            @if($errors->get('firstName'))
                @foreach($errors->get('firstName') as $error)
                    <p class="error">{{$error}}</p>
                @endforeach
            @endif  
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastName" class="form-control" value="{{$employee->lastName}}">
            </div>
            @if($errors->get('lastName'))
                @foreach($errors->get('lastName') as $error)
                    <p class="error">{{$error}}</p>
                @endforeach
            @endif


            <div class="form-group">
                <label>Company</label>
                <select class="form-control" id="exampleFormControlSelect1" name="company_id">
                    @if(count($companies)>0)
                        @foreach($companies as $company)
                        @if($company->id == $employee->company_id)
                            <option selected="selected" value="{{$company->id}}">{{$company->name}}</option>
                        @else
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endif
                        @endforeach
                    @endif
                </select>
            </div>

           
    
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{$employee->email}}">
            </div>
            @if($errors->get('email'))
                @foreach($errors->get('email') as $error)
                    <p class="error">{{$error}}</p>
                @endforeach
            @endif

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{$employee->phone}}">
            </div>
            @if($errors->get('phone'))
                @foreach($errors->get('phone') as $error)
                    <p class="error">{{$error}}</p>
                @endforeach
            @endif  

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
