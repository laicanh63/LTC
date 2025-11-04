@extends('admin.layouts.master')

@section('title', __('Category Management'))

@section('content')
<div class="container">
    <h1>{{ __('Category Management') }}</h1>

    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('admin.categories.create', ['type' => 'parent']) }}" class="btn btn-success">{{ __('Tạo danh mục cha') }}</a>
        <a href="{{ route('admin.categories.create', ['type' => 'child']) }}" class="btn btn-primary">{{ __('Tạo danh mục con') }}</a>
    </div>

    <div class="mb-3">
        <form action="{{ route('admin.categories.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="{{ __('Search category...') }}" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Tên danh mục') }}</th>
                    <th>{{ __('Danh mục cha') }}</th>
                    <th>{{ __('Hành động') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories->where('parent_id', null) as $parent)
                <tr style="background:#f5f5f5;font-weight:bold;">
                    <td>{{ $parent->id }}</td>
                    <td>{{ $parent->name }}</td>
                    <td>{{ __('(Danh mục cha)') }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $parent->id) }}" class="btn btn-sm btn-primary">{{ __('Sửa') }}</a>
                        <form action="{{ route('admin.categories.delete', $parent->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Bạn có chắc muốn xóa?') }}')">{{ __('Xóa') }}</button>
                        </form>
                    </td>
                </tr>
                @foreach($categories->where('parent_id', $parent->id) as $child)
                    <tr>
                        <td>{{ $child->id }}</td>
                        <td style="padding-left:30px;">- {{ $child->name }}</td>
                        <td>{{ $parent->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $child->id) }}" class="btn btn-sm btn-primary">{{ __('Sửa') }}</a>
                            <form action="{{ route('admin.categories.delete', $child->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Bạn có chắc muốn xóa?') }}')">{{ __('Xóa') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
