<html>
<head>

</head>
<body>
<p>Test Image Upload</p>

{{$user->avatar}}
    <img src="/thumbnail_images/{{$user->avatar}}" style="width: 150px; height: 150px; float: left; border-radius: 50%" />
        <form method="post" action="/uploadTestImage" enctype="multipart/form-data">

            <div class="col-md-4">
                <input type="file" name="image" />
            </div>

            <input type="submit" class="btn btn-primary" value="Upload"/>
            {{csrf_field()}}
        </form>
</body>
</html>