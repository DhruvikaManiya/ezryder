@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">

       

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Admin Setting</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ route('admin.setting.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $setting->id }}">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control text-capitalize" value="{{  str_replace('-',' ',str_replace('_',' ',$setting->title)) }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="value">Value</label>
                                <input type="text" name="value" id="value" class="form-control" value="{{ $setting->value }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control " rows="3">{{ $setting->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
