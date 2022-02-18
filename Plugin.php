<?php namespace nethavn\gallery;

use App;
use Event;
use Backend;
use System\Classes\PluginBase;

/**
 * gallery Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'nethavn.gallery::lang.plugin.name',
            'description' => 'nethavn.gallery::lang.plugin.description',
            'author'      => 'nethavn',
            'icon'        => 'icon-picture-o'
        ];
    }

    public function registerComponents()
    {
        return [
            'nethavn\gallery\Components\Gallery' => 'galleryId',
            'nethavn\gallery\Components\GallerySlug' => 'gallerySlug',
            'nethavn\gallery\Components\GalleriesList' => 'galleriesList'
        ];
    }

    public function registerPageSnippets()
    {
        return [
            'nethavn\gallery\Components\Gallery' => 'galleryId',
            'nethavn\gallery\Components\GallerySlug' => 'gallerySlug',
            'nethavn\gallery\Components\GalleriesList' => 'galleriesList'
        ];
    }

    public function registerNavigation()
    {
        return [
            'gallery' => [
                'label' => 'nethavn.gallery::lang.menu.name',
                'url'   => Backend::url('nethavn/gallery/galleries'),
                'icon'        => 'icon-picture-o',
                'permissions' => ['nethavn.gallery.*'],
                'order'       => 500,

                'sideMenu' => [
                    'new_gallery' => [
                        'label'       => 'nethavn.gallery::lang.menu.new_gallery',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('nethavn/gallery/galleries/create'),
                        'permissions' => ['nethavn.gallery.access_galleries']
                    ],
                    'galleries' => [
                        'label'       => 'nethavn.gallery::lang.menu.galleries',
                        'icon'        => 'icon-file-image-o',
                        'url'         => Backend::url('nethavn/gallery/galleries'),
                        'permissions' => ['nethavn.gallery.access_galleries']
                    ],
                    'new_category' => [
                        'label'       => 'nethavn.gallery::lang.menu.new_category',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('nethavn/gallery/categories/create'),
                        'permissions' => ['nethavn.gallery.access_galleries']
                    ],
                    'categories' => [
                        'label'       => 'nethavn.gallery::lang.menu.categories',
                        'icon'        => 'icon-server',
                        'url'         => Backend::url('nethavn/gallery/categories'),
                        'permissions' => ['nethavn.gallery.access_categories']
                    ]
                ]
            ],
        ];
    }

    public function registerPermissions()
    {
        return [
            'nethavn.gallery.*' => ['tab' => 'nethavn.gallery::lang.plugin.name', 'label' => 'nethavn.gallery::lang.permissions.all']
        ];
    }
}
