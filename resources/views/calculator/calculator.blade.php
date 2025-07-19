<html>
<head>
    <title>Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">


</head>
<body>
<div class="container text-center">
    <div class="row">
        <div class="col-sm-2 bg-success-subtle py-2 text-center text-center">
            <h2>Calculator</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 bg-primary-subtle py-2 text-center ">
            @if(isset($result))
                <h3>Result: {{ $result }}</h3>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-2 bg-dark-subtle py-2">
                <form method="POST" action="{{ route('calculate') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="number" class="form-control" name="num1" placeholder="Enter First Number"  required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="num2" placeholder="Enter Second Number"  required>
                    </div>
                    <div class="mb-3 text-center">
                        <div class="operation-buttons">
                            <button type="submit" name="operation" class="btn btn-success" value="+">+</button>
                            <button type="submit" name="operation" class="btn btn-success" value="-">−</button>
                            <button type="submit" name="operation" class="btn btn-success" value="*">×</button>
                            <button type="submit" name="operation" class="btn btn-success"  value="/">÷</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
