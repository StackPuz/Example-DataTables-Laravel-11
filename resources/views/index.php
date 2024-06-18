<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
</head>
<body>
    <table id="table" class="display">
        <thead>
            <td>id</td>
            <th>name</th>
            <th>price</th>
        </thead>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        var dataTable = new DataTable('#table', {
            ajax: {
                url: '/api/products',
                data: {
                    page: () => (dataTable && dataTable.page() + 1) || 1
                }
            },
            processing: true,
            serverSide: true,
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'price' }
            ]
        })
    </script>
</body>
</html>