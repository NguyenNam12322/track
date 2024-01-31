<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(isset($arr_number))
    @foreach($arr_number as $numbers)
        <sitemap>
            <loc>https://dienmaynguoiviet.vn/sitemap_pc{{trim($numbers)}}</loc>
            <lastmod>{{ Carbon\Carbon::now()->format('Y-m-d') }}</lastmod>
        </sitemap>
    @endforeach    
    @endif
    <sitemap>
        <loc>https://dienmaynguoiviet.vn/sitemap_brand.xml</loc>
        <lastmod>{{ Carbon\Carbon::now()->format('Y-m-d') }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://dienmaynguoiviet.vn/sitemap_pc.xml</loc>
        <lastmod>{{ Carbon\Carbon::now()->format('Y-m-d') }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://dienmaynguoiviet.vn/sitemap_article.xml</loc>
        <lastmod>{{ Carbon\Carbon::now()->format('Y-m-d') }}</lastmod>
    </sitemap>
</sitemapindex>