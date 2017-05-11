<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('groups') }}">Group Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('groups') }}">View All Groups</a></li>
        <li><a href="{{ URL::to('groups/create') }}">Create a Group</a>
    </ul>
</nav>

<h1>All the Groups</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Parent</td>
            <td>Name</td>
            <td>Visible</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($groups as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->parent_id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->visible }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('groups/' . $value->id) }}">Show this Group</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('groups/' . $value->id . '/edit') }}">Edit this Group</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>