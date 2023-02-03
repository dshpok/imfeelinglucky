@extends('layouts.common')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <div>
                            <form action="" method="post" class="well">
                                @csrf
                                <div class="control-group">
                                    <input type="text" id="new_link" placeholder="Name" value="{{$link ?? ''}}">
                                </div>
                                <div class="control-group">
                                    <input type="button"  value="Generate new link"
                                           id="generate_new_link" class="btn btn-primary">
                                </div>
                                <div class="control-group">
                                    <input type="button" value="Deactivate link"
                                           id="deactivate_link" class="btn btn-warning">
                                </div>
                                <div class="control-group">
                                    <input type="button" value="Imfeelinglucky" id="lottery" class="btn btn-success">
                                </div>
                                <div class="control-group">
                                    <label for="result">Result:</label>
                                    <input type="text" value="0" id="random_number">
                                    <input type="text" value="-" id="is_win">
                                    <input type="text" value="0" id="result">
                                </div>
                                <div class="control-group">
                                    <input type="button" value="History" id="history" class="btn btn-info">
                                    <div id="results_history"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
