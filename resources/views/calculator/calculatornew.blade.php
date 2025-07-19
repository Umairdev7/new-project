<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>Laravel Calculator</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="calculator">
    <h2>Calculator</h2>
    <form method="POST" action="{{ route('calculatenew') }}" id="calcForm">
        @csrf
        <input type="text" id="expression" name="expression" class="display" value="{{ old('expression', '') }}"  readonly>
        @if(isset($result))
            <div class="result">
                <strong>Result:</strong> {{ $result }}
            </div>
        @endif

        <div class="buttons">

            <button type="button" onclick="appendValue('{{ 7 }}')">{{ 7 }}</button>
            <button type="button" onclick="appendValue('{{ 8 }}')">{{ 8 }}</button>
            <button type="button" onclick="appendValue('{{ 9 }}')">{{ 9 }}</button>
            <button type="button" onclick="appendValue('{{ 4 }}')">{{ 4 }}</button>
            <button type="button" onclick="appendValue('{{ 5 }}')">{{ 5 }}</button>
            <button type="button" onclick="appendValue('{{ 6 }}')">{{ 6 }}</button>
            <button type="button" onclick="appendValue('{{ 1 }}')">{{ 1 }}</button>
            <button type="button" onclick="appendValue('{{ 2 }}')">{{ 2 }}</button>
            <button type="button" onclick="appendValue('{{ 3 }}')">{{ 3 }}</button>
            <button type="button" onclick="appendValue('{{ 0 }}')">{{ 0 }}</button>

            <button type="button" class="operator" onclick="appendValue('+')">+</button>
            <button type="button" class="operator" onclick="appendValue('-')">−</button>
            <button type="button" class="operator" onclick="appendValue('*')">×</button>
            <button type="button" class="operator" onclick="appendValue('/')">÷</button>

            <button type="button" onclick="clearDisplay()">C</button>

            <button type="submit" class="equal">=</button>
        </div>
    </form>
</div>

<script>
    function appendValue(value) {
        const display = document.getElementById('expression');
        display.value += value;
    }

    function clearDisplay() {
        document.getElementById('expression').value = '';
    }
</script>
</body>
</html>
