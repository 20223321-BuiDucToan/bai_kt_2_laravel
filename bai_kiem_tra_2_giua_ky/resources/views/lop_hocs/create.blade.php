@extends('layouts.app')

@section('title', 'Them lop hoc moi')
@section('page-title', 'Them lop hoc moi')

@section('content')
    <div class="card">
        <form action="{{ route('lop-hoc.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="ma_lop">Ma lop</label>
                    <input id="ma_lop" type="text" name="ma_lop" value="{{ old('ma_lop') }}" placeholder="VD: CNTT01">
                    @error('ma_lop')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="ten_lop">Ten lop</label>
                    <input id="ten_lop" type="text" name="ten_lop" value="{{ old('ten_lop') }}" placeholder="VD: Lap trinh web">
                    @error('ten_lop')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="si_so">Si so</label>
                    <input id="si_so" type="number" name="si_so" value="{{ old('si_so', 1) }}" min="1" placeholder="Nhap si so lop">
                    @error('si_so')<div class="error-text">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="button button-primary">Luu lop hoc</button>
                <a href="{{ route('lop-hoc.index') }}" class="button button-secondary">Quay lai</a>
            </div>
        </form>
    </div>
@endsection
