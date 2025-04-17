@extends('admin.layouts.app')
@section('title', 'Academics Admin | Newsletters')

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
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Newsletter ID</th>
                            <th>Email Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($newsletter as $news)
                        <tr>
                            <td>{{ $news->id }}</td>
                            <td>{{ $news->email }}</td>
                            <td>
                                <a href="{{ route('admin.newsletter.show', $news->id) }}"
                                    class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.newsletter.destroy', $news->id) }}"
                                    class="btn btn-danger btn-sm delete-confirm" data-id="{{ $news->id }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center">No data available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
