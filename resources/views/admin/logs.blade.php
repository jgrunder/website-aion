@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center page-header">
                <h1>Log : {{$logName . $logExtension}}</h1>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div>
                    <pre>
                        <code class="php" style="max-height: 600px; scroll-y: auto;">{{$logContent}}</code>
                    </pre>
                </div>
            </div>
        </div>
    </div>
@stop
