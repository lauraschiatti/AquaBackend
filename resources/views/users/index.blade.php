@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("general.users") }}</a>
@stop


@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.users") }} </p></div>
        <h4 class="light">{{ trans("general.users") }}</h4>
        <div class="divider"></div>

        <!-- Table -->
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">Id</th>
                    <th data-field="email">{{ trans("users.email") }}</th>
                    <th data-field="role">{{ trans("users.role") }}</th>
                    <th data-field="actions">{{ trans("general.actions") }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="buttons">
                                <a href="{{url('users',$user->id)}}"><i class="material-icons">visibility</i></a>

                                @if(Auth::check() and Auth::user()->role == 'superadmin')
                                    <!--<a href="{{route('users.edit', $user->id)}}"><i class="material-icons">edit</i></a>-->
                                    <a onclick="showDeleteModal('<?php echo $user -> id ?>');"><i class="material-icons">delete</i></a>

                                    {!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id], 'id'=>$user->id]) !!}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal Structure -->
    <div id="delete" class="modal">
        <div class="modal-content center">
            <h6 class="light">{{ trans("general.sure to delete this?") }}</h6><br>
            <a href="#" class=" modal-action modal-close btn-flat">No</a>
            <input type="hidden" id="delete_value">
            <a class="btn primary" onclick="eliminar();">{{ trans("general.yes") }}</a>
        </div>
    </div>

    <!-- FLOATING BUTTON -->
    <div class="fixed-action-btn" id="add">
        <a href="{{url('/users/create')}}" class="btn-floating btn-large waves-effect waves-circle waves-light red">
            <i class="large material-icons">person_add</i>
        </a>
    </div>
    <!-- FLOATING BUTTON -->
@endsection

@section('javascript')
    <script type="text/javascript">
        /**** Eliminar usando modal ****/
        function showDeleteModal(id){
            $('#delete_value').val(id);
            $('#delete').openModal();
        }

        function eliminar(){
            var id = $('#delete input').val();
            $("#"+id).submit();
        }
    </script>
@endsection