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
      {{--<th scope="col">Time limit</th>--}}
      {{--<th scope="col">Taken time</th>--}}
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
    @foreach($data as $test)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$test->title}}</td>
      <td>@if($test->test_type=="Practice")
            <?php 
              $mod=\DB::table('test_modules')->select('module_type')->where('test_id',$test->test_id)->first();
            ?>
            {{$mod->module_type}}
          @else
            {{$test->test_type}}
          @endif
      </td>
      <td>{{$test->name}}</td>
      <td>{{$test->marks}}</td>
      <td><a href="{{url('sections')}}/{{$test->test_id}}/{{$test->sid}}"><button class="btn btn-primary">View</button></a></td>
    </tr>
    @endforeach
    @if($i==1)
    <td colspan=8 class="text-center">No record found</td>
    @endif
  </tbody>
</table>
@endsection