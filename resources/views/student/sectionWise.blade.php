@extends('student.layout')

@section('student-content')

@foreach($data as $record)
<div class="container">
    <h1 class="text-white">{{ucfirst($record->name)}}</h1>
    <hr class="bg-white">
    <?php $quetions=App\Http\Controllers\questions::sectionQuestion($record->id); ?>
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
            <th scope="col">Question</th>
            <th scope="col">Given Answer</th>
            <th scope="col">Right Answer</th>
            </tr>
        </thead>
        <tbody> 
    @foreach($quetions as $quetion)
    <?php $queAns=App\Http\Controllers\questions::QueAns($quetion->id); ?>
    {{dd($queAns)}}
        <tr>
            <td scope="row">{{$quetion->question}}</td>
            <td>{{$queAns->answer}}</td>
            <!-- <td>{{$queAns->rightAnswer}} -->
        </tr>
    @endforeach
        </tbody>
        </table>
</div>

@endforeach
@endsection