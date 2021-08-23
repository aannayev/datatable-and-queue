@extends('layouts.app')
    



@section('content')
<div class="container">
<table id="myTable" class="table order">

<thead>
    <th>Name</th>
    <th>Email</th>
    <th>Id</th>
</thead>
<tbody>


   
@foreach($names as $name)

<tr>

<td>{{ $name->id}}</td>
<td>{{ $name->name}}</td>
<td>{{ $name->email}}</td>

</tr>
@endforeach

</tbody>
</table>

</div>
{{-- <div class="container">{{$names->links("pagination::bootstrap-4")}}</div> --}}

@endsection
