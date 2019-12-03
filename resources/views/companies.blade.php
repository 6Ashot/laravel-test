@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="" href="{{route('companies.create')}}">Create Companie</a>
            <br>
            <div class="card">
                Companies
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                
                    @foreach($companies as $company)
                    <tr>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->website}}</td>
                        <td>{{$company->id}}</td>
                        <td><a class="btn btn-success" style="color: white">Edit</a></td>
                        <td><a class="btn btn-danger" style="color: white">Delete</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
