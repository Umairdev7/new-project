<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3 col-8 bg-success-subtle py-2 text-center">
            <h1>Calculator Result</h1>
            </div>
            <div class="mb-3 col-8 bg-warning-subtle py-2 text-center">
            <p>Result: {{ $result }}</p>
            </div>

            <div class="mb-3">
            <a href="{{ url('/calculator') }}" class="btn btn-secondary">Back to Calculator</a>
            </div>
        </div>
</div>
</div>
</body>
</html>
