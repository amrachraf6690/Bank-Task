<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money | Home Page</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Transfer Money</h2>
    @if(session('success'))
    <div class="container mt-5">
        <div class="alert alert-success">
            <strong>Done!</strong> {{session('success')}}
        </div>
    </div>
    @endif
    <!-- Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Current Balance</th>
                <th>Send To</th>
                <th>Send From</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->current_balance}}</td>
                <td><a href="{{route('to',['id'=>$user->id])}}">Send To</a></td>
                <td><a href="{{route('from',['id'=>$user->id])}}">Send From</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Pagination -->
    <nav aria-label="Page navigation">
        {{$users->links('vendor.pagination.bootstrap-4')}}
    </nav>
</div>

<!-- Add Bootstrap JS and jQuery script links -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
