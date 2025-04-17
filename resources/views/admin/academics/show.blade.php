@extends('admin.layouts.app')
@section('title', 'Academics Admin | Home | View')
@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $title }}</h3>
            </div>
            <div class="col-sm-6">
                @if(isset($breadcrumbs))
                <ol class="breadcrumb float-sm-end">
                    @foreach ($breadcrumbs as $crumb)
                    @if ($loop->last || empty($crumb['url']))
                    <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                    @else
                    <li class="breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
                    @endif
                    @endforeach
                </ol>
                @endif

            </div>
            <section class="content">
                <div class="container-fluid d-flex justify-content-center">
                    <div class="card w-100">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title"
                                        value="{{$academics->title}}" disabled>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" name="icon" class="form-control" placeholder="Icon"
                                        value="{{$academics->icon}}" disabled>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <br>
                                    @if($academics->image)
                                    <img src="{{ asset('storage/' . $academics->image) }}" alt="Image" width="250"
                                        height="150" class="mb-2">
                                    @else
                                    <p>No Image Available</p>
                                    @endif
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Description"
                                        disabled>  {{$academics->description}}</textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" disabled>
                                        <option value="">Select a Status</option>
                                        <option value="ACTIVE" {{ $academics->status == 'ACTIVE' ? 'selected' : ''
                                            }}>ACTIVE
                                        </option>
                                        <option value="INACTIVE" {{ $academics->status == 'INACTIVE' ? 'selected' : ''
                                            }}>INACTIVE
                                        </option>
                                    </select>
                                </div>
                                <br>

                                <a href="{{ route('admin.academics') }}" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
