@extends('layouts.app')

@section('content')

    <div class="container my-4 pt-2 pb-5 bg-white border border-danger rounded-lg">
        <h1 class="text-center">Results Uploaded to Database</h1>
        <hr class="bg-danger shadow-sm">

        <div class="row">

            @foreach ($upResults as $refined)

            @php
                $a = $refined['b_image'];
                if (strpos($a, 'http') !== false) {
                    $image = $refined['b_image'];
                } else {
                    $image = asset("".$refined['b_image']."");
                }

                if ($refined[0] == "success") {
                    $status = "Uploaded Successfully";
                } elseif ($refined[0] == "danger") {
                    $status = "Failed To Upload Errer!";
                } elseif ($refined[0] == "warning") {
                    $status = "Duplicate Item Found";   
                }
            @endphp
    
            <div class="col-md-4 mb-2">
                <div class="container shadow-sm border border-danger rounded-lg">
                    <div class="row bg-light">
                        <div class="row mx-auto border-bottom shadow-sm">
                            <div class='col-4 pt-2'><img class='img-fluid' src='{{$image}}'></div>
                            <div class="col-8 pt-2">
                                <h5>{{$refined['b_name']}}</h5>
                            </div>
                        </div>
                        <div class='col-12'>
                            <ul class='m-1'>
                                <li>{{$refined['b_address']}}</li>
                                <li>{{$refined['b_email']}}</li>                                                
                                <li>{{$refined['b_number_1']}}</li>
                                <li>{{$refined['b_number_2']}}</li>
                            </ul>
                            <div class='w-100 alert alert-{{$refined[0]}} shadow-sm' role="alert"><p class="m-0">{{$status}}</p></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection


