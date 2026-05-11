'objectstore' => [
    'class' => '\\OC\\Files\\ObjectStore\\S3',
    'arguments' => [
        'bucket'         => '{{ nextcloud_s3_bucket }}',
        'hostname'       => '{{ nextcloud_s3_hostname }}',
        'key'            => '{{ nextcloud_s3_key }}',
        'secret'         => '{{ nextcloud_s3_secret }}',
        'use_ssl'        => true,
        'use_path_style' => true,    // needed for non-AWS providers
    ],
],