```json
'widget' => [
        'recent_post' =>
        [
            //section group
            //ordering
            'name'   =>  'blog_widget_recent_post',
            'global'    => 1,
            'sidebar'   => 1,
            'blade'  =>  'frontend.blog_widget_recent_post',
            'setting'=> [
                'title' => 'Recent Post',
                'limit' => 5,
                'update' => 1,
                'author' => 1,
                'oncat' => 'all',
                'orderby' => 'ASC',
                'showcat' => 1,
                'globalwidget'  => 0,
            ]

        ],
        'post_in_cat' =>
        [
            'name'   =>  'blog_widget_post_in_cat',
            'blade'  =>  'frontend.blog_widget_post_in_cat',
            'global'    => 0,
            'sidebar'   => 1,
            'setting'=> [
                'title'=> 'Posts in Category',
                'limit' => 5,
                'update' => 1,
                'author' => 1,
                'orderby' => 'ASC',
                'globalwidget'  => 1,
            ]

        ],
        'post_info' =>
        [
            'name'   =>  'blog_widget_post_info',
            'blade'  =>  'frontend.blog_widget_post_info',
            'global'    => 0,
            'sidebar'   => 0,
            'setting'=> [
                'title_size'=> 'h1',
                'cat' => '1',
                'lastupdate' => '1',
                'showemail' => 1,
                'showimg' => 1,
                'globalwidget'  => 1,
            ]
        ],

        'navi' =>
        [
            'name'   =>  'blog_widget_navi',
            'blade'  =>  'frontend.blog_widget_navi',
            'global'    => 0,
            'sidebar'   => 0,
            'setting'=> [
                'bullet'=> 'uk-icon-chevron-right',
                'color' => '#000000',
                'globalwidget'  => 1,
            ]
        ],
        'next_previous' =>
        [
            'name'   =>  'blog_widget_next_previous',
            'blade'  =>  'frontend.blog_widget_next_previous',
            'global'    => 0,
            'sidebar'   => 0,
            'setting'=> [
                'bullet'=> 'uk-icon-chevron-',
                'color' => '#ffffff',
                'globalwidget'  => 1,
            ]
        ],


        'category_list' =>
        [
            'name'   =>  'blog_widget_category_list',
            'blade'  =>  'frontend.blog_widget_category_list',
            'global'    => 1,
            'sidebar'   => 1,
            'setting'=> [
                'title'=> 'Category List',
                'showpostnum'=> 1,
                'limit' => 5,
                'orderby' => 'ASC',
                'globalwidget'  => 0,
            ]
        ],

        'category_index' =>
        [
            'name'   =>  'blog_widget_category_index',
            'blade'  =>  'frontend.blog_widget_category_index',
            'global'    => 1,
            'sidebar'   => 0,
            'setting'=> [
                'showcatname'=> 1,
                'showpostnum'=> 1,
                'itemperpage' => 5,
                'orderby' => 'DESC',
                'showauthor' => 1,
                'showupdate' => 1,
                'moretext'  => 'Read more..',
                'design'    => 1,
                'showcat'   => 1,
                'globalwidget'  => 1,
            ],
        ],

        'blog_index' =>
        [
            'name'   =>  'blog_widget_blog_index',
            'blade'  =>  'frontend.blog_widget_blog_index',
            'global'    => 0,
            'sidebar'   => 0,
            'defhtmlview'   => BlogLib::getBlogIndexContentView(),
            'defhtmledit'   => BlogLib::getBlogIndexContentEdit(),
            'setting'=> [
                'title'=> 'Blog list',
                'showpostnum'=> 1,
                'itemperpage' => 5,
                'orderby' => 'DESC',
                'showauthor' => 1,
                'showupdate' => 1,
                'moretext'  => 'Read more..',
                'design'    => 1,
                'showcat'   => 1,
                'globalwidget'  => 0,
            ],
        ],
 ]
 ```