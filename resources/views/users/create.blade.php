@extends('layout.navbar')

@section('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@endsection
@section('content')
<div class="mb-3 p-5" >
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="Label" class="form-label">Label</label>
        <input type="text" class="form-control" name="label">

        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" id="">

        <label for="Title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="">

        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>

        <label for="upload" class="form-label">upload Image</label>
        <input type="file" class="form-control" name="image" id="">

        <label for="upload" class="form-label">upload Image Master</label>
        <input type="file" class="form-control" name="master_image" id="">

        <label for="Title" class="form-label">Master Name</label>
        <input type="text" class="form-control" name="master_name" id="">
<br><center>
        <button type="submit" class="btn btn-primary" >Submit</button>
</center>



    </form>
    @endsection
</div>
</body>
</html>
