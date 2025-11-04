@extends('admin.layouts.master')

@section('title', __('Create Category'))

@section('content')
<div class="container">
    <h1>{{ __('Create Category') }}</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="{{ request('type', 'parent') }}">
        <div class="form-group">
            <label for="name">{{ __('Tên danh mục') }}</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        @if(request('type') === 'child')
        <div class="form-group">
            <label for="parent_id">{{ __('Chọn danh mục cha') }}</label>
            <select name="parent_id" id="parent_id" class="form-control" required>
                <option value="">-- {{ __('Chọn danh mục cha') }} --</option>
                @foreach($categories->where('parent_id', null) as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
        @endif
        <button type="submit" class="btn btn-primary">{{ __('Tạo') }}</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{ __('Hủy') }}</a>
    </form>
</div>
@endsection
