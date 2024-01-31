<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sửa html content</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"></script>
        <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
     
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>

        <div class="container">
            <h2>Horizontal form</h2>

            <form class="form-horizontal" action="{{ route('editpage')}}" method="POST">
               @csrf
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Page edit</label>

                    <textarea class="form-control" id="tinymce-editor" rows="40"  name="description">{{ $data }}</textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="path" value="{{ $path }}">
                    
                </div>
                        

            </form>
        </div>

        <script>
            CKEDITOR.replace( 'tinymce-editor' );
        </script>
        <!-- <script>
            tinymce.init({
                selector: '#tinymce-editor'
            });
        </script> -->
    </body>
</html>
