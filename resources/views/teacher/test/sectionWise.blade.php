@extends('student.layout')

@section('student-content')

@foreach($data as $record)
<div class="container">
    <h1 class="text-white">{{ucfirst($record->name)}}</h1>
    <hr class="bg-white">
    <?php $quetions=App\Http\Controllers\questions::studSectionQuestion($record->id); ?>
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
            <th scope="col">Question</th>
            <th scope="col">Given Answer</th>
            <th scope="col">Marks</th>
            <th scope="col">Remarks</th>
            </tr>
        </thead>
        <tbody> 
    @foreach($quetions as $quetion)
    <?php $queAns=App\Http\Controllers\questions::studQueAns($quetion->id,$sid,$stud_id); ?>
    
        <tr>
            <td scope="row">{{$quetion->question}}</td>
            <td>{{$queAns->answer}}</td>
            @if($queAns->marks)
                <td>{{$queAns->marks}}</td>
            @else
                <td>-</td>
            @endif
            @if($queAns->remark)
                <td>{{$queAns->remark}}</td>
            @else
                <td>-</td>
            @endif
        </tr>
    @endforeach
        </tbody>
        </table>
</div>

@endforeach
@endsection