@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Edit Node</a>
    <a href="{{ url('nodes')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Nodes > Edit </p></div>
        <h4 class="light">Edit Node</h4>
        <div class="divider"></div>

        <!-- Form -->
        {!! Form::model($node,[
        'method' => 'PUT',
        'route'=>['nodes.update',$node->id]
        ]) !!}

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">play_for_work</i>
                <input id="icon_label" class="validate" name="name" type="text" id="name" value="{{$node->name}}" required>
                <label for="icon_label">Name</label>
            </div>
            <div class="input-field col s12" style="margin-bottom: 10px;">
                <i class="material-icons prefix">swap_vert</i>
                <input id="icon_swap_vert" class="validate" name="longitude" type="text" id="longitude" pattern="\d+(\.\d*)?" value="{{$node->longitude}}" required>
                <label for="icon_swap_vert">Latitude</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">swap_horiz</i>
                <input id="icon_swap_horiz" class="validate"  name="latitude" type="text" id="latitude" pattern="\d+(\.\d*)?" value="{{$node->latitude}}" required>
                <label for="icon_swap_horiz">Longitude</label>
            </div>
        </div>


        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="add">
            <button type="submit" class="btn-floating btn-large waves-effect waves-circle waves-light"> <!-- Green -->
                <i class="large material-icons">check</i>
            </button>
        </div>
        <!-- FLOATING BUTTONS -->
        {!! Form::close() !!}

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="cancel">
            <a href="{{ url('nodes')}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                <i class="large material-icons">close</i>
            </a>
        </div>
        <!-- FLOATING BUTTONS -->

        <h4 class="light">Edit Sensors</h4>
        <div class="divider"></div>

        <!-- Table -->
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">Id</th>
                    <th data-field="name">Name</th>
                    <th data-field="type">Type</th>
                    <th data-field="unit">Unit</th>
                    <th data-field="range">Range</th>
                    <th data-field="action">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($sensors as $sensor)
                    <tr>
                        <td>{{ $sensor->id }}</td>
                        <td>{{ $sensor->name }}</td>
                        <td>{{ $sensor->type }}</td>
                        <td>{{ $sensor->unit }}</td>
                        <td>{{ $sensor->range }}</td>
                        <td>
                            <a class="modal-trigger" href="#modal2"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>

                    <!-- cancel modal Structure -->
                    <div id="modal2" class="modal">
                        <div class="modal-content center">
                            <h6 class="light">This action can not be reversed, would you like to continue? </h6><br>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-flat">Yes</button>
                                <button class="btn btn-flat modal-action modal-close">No</button>
                            </div>
                            <!--, $sensor->id, $node->id]-->
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Trigger -->
        <br>
        <a class="waves-effect waves-light btn btn-primary modal-trigger right" href="#modal1">Modal</a>

        <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
    </div>

@stop