<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quan ly lop hoc')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; color: #162033; background: linear-gradient(180deg, #eef4ff 0%, #f8fafc 45%, #ffffff 100%); }
        a { color: inherit; }
        .page { max-width: 1080px; margin: 0 auto; padding: 32px 20px 48px; }
        .hero { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 20px; padding: 28px; border-radius: 24px; background: linear-gradient(135deg, #0f172a, #1d4ed8); color: #fff; box-shadow: 0 24px 60px rgba(15, 23, 42, 0.18); }
        .hero h1 { margin: 0; font-size: clamp(1.8rem, 3vw, 2.4rem); }
        .hero p { margin: 10px 0 0; max-width: 640px; color: rgba(255, 255, 255, 0.84); line-height: 1.6; }
        .card { background: rgba(255, 255, 255, 0.95); border: 1px solid #dbe4f0; border-radius: 24px; box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08); padding: 24px; backdrop-filter: blur(8px); }
        .button { display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 44px; padding: 0 18px; border-radius: 999px; border: none; text-decoration: none; cursor: pointer; font-weight: 700; transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease; }
        .button:hover { transform: translateY(-1px); }
        .button-primary { background: #2563eb; color: #fff; box-shadow: 0 12px 24px rgba(37, 99, 235, 0.28); }
        .button-secondary { background: #e2e8f0; color: #1e293b; }
        .button-danger { background: #fee2e2; color: #b91c1c; }
        .toolbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 20px; flex-wrap: wrap; }
        .toolbar-meta strong { display: block; font-size: 1.05rem; }
        .toolbar-meta span { color: #64748b; }
        .alert { margin-bottom: 16px; padding: 14px 16px; border-radius: 16px; }
        .alert-success { background: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; }
        .alert-error { background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; }
        .table-wrap { overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 18px; }
        table { width: 100%; border-collapse: collapse; min-width: 720px; }
        th, td { padding: 16px 14px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        thead { background: #eff6ff; }
        th { font-size: 0.92rem; text-transform: uppercase; letter-spacing: 0.04em; color: #334155; }
        tbody tr:nth-child(even) { background: #fafcff; }
        tbody tr:hover { background: #f8fbff; }
        .actions { display: flex; gap: 10px; flex-wrap: wrap; }
        .empty-state { padding: 32px 18px; text-align: center; color: #475569; border: 1px dashed #cbd5e1; border-radius: 20px; background: #f8fafc; }
        .form-grid { display: grid; gap: 18px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 700; color: #334155; }
        .form-group input { width: 100%; min-height: 48px; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 14px; background: #fff; color: #0f172a; font-size: 1rem; }
        .form-group input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12); }
        .error-text { margin-top: 6px; color: #dc2626; font-size: 0.95rem; }
        .form-actions { display: flex; gap: 12px; flex-wrap: wrap; padding-top: 8px; }
        .pagination { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-top: 20px; flex-wrap: wrap; }
        .pagination-links { display: flex; gap: 8px; flex-wrap: wrap; }
        .pagination-links a, .pagination-links span { display: inline-flex; align-items: center; justify-content: center; min-width: 44px; min-height: 44px; padding: 0 14px; border-radius: 999px; text-decoration: none; border: 1px solid #dbe4f0; background: #fff; color: #334155; }
        .pagination-links .active { background: #2563eb; color: #fff; border-color: #2563eb; }
        .pagination-links .disabled { background: #f8fafc; color: #94a3b8; }
        @media (max-width: 720px) {
            .page { padding: 20px 14px 32px; }
            .hero { padding: 20px; border-radius: 20px; }
            .card { padding: 18px; border-radius: 20px; }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="hero">
            <div>
                <h1>@yield('page-title', 'Quan ly lop hoc')</h1>
                <p>Ung dung Laravel su dung SQLite va Eloquent ORM de them, sua, xoa va hien thi danh sach lop hoc co phan trang.</p>
            </div>
            <a href="{{ route('lop-hoc.index') }}" class="button button-primary">Danh sach lop</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                Du lieu chua hop le. Vui long kiem tra lai cac truong da nhap.
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
