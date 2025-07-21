<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                {{-- edit user data --}}
                <h1>Edit User Data</h1>
    <form action="{{ route('user.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <lable for="username" class="form-lable">User Name</lable>
            <input type="text" value="{{ $users->name }}" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <lable for="useremail" class="form-lable">User Email</lable>
            <input type="email" value="{{ $users->email }}" class="form-control" name="useremail">
        </div>
        <div class="mb-3">
            <lable for="userabout" class="form-lable">About</lable>
            <br>
            <textarea name="userabout" id="" cols="30" rows="7">{{ $users->about }}</textarea>
            {{-- <input type="number" value="{{ $users->about }}" class="form-control" name="userabout"> --}}
        </div>
        <div class="mb-3">
            <input type="submit" value="Save" class="btn btn-success">
        </div>
    </form>
            </div>
        </div>
    </div>
</body>
</html>
