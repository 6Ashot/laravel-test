@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="" href="{{route('companies.create')}}">Create Companie</a>
            <br>
            @if(Session::has('message'))
                <h1 align="center">{{Session::get('message')}}</h1>
            @endif
            <br>
            <div class="card">
                Companies
            @if(count($companies)>0)
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
                        <td><img src="{{$company->logo}}" width="50px"></td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->website}}</td>
                        <td><a class="btn btn-success" style="color: white" href="{{route('companies.edit', $company->id)}}">Edit</a></td>
                        <td><form method="post" action="{{route('companies.destroy', $company->id)}}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="sumbit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 align="center">Empty</h3>
            @endif
            </div>
        </div>

        {{$companies->links()}}
    </div>
</div>
@endsection
