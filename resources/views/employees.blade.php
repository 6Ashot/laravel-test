@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="" href="{{route('employees.create')}}">Create Companie</a>
            <br>
            @if(Session::has('message'))
                <h1 align="center">{{Session::get('message')}}</h1>
            @endif
            <div class="card">
                Employees
                {{ count($employees) }}
                @if(count($employees)>0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->firstName}}</td>
                                <td>{{$employee->lastName}}</td>
                                <td>{{$employee->company->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td><a class="btn btn-success" style="color: white" href="{{route('employees.edit', $employee->id)}}">Edit</a></td>
                                <td>
                                    <form method="post" action="{{route('employees.destroy', $employee->id)}}">
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
        {{$employees->links()}}
    </div>
</div>
@endsection
