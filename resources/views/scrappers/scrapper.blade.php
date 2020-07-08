@extends('layouts.app')

@section('content')
    <div class="container my-4 pt-2 pb-5 bg-white border border-danger">
        <h1 class="text-center">{{$name}} Project Details</h1>
        <hr class="bg-danger shadow-sm">

        <div class="row">
            <h3 class="col">Project Token:</h3>
            <h3 class="col">{{$project[0]['project_token']}}</h3>
        </div>

        <div class="row">
            <h3 class="col">Project owner email:</h3>
            <h3 class="col">Stfox004@gmail.com</h3>
        </div>

        <a href="/projectRun/{{$project[0]['project_token']}}/{{$authToken}}"
           class="btn btn-link btn-outline-success shadow-sm mt-2 btn-lg">
            Start New Run
        </a>

        @foreach($project as $run)
            <div class="mt-4">
                <h3 class="text-danger">Run Token: {{$run['run_token']}}</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Status</th>
                        <th scope="col">Started On</th>
                        <th scope="col">Ended On</th>
                        <th scope="col">Pages Traversed</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$run['status']}}</td>
                        <td>{{$run['start_time']}}</td>
                        <td>{{$run['end_time']}}</td>
                        <td>{{$run['pages']}}</td>
                        <td>
                            <a href="/refine/{{$name}}/{{$authToken}}/{{$run['run_token']}}/Brabys"
                               class="btn btn-link btn-outline-success shadow-sm"
                                    {{$run['status'] == 'complete' ? '': 'disabled'}}
                                    type="button">Upload to DB</a>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="row">
                    <h4 class="col">Starting URL:</h4>
                    <h4 class="col">{{ $run['start_url'] }}}</h4>
                </div>

                <div class="row">
                    <h4 class="col">Starting Value:</h4>
                    <h4 class="col">{{$run['start_value']}}</h4>
                </div>

                <hr class="bg-danger">

            </div>
        @endforeach
    </div>
@endsection


