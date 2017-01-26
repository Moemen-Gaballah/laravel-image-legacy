<?php



return array(

    /*
    |--------------------------------------------------------------------------
    | Default Image Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default image "driver" used by Imagine library
    | to manipulate images.
    |
    | Supported: "gd", "imagick", "gmagick"
    |
    */
    'driver' => 'gd',
    
    /*
    |--------------------------------------------------------------------------
    | Memory limit
    |--------------------------------------------------------------------------
    |
    | When manipulating an image, the memory limit is increased to this value
    |
    */
    'memory_limit' => '128M',
    
    /*
    |--------------------------------------------------------------------------
    | Image Filters
    |--------------------------------------------------------------------------
    |
    | 
    |
    */
    'filters' => [
        'blur' => \Folklore\Image\Filter\Blur::class,
        'colorize' => \Folklore\Image\Filter\Colorize::class,
        'gamma' => \Folklore\Image\Filter\Gamma::class,
        'grayscale' => \Folklore\Image\Filter\Grayscale::class,
        'interlace' => \Folklore\Image\Filter\Interlace::class,
        'negative' => \Folklore\Image\Filter\Negative::class,
        'rotate' => \Folklore\Image\Filter\Rotate::class
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Default Source
    |--------------------------------------------------------------------------
    |
    | This option define the default source to be used by the Image facade. 
    |
    */
    'source' => 'public',
    
    /*
    |--------------------------------------------------------------------------
    | Sources
    |--------------------------------------------------------------------------
    |
    | The list of sources where you store images.
    |
    | Supported driver: "local", "filesystem", "url"
    |
    */
    'sources' => [
        
        'public' => [
            // The local driver use a local path on the machine.
            'driver' => 'local',
            
            // The path where the images are stored.
            'path' => public_path()
        ],
        
        'cloud' => [
            // The filesystem driver lets you use the filesystem from laravel.
            'driver' => 'filesystem',
            
            // The path on the disk where the images are stored. If set to null,
            // it will start from the root.
            'path' => null,
            
            // The disk where the images are stored.
            'disk' => 'local',
            
            // Cache the filesystem file on local machine.
            // Can be useful for remote file.
            'cache' => true,
            
            // The path where you want to put cached files
            'cache_path' => storage_path('image/cache')
        ]
        
    ],
    
    /*
    |--------------------------------------------------------------------------
    | URL
    |--------------------------------------------------------------------------
    |
    | You can define routes to handle images.
    |
    */
    'url' => [
        // The format of the url that will be generated. The {filters} placeholder
        // will be replace by the filters according to the filters_format.
        'format' => '{dirname}/{basename}{filters}.{extension}',
        
        // The format of the filters that will replace {filters} in the
        // url format below. The {filter} placeholder will be replace by
        // each filter according to the filter_format and joined
        // by the filter_separator.
        'filters_format' => '-image({filter})',
        
        // The format of a filter.
        'filter_format' => '{key}({value})',
        
        // The separator for each filter
        'filter_separator' => '-'
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    |
    | You can define routes to handle images.
    |
    */
    'routes' => [
        'default' => [
            // The path of the route. {pattern} will be replaced by the url pattern
            // for this route according to the url format.
            'route' => '{pattern}',
            
            // A domain that will be used by the route
            'domain' => null,
            
            // Any middleware you want ot add on the route.
            'middleware' => [],
            
            // The name of the source to get the image. If it is set to null,
            // it will get use the default source.
            'source' => null,
            
            // Allow to specify a size as filter
            'allow_size' => true,
            
            // Allow to specify filters in url. You can also set this to
            // an array of specific filters to restrict this route to those filters.
            // Example: ["negative"]
            'allow_filters' => true,
            
            // Disallow some filters. Can be set to an array of filters.
            'disallow_filters' => false,
            
            // Any url options you want to override.
            'url' => [],
            
            // You can specify base filters that will be applied to any image
            // on this route.
            'filters' => [
                'width' => 100
            ],
            
            // Expires header in seconds
            'expires' => 3600 * 24 * 31,
            
            // Any headers you want to add on the image
            'headers' => [],
            
            // Cache the file on local machine
            'cache' => true,
            
            // The path where the images are stored. It is defined to public path,
            // so the files would be statically served on next request.
            'cache_path' => public_path()
        ]
    ]

);