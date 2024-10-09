<?php
/*

---------------------------------------
Kirby Configuration
---------------------------------------

*/

return [
	'environment' => 'production',
  'debug' => true,

  'date.handler' => 'strftime',
  'locale' => 'fr_FR.UTF-8',

	// Autoresize plugin
	'medienbaecker.autoresize.maxWidth' => 2000,
  'medienbaecker.autoresize.maxHeight' => 2000,
  'medienbaecker.autoresize.quality' => 90,
  'medienbaecker.autoresize.excludeTemplates' => [],
  'medienbaecker.autoresize.excludePages' => [],

	// Markdown plugin
	'community.markdown-field.buttons'    => [['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], 'bold', 'italic', 'divider', 'link','pagelink', 'email', 'file', 'divider', 'ul', 'ol', 'blockquote'],
	'community.markdown-field.font'       => [
		'family'  => 'sans-serif',
		'scaling' => true,
		'size'    => 'regular',
	],
	'community.markdown-field.query'      => [
		'pagelink' => null,
		'images'   => 'page.images',
		'files'    => 'page.files.filterBy("type", "!=", "image")',
	],
	'community.markdown-field.modals'     => true,
	'community.markdown-field.blank'      => false,
	'community.markdown-field.invisibles' => false,

	// thumbs
  
  'thumbs' => [
    'quality' => 85,
    'driver' => 'im',
    'presets' => [
      'default' => ['width' => 768],
      'crop' => ['width' => 800, 'height' => 450, 'crop' => 'center'],
      'cover' => [ 'width' => 1200],
    ],
    'srcsets' => [
      'default' => [300, 800, 1024, 1536],
      'cover' => [800, 1024, 1536, 2048],
      //  small
      'smalldefault' => [
        '300w' => ['width' => 300,'height' => 170, 'crop' => 'center'], 
        '450w' => ['width' => 450,'height' => 255, 'crop' => 'center'], 
        '600w' => ['width' => 600,'height' => 340, 'crop' => 'center'], 
        '800w' => ['width' => 800,'height' => 450, 'crop' => 'center'] 
      ],
      'smallavif' => [
        '300w' => ['width' => 300, 'height' => 170, 'format' => 'avif', 'crop' => 'center'], 
        '450w' => ['width' => 450, 'height' => 255, 'format' => 'avif', 'crop' => 'center'], 
        '600w' => ['width' => 600, 'height' => 340, 'format' => 'avif', 'crop' => 'center'], 
        '800w' => ['width' => 800, 'height' => 450, 'format' => 'avif', 'crop' => 'center'] 
      ],
      'smallwebp' => [
        '300w' => ['width' => 300, 'height' => 170, 'format' => 'webp', 'crop' => 'center'], 
        '450w' => ['width' => 450, 'height' => 255, 'format' => 'webp', 'crop' => 'center'], 
        '600w' => ['width' => 600, 'height' => 340, 'format' => 'webp', 'crop' => 'center'], 
        '800w' => ['width' => 800, 'height' => 450, 'format' => 'webp', 'crop' => 'center'] 
      ],
      //  full
      'fulldefault' => [
        '300w' => ['width' => 300, 'height' => 170, 'crop' => 'center'], 
        '450w' => ['width' => 450, 'height' => 255, 'crop' => 'center'], 
        '600w' => ['width' => 600, 'height' => 340, 'crop' => 'center'], 
        '800w' => ['width' => 800, 'height' => 450, 'crop' => 'center'], 
        '1024w' => ['width' => 1024, 'height' => 576, 'crop' => 'center'],
        '1536w' => ['width' => 1536, 'height' => 864, 'crop' => 'center'] 
      ],
      'fullavif' => [
        '300w' => ['width' => 300, 'height' => 170, 'format' => 'avif', 'crop' => 'center'], 
        '450w' => ['width' => 450, 'height' => 255, 'format' => 'avif', 'crop' => 'center'], 
        '600w' => ['width' => 600, 'height' => 340, 'format' => 'avif', 'crop' => 'center'], 
        '800w' => ['width' => 800, 'height' => 450, 'format' => 'avif', 'crop' => 'center'], 
        '1024w' => ['width' => 1024, 'height' => 576, 'format' => 'avif', 'crop' => 'center'],
        '1536w' => ['width' => 1536, 'height' => 864, 'format' => 'avif', 'crop' => 'center'] 
      ],
      'fullwebp' => [
        '300w' => ['width' => 300, 'height' => 170, 'format' => 'webp', 'crop' => 'center'], 
        '450w' => ['width' => 450, 'height' => 255, 'format' => 'webp', 'crop' => 'center'], 
        '600w' => ['width' => 600, 'height' => 340, 'format' => 'webp', 'crop' => 'center'], 
        '800w' => ['width' => 800, 'height' => 450, 'format' => 'webp', 'crop' => 'center'], 
        '1024w' => ['width' => 1024, 'height' => 576, 'format' => 'webp', 'crop' => 'center'],
        '1536w' => ['width' => 1536, 'height' => 864, 'format' => 'webp', 'crop' => 'center'] 
      ]
    ]
  ],

  'routes' => [
    [
      'pattern' => 'textes',
      'action' => function () {
        $firstChild = page('textes')->children()->listed()->first();
        if($firstChild) {
          go($firstChild->url());
        } else {
          return page('textes');
        }
      },
    ],
    [
      'pattern' => 'actualites',
      'action' => function () {
        $firstChild = page('actualites')->children()->listed()->first();
        if($firstChild) {
          go($firstChild->url());
        } else {
          return page('actualites');
        }
      },
    ],
  ],
];
