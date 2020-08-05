@extends('student.layout')

@section('student-content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Test Type</th>
      <th scope="col">Teacher</th>
      <th scope="col">Marks</th>
      <th scope="col">Time limit</th>
      <th scope="col">Taken time</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
    @foreach($data as $test)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$test->title}}</td>
      <td>{{$test->test_type}}</td>
      <td>{{$test->name}}</td>
      <td>{{$test->marks}}</td>
      <td>{{$test->time_limit}}</td>
      <td>{{$test->taken_time}}</td>
      <td><a href="history/Modules/{{$test->test_id}}"><button class="btn btn-primary">View</button></a></td>
    </tr>
    @endforeach
    @if($i==1)
    <td colspan=8 class="text-center">No record found</td>
    @endif
  </tbody>
</table>
@endsection