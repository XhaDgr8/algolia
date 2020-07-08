@extends('layouts.app')

@section('content')

    <div class="container my-4 py-3 bg-white border border-danger">
        <h1 class="text-center">All Available Scrappers</h1><br>

        <table class="table table-striped rounded-lg border border-danger shadow-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Scrapper Name</th>
                <th scope="col">Results & Details</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Brabys</td>
                <td><a class="text-info" href="/scrapper/Brabys/tSX6vXp51zDF/tG2QLZ9jZo_v">View</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection


