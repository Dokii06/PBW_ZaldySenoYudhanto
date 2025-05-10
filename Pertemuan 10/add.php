<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Add Article</h2>
                            <a href="index.php" class="btn btn-primary">List Articles</a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <!-- Ganti form action dan method -->
                        <!-- Pastikan Anda sudah menghubungkan ke database dengan benar -->
                        <form action="add-proccess.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" id="content" class="form-control"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="Programming">Programming</option>
                                    <option value="Business">Business</option>
                                    <option value="News">News</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="thumbnail" class="Thumbnail">Thumbnail</label>
                                <input type="file" accept="image/*" name="thumbnail" id="thumbnail" class="form-control">
                            </div>
                            <button type="submit" name="add" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>