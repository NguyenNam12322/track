

<style type="text/css">
    
    .child-nav{
        margin-left: 15px;
    }
</style>




<li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link ">
        <p>Danh mục</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('posts.index') }}"
       class="nav-link {{ Request::is('order_list') ? 'active' : '' }}">
        <p>Bài viết </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('products.index') }}"
       class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <p>Products</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('lienhead') }}"
       class="nav-link {{ Request::is('order_list') ? 'active' : '' }}">
        <p>Liên hệ </p>
    </a>
</li>







<style type="text/css">
    
    .child-nav a{
        width: 100%;
    }
</style>

<script type="text/javascript">
    $('.child-nav').hide();

    $('.child-navs').hide();

    $(".open").bind("click", function(){

        var acction = $(".open").text();

        if(acction =='+'){
            $('.child-nav').show();
            $('.open').text('-');
        }
        else{
            $('.child-nav').hide();
            $('.open').text('+');
        }
    });

    $(".opens-fe").bind("click", function(){

        var acction = $(this).text();

        if(acction =='+'){
            
            $(".opens-fe").text('-');
            $('.child-navs').show();
        }
        else{
            
            $(this).text('+');
            $('.child-navs').hide();
        }
    });
    
</script>






