<!-- Meta Title Field -->


<div class="form-group col-sm-6">
    {!! Form::label('meta_title', 'Meta Title: Khuyến nghị 60 kí tự', ['class' => 'form-title']) !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta_content', 'Meta Content:Khuyến nghị 160 kí tự', ['class' => 'form-content']) !!}
    {!! Form::text('meta_content', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Og Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta_og_title', 'Meta Og Title:Khuyến nghị 60 kí tự', ['class' => 'form-ogtitle']) !!}
    {!! Form::text('meta_og_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Og Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta_og_content', 'Meta Og Content:Khuyến nghị 160 kí tự', ['class' => 'form-ogcontent']) !!}
    {!! Form::text('meta_og_content', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Keywords Field -->


<div class="form-group col-sm-6">
    {!! Form::label('meta_key_words', 'Meta Keywords:Khuyến nghị 60 kí tự', ['class' => 'form-keywords']) !!}
    {!! Form::text('meta_key_words', null, ['class' => 'form-control']) !!}
</div>

<script type="text/javascript">
    $('#meta_title').bind("keydown", function(){
        const valueTitle = $('#meta_title').val();
        number_text      = valueTitle.length;
        $('.form-title').text('Meta Title: Khuyến nghị 60 kí tự:Kí tự nhập '+number_text)
        

    });

    $('#meta_content').bind("keydown", function(){
        const valuecontent = $('#meta_content').val();
        number_text      = valuecontent.length;
        $('.form-content').text('Meta Content: Khuyến nghị 160 kí tự:Kí tự nhập '+number_text)
        
    });

    $('#meta_og_title').bind("keydown", function(){
        const valuecontent = $(this).val();
        number_text      = valuecontent.length;
        $('.form-ogtitle').text('Meta Og Title: Khuyến nghị 60 kí tự:Kí tự nhập '+number_text)
        
    });

    $('#meta_og_content').bind("keydown", function(){
        const valuecontent = $(this).val();
        number_text      = valuecontent.length;
        $('.form-ogcontent').text('Meta ogContent: Khuyến nghị 160 kí tự:Kí tự nhập '+number_text)
        
    });

    $('#meta_key_words').bind("keydown", function(){
        const valuecontent = $(this).val();
        number_text      = valuecontent.length;
        $('.form-keywords').text('Meta Keywords:Khuyến nghị 60 kí tự:Kí tự nhập '+number_text)
        
    });
    
    
</script>