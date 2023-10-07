<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Money | From {{$user->name}}</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Send money from ({{$user->name}})</h2>
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleSelect">To</label>
            <select class="form-control" id="exampleSelect" name="to_id">
                @foreach($users as $to)
                <option value="{{$to->id}}">{{$to->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Money to be transfered</label>
            <input type="number" class="form-control" id="" placeholder="Enter quantitiy" name="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-warning" href="{{route('home')}}">Back Home</a>
    </form>
    
</div>

<!-- Add Bootstrap JS and jQuery script links -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
