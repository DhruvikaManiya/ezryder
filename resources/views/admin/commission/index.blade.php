@extends('layouts.admin.master')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Admin Setting </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Admin Setting</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 col-md-6">Admin Setting</h1>
                    
                    <div class="col-md-4 mb-0 mb-0">
                        <div class="input-group ">
                            <input type="text" name="search" class="form-control" placeholder="Search by title"
                                value="{{ request()->search }}">
                                <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="seachBtn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                       <div class="row">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                        role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th rowspan="1" colspan="1">Title</th>
                                <th rowspan="1" colspan="1">Value</th>
                                <th rowspan="1" colspan="1">Description</th>
                                <th rowspan="1" colspan="1" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @foreach ($settings as $setting)
                                <tr role="row" class="odd">
                                    <td class="text-capitalize">{{ str_replace('_', '  ', $setting->title) }}</td>
                                    <td>{{ $setting->value }}</td>
                                    <td class="text-capitalize">{{ $setting->description }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.setting.edit') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $setting->id }}">
                                            <button type="submit" class="btn btn-warning text-dark btn-sm">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
<script>
//    seachBtn
    $('#seachBtn').click(function(){
        var search = $('input[name="search"]').val();
        $.ajax({
            type: "Post",
            url: "{{route('admin.setting.search')}}",
            data: {
                'search':search,
                '_token': "{{ csrf_token() }}",
            },
           
            success: function (response) {
                console.log(response);
                // foreach
                var html = '';
                $.each(response, function (key, item) {
                    html += '<tr role="row" class="odd">';
                    html += '<td class="text-capitalize">'+item.title+'</td>';
                    html += '<td>'+item.value+'</td>';
                    html += '<td class="text-capitalize">'+item.description+'</td>';
                    html += '<td class="text-center">';
                    html += '<form action="{{ route('admin.setting.edit') }}" method="post">';
                    html += '@csrf';
                    html += '<input type="hidden" name="id" value="'+item.id+'">';
                    html += '<button type="submit" class="btn btn-warning text-dark btn-sm">';
                    html += '<i class="fas fa-edit"></i>';
                    html += 'Edit';
                    html += '</button>';
                    html += '</form>';
                    html += '</td>';
                    html += '</tr>';
                });
                $('#tbody').html(html);

            }
        });

    });

</script>

@endsection