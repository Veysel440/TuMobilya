<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - Aktivite Logu</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>
<body>
<div class="admin-container">
    @include('admin.partials.sidebar')
    <main class="main-content">
        <header class="header">
            <div class="header-title">
                <h1>Yapılan İşlemler</h1>
            </div>
        </header>

        <section class="dashboard">
            <div class="card">
                <h3>Yapılan İşlemler</h3>
                <table>
                    <thead>
                    <tr>
                        <th>Aksiyon</th>
                        <th>Model</th>
                        <th>İlgili ID</th>
                        <th>Tarih</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($activityLogs as $log)
                        <tr>
                            <td>{{ $log->action }}</td>
                            <td>{{ $log->model }}</td>
                            <td>{{ $log->model_id }}</td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>
</body>
</html>
