@extends('layouts.app')

@section('title', 'Chinh sua lop hoc')
@section('page-title', 'Chinh sua lop hoc')

@section('content')
    <div class="card">
        <form action="{{ route('lop-hoc.update', $lopHoc) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label for="ma_lop">Ma lop</label>
                    <input id="ma_lop" type="text" name="ma_lop" value="{{ old('ma_lop', $lopHoc->ma_lop) }}">
                    @error('ma_lop')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="ten_lop">Ten lop</label>
                    <input id="ten_lop" type="text" name="ten_lop" value="{{ old('ten_lop', $lopHoc->ten_lop) }}">
                    @error('ten_lop')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="si_so">Si so</label>
                    <input id="si_so" type="number" name="si_so" value="{{ old('si_so', $lopHoc->si_so) }}" min="1">
                    @error('si_so')<div class="error-text">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="button button-primary">Cap nhat</button>
                <a href="{{ route('lop-hoc.index') }}" class="button button-secondary">Huy</a>
            </div>
        </form>
    </div>
@endsection
