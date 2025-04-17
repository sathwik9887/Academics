@extends('admin.layouts.app')
@section('title', 'Academics Admin | Courses | Edit')
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
                            <form action="{{ route('admin.courses.update', $course->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="courseName">Course Name</label>
                                    <input type="text" name="courseName" class="form-control"
                                        value="{{ $course->courseName }}" placeholder="Course Name" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="courseHeading">Course Heading</label>
                                    <input type="text" name="courseHeading" class="form-control"
                                        placeholder="Course Heading" value="{{ $course->courseHeading }}" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="courseText">Course Text</label>
                                    <input type="text" name="courseText" class="form-control"
                                        value="{{ $course->courseText }}" placeholder="Course Text" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="price">Course Price</label>
                                    <input type="text" name="price" class="form-control" value="{{ $course->price }}"
                                        placeholder="Course Price" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="rating">Course Rating</label>
                                    <input type="text" name="rating" class="form-control" value="{{ $course->rating }}"
                                        placeholder="Course Rating" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="duration">Course Start Duration</label>
                                    <input type="time" name="duration" class="form-control"
                                        placeholder="Course Duration" value="{{ $course->duration }}" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="endDuration">Course End Duration</label>
                                    <input type="time" name="endDuration" class="form-control"
                                        placeholder="Course End Duration" value="{{ $course->endDuration }}" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="teacherName">Teacher Name</label>
                                    <input type="text" name="teacherName" value="{{ $course->teacherName }}"
                                        class="form-control" placeholder="Teacher Name" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    @if($course->image)
                                    <img src="{{ asset('storage/' . $course->image) }}" alt="Image" width="250"
                                        height="150" class="mb-2">
                                    @else
                                    <p>No Image Available</p>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <br>
                                    <input type="file" name="image"
                                        class="form-control-file @error('image') is-invalid @enderror">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Description"
                                        value={{old('description')}} required>{{ $course->description }}</textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="">Select a Status</option>
                                        <option value="ACTIVE" {{ old('status', $course->status) == 'ACTIVE' ?
                                            'selected' : '' }}>ACTIVE</option>
                                        <option value="INACTIVE" {{ old('status', $course->status) == 'INACTIVE' ?
                                            'selected' : '' }}>INACTIVE</option>
                                    </select>
                                </div>
                                <br>


                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('admin.courses') }}" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
