@extends('layouts.main-layout')
@section('head')
    <title>Projects Laravel One-to-Many</title>
@endsection
@section('content')
    <h1 class="my-3">Projects found: {{ count($projects) }}</h1>
    <div>
        @foreach ($projects as $project)
            <div class="mb-5">

                <h2><strong>[ {{ $project->id }} ] Name: </strong>{{ $project->name }}</h2>
                <span class="d-block"><strong>Starting date: </strong>{{ $project->start_date }}</h2>
                <span class="d-block"><strong>End date: </strong>{{ $project->end_date }}</h2>
                <span class="d-block"><strong>Project status: </strong>{{ $project->status }}</h2>

                @foreach ($project->technologies as $technology)
                    <h4 class="mt-4"><strong>*Tecnology name: </strong>{{ $technology->name_technology }}</h4>
                    <span class="d-block"><strong>Description: </strong>{{ $technology->description }}</span>
                    <span class="d-block"><strong>Language used: </strong>{{ $technology->language }}</span>
                @endforeach

            </div>
        @endforeach
    </div>
@endsection
