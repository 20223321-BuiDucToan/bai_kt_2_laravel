@extends('layouts.app')

@section('title', 'Danh sach lop hoc')
@section('page-title', 'Danh sach lop hoc')

@section('content')
    <div class="card">
        <div class="toolbar">
            <div class="toolbar-meta">
                <strong>Tong so lop: {{ $lopHocs->total() }}</strong>
                <span>Moi trang hien thi {{ $lopHocs->perPage() }} lop hoc.</span>
            </div>
            <a href="{{ route('lop-hoc.create') }}" class="button button-primary">Them lop moi</a>
        </div>

        @if($lopHocs->count())
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ma lop</th>
                            <th>Ten lop</th>
                            <th>Si so</th>
                            <th>Ngay tao</th>
                            <th>Thao tac</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lopHocs as $lopHoc)
                            <tr>
                                <td>{{ $loop->iteration + ($lopHocs->currentPage() - 1) * $lopHocs->perPage() }}</td>
                                <td>{{ $lopHoc->ma_lop }}</td>
                                <td>{{ $lopHoc->ten_lop }}</td>
                                <td>{{ $lopHoc->si_so }}</td>
                                <td>{{ $lopHoc->created_at->format('d/m/Y') }}</td>
                                <td class="actions">
                                    <a href="{{ route('lop-hoc.edit', $lopHoc) }}" class="button button-secondary">Sua</a>
                                    <form action="{{ route('lop-hoc.destroy', $lopHoc) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa lop hoc nay khong?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button button-danger">Xoa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($lopHocs->hasPages())
                <div class="pagination">
                    <div>
                        Hien thi {{ $lopHocs->firstItem() }} - {{ $lopHocs->lastItem() }} tren {{ $lopHocs->total() }} lop hoc
                    </div>
                    <div class="pagination-links">
                        @if($lopHocs->onFirstPage())
                            <span class="disabled">Truoc</span>
                        @else
                            <a href="{{ $lopHocs->previousPageUrl() }}">Truoc</a>
                        @endif

                        @foreach($lopHocs->getUrlRange(1, $lopHocs->lastPage()) as $page => $url)
                            @if($page === $lopHocs->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($lopHocs->hasMorePages())
                            <a href="{{ $lopHocs->nextPageUrl() }}">Sau</a>
                        @else
                            <span class="disabled">Sau</span>
                        @endif
                    </div>
                </div>
            @endif
        @else
            <div class="empty-state">
                Chua co lop hoc nao. Hay tao du lieu dau tien de bat dau quan ly.
            </div>
        @endif
    </div>
@endsection
