@extends('admin.layouts.app')
@section('title', 'Academics Admin | Users | View')
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
                            <form action="{{ route('admin.users.update', $users->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $users->name }}"
                                        placeholder="User Name" disabled>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email Address"
                                        value="{{ $users->email }}" disabled>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select a Status</option>
                                        <option value="ACTIVE" {{ $users->status == 'ACTIVE' ? 'selected' : ''
                                            }}>ACTIVE
                                        </option>
                                        <option value="INACTIVE" {{ $users->status == 'INACTIVE' ? 'selected' : ''
                                            }}>INACTIVE
                                        </option>
                                    </select>
                                </div>
                                <br>


                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('admin.users') }}" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection