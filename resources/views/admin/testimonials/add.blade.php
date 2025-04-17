@extends('admin.layouts.app')
@section('title', 'Academics Admin | Courses | Add')
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
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('admin.testimonials.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Testimonial Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Testimonial Name"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="role">Testimonial Role</label>
                                    <input type="text" name="role" class="form-control" placeholder="Testimonial Role"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <br>
                                    <input type="file" name="image"
                                        class="form-control-file @error('image') is-invalid @enderror" required>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Description"
                                        value={{old('description')}} required></textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" value={{ old('status') }} id="status" class="form-control"
                                        required>
                                        <option value="">Select a Status</option>
                                        <option value="ACTIVE">ACTIVE
                                        </option>
                                        <option value="INACTIVE">INACTIVE
                                        </option>
                                    </select>
                                </div>
                                <br>


                                <button type="submit" class="btn btn-success">Add</button>
                                <a href="{{ route('admin.testimonials') }}" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
