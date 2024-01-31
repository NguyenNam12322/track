
<?php  $url_domain =  Config::get('app.url') ?>

<div class="col-md-12 draft-article" >
    <button type="button" class="btn btn-info article-but" onclick="setDataForm()">Bài viết nháp</button>
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<?php 
    if(Schema::hasTable('categories')){
        $category =    DB::table('categories')->select('namecategory', 'id')->where('parent_id', 0)->get();
        $new_category = [];
        if(isset($category)){
            foreach ($category as  $value) {
               $new_category[$value->id] = $value->namecategory;
            }
        }
        
        $categoryselected = !empty($post)?$post['category']:'1';
    }
     
        
?>
@if(Schema::hasTable('categories'))
<div class="form-group col-sm-6">
    {!! Form::label('category', 'category:') !!}
   {{ Form::select('category', @$new_category, $categoryselected, ['id' => 'category', 'class' => 'form-control']) }}
</div>
@endif

<!-- shortcontent Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('shortcontent', 'Mô tả ngắn:') !!}
    {!! Form::textarea('shortcontent', null, ['class' => 'form-control content-input']) !!}
</div>




<!-- Content Field -->
<div class="form-group col-sm-12 col-md-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control content-input']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>




<script>
    var item_local_store =  JSON.parse(localStorage.getItem('infopost'));

    if(item_local_store!=null){
        $('.draft-article').show();
    }
    else{
        $('.draft-article').hide();
    }




    function getDataform(){

        if(item_local_store !=null){

            localStorage.removeItem('infopost');

        }

        const title = $('#title').val();
        const shortcontent = $('#shortcontent').val();
        const content = CKEDITOR.instances.content.getData();

        infopost = [title, shortcontent, content];

        localStorage.setItem('infopost', JSON.stringify(infopost));

         $('.draft-article').show();

    }

    $('#shortcontent').bind("change", function() { 
        getDataform();

    });

    
    let ar_image = [];

    // function getBase64(file) {
    //    var reader = new FileReader();
    //    reader.readAsDataURL(file);
    //    reader.onload = function () {
    //         ar_image.push(reader.result);
    //         console.log(ar_image);
           
    //         const max = parseInt((ar_image.length)/2)
    //         for (i = 0; i <= max; i++) {
                
    //                 for(j=i; j<=i*2; j++){
    //                     '<td width="50%" align="center"><a href="javascript:void(0); title="Click để chuyển ảnh vào mô tả"><img src="++" height="60"></a></td>';
    //                 } 
               
    //         }
         
    //    };
    //    reader.onerror = function (error) {
    //      // console.log('Error: ', error);
    //    };
    // }

    $('#file-image-content').bind("change", function() { 
        
        var file = document.querySelector('#file-image-content').files[0];
        getBase64(file);



    });


    
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ $url_domain }}/ckfinder.html',
        filebrowserImageBrowseUrl: '{{ $url_domain }}/ckfinder.html?Type=Images',
        filebrowserUploadUrl: '{{ $url_domain }}/js/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '{{ $url_domain }}/js/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserWindowWidth : '1000',
        filebrowserWindowHeight : '700',

        on: {
            change: function( evt ) {

                
                getDataform();
            }
        },

        
    } );

    function setDataForm() {

        item_local_stores =  JSON.parse(localStorage.getItem('infopost'));
        console.log(item_local_stores)
        
        CKEDITOR.instances.content.setData(item_local_stores[2]);
        $('#title').val(item_local_stores[0]);
        $('#shortcontent').val(item_local_stores[1]);
        $('.article-but').css('color', 'red');

    }

   

    $(document).ready(function()
    {
        $(window).bind("beforeunload", function() { 
            return confirm("Do you really want to close?"); 

        });

       
    });
</script>



