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
                            <button type="button" class="btn btn-primary video-btn{{ $exercise->id }}" data-toggle="modal" data-src="{{ $exercise->url }}" data-target="#myModal{{ $exercise->id }}">
                                Play
                            </button>

                            <div class="modal fade" id="myModal{{ $exercise->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>        
                                            
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                            
                                    // Gets the video src from the data-src on each button
                                    
                                    var $videoSrc;  
                                    $('.video-btn{{ $exercise->id }}').click(function() {
                                        $videoSrc = $(this).data( "src" );
                                    });
                                    console.log($videoSrc);
                                      
                                    // when the modal is opened autoplay it  
                                    $('#myModal{{ $exercise->id }}').on('shown.bs.modal', function (e) {
                                        
                                    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
                                    $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
                                    })
                                    
                                    // stop playing the youtube video when I close the modal
                                    $('#myModal{{ $exercise->id }}').on('hide.bs.modal', function (e) {
                                        // a poor man's stop video
                                        $("#video").attr('src',$videoSrc); 
                                    }) 
                            
                                    // document ready  
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
