@extends('dashboard.layouts.layout')
@section('admin_content')

@if(session()->has('error'))
    <div class="alert alert-danger">{{__('words.deleteError')}}</div>

@endif
@if(session()->has('success'))
    <div class="alert alert-success">{{__('words.deleteSuccess')}}</div>

@endif

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                {{__('words.category')}}
            </div>
            <div class="card-block">
                <table class="table table-striped" id="table_id">
                    <thead>
                        <tr>
                            <th>{{__('words.title')}}</th>
                            <th>{{__('words.parent')}}</th>
                            <th>{{__('words.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('dashboard.category.delete')}}" method="post">
        @csrf
        <div class="modal-content">
            <input type="hidden" name="id" id="id">
            <div class="modal-body">
                <p>{{__('words.sure')}}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('words.close')}}</button>
                <button type="submit" class="btn btn-danger">{{__('words.delete')}}</button>
            </div>

        </div>
    </form>
  </div>
</div>

@push('javascript')

<script>
    var table = $('#table_id').DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "desc"]],
        ajax: "{{route('dashboard.category.all')}}",
        columns: [
            {data: 'title', name: 'title'},
            {data: 'parent', name: 'parent'},
            {data: 'action', name: 'action'},
        ]
    })

    $('#table_id tbody').on('click', '#deletBtn', function (argument){
        var id = $(this).attr('data-id');
        $('#deletemodal #id').val(id);
    })
</script>

@endpush
@stop
