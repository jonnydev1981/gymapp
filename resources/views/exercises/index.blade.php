@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">Exercise</th>
                <th scope="col">Description</th>
                <th scope="col">Demo URL</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($exercises as $exercise)
                <tr>
                    <th scope="row">
                        {{ $exercise->name }}
                    </th>

                    <td>
                        {{ $exercise->description }}
                    </td>
                    
                    <td>
                        @isset($exercise->url)
                            <a href="#myModal{{ $exercise->id }}" class="btn btn-primary" data-toggle="modal">Play</a>
                            
                            <div id="myModal{{ $exercise->id }}" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $exercise->name }} Video</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe width="560" height="315" id="exerciseVideo{{ $exercise->id }}" src="{{ $exercise->url }}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <script>
                                $(document).ready(function(){
                                    /* Get iframe src attribute value i.e. YouTube video url
                                    and store it in a variable */
                                    var url = $("#exerciseVideo{{ $exercise->id }}").attr('src');
                                    
                                    /* Assign empty url value to the iframe src attribute when
                                    modal hide, which stop the video playing */
                                    $("#myModal{{ $exercise->id }}").on('hide.bs.modal', function(){
                                        $("#exerciseVideo{{ $exercise->id }}").attr('src', '');
                                    });
                                    
                                    /* Assign the initially stored url back to the iframe src
                                    attribute when modal is displayed again */
                                    $("#myModal{{ $exercise->id }}").on('show.bs.modal', function(){
                                        $("#exerciseVideo{{ $exercise->id }}").attr('src', url);
                                    });
                                });
                            </script>
                            &nbsp;
                            <a href="{{ $exercise->url }}">{{ $exercise->url }}</a>
                        @endisset
                    </td>

                    <td>
                        <a type="button" class="btn btn-primary" href="{{ route('exercise.edit', $exercise->id) }}">Edit</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>

            {{ $exercises->links() }}
    </div>
</div>

@endsection
