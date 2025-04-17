@extends('admin.layouts.app')
@section('title', 'Academics Admin | News')

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
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.news.add') }}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-success btn-sm mb-3">Add</a>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>News ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($news as $new)
                        <tr>
                            <td>{{ $new->id }}</td>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->category }}</td>
                            <td>@if (!empty($new->image))
                                <a href="{{ asset('storage/' . $new->image) }}" target="_blank"
                                    class="text-decoration-none">
                                    Click me
                                </a>
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if($new->status === "ACTIVE")
                                <span class="badge rounded-pill bg-success text-white">ACTIVE</span>
                                @else
                                <span class="badge rounded-pill bg-danger text-white">INACTIVE</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.news.show', $new->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.news.edit', $new->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('admin.news.destroy', $new->id) }}"
                                    class="btn btn-danger btn-sm delete-confirm" data-id="{{ $new->id }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No data available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection