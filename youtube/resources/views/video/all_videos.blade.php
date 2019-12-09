@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    @foreach($videos as $video)
                        <tr>

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$video->getUrl()}}" allowfullscreen></iframe>
                            </div>
                            <p/>
                        </tr>
                    @endforeach

                {{$videos->links()}}
            </div>

        </div>
    </div>
@endsection
