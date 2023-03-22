<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>Log Activity</title>
</head>

<body>



    <div class="container mt-3">
        <a href="/warga" class="btn btn-info me-2 my-3 py-2 shadow-lg">BACK</a>
        @if (count($activity))
            <table class="table table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Log Activity</th>
                        <th>Date and Time</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    </tr>
                    @foreach ($activity as $item)
                        <tr>
                            <td>{{ $item->activity }}</td>
                            <td>{{ $item->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">belum ada aktivitas baru</p>
        @endif
    </div>
</body>

</html>
