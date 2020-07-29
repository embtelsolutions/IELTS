@extends('student.layout')

@section('student-content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Modul Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
    @foreach($data as $test)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$test->module_type}}</td>
      <td><a href="sections/{{$test->id}}"><button class="btn btn-primary">View</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection