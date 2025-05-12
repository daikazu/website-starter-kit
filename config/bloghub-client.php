<?php

return [

    /**
     * Site Code used to retrieve posts from the BlogHub API
     */
    'blog_site_code' => env('BLOG_HUB_SITE_CODE', 'EXAMPLE'),

    /**
     * BlogHub API URL
     */
    'blog_hub_url' => env('BLOG_HUB_URL', 'https://bloghub.tjmpromos.com/api/'),

    /**
     * Local Path for Blog
     */
    'local_blog_path' => env('BLOG_HUB_PATH', 'blog/'),

    /**
     * Numbe of posts to display per page
     */
    'pagination' => env('BLOG_HUB_PAGINATION', 12),

    /**
     * Should index pages have a trailing slash in navigation URLs?
     */
    'with_index_trailing_slash' => env('BLOG_HUB_INDEX_TRAILING_SLASH', true),

    /**
     * Blog sort order (asc or desc)
     */
    'sort_order' => 'desc',

    /**
     * Cache Time in Minutes
     */
    'cache_time' => 300,
];
