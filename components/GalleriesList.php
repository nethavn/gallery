<?php namespace nethavn\gallery\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use nethavn\gallery\Models\Gallery as galleryList;

class GalleriesList extends ComponentBase
{
    /**
     * A collection of galleries to display
     * @var Collection
     */
    public $gallerylist;

    /**
     * Message to display when there are no messages.
     * @var string
     */
    public $noGalleriesMessage;

    /**
     * Reference to the page name for linnethavnng to galleries.
     * @var string
     */
    public $galleryPage;

    /**
     * Reference to the page name for linnethavnng to categories.
     * @var string
     */
    public $categoryPage;


    public function componentDetails()
    {
        return [
            'name'        => 'nethavn.gallery::lang.gallerylist.name',
            'description' => 'nethavn.gallery::lang.gallerylist.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'galleryPage' => [
                'title'         => 'nethavn.gallery::lang.gallerylist.galleryPage',
                'description'   => 'nethavn.gallery::lang.gallerylist.galleryPage_description',
                'type'          => 'dropdown',
                'group'         => 'Links',
                'default'       => 'gallery'
            ],
            'categoryPage' => [
                'title'         => 'nethavn.gallery::lang.gallerylist.categoryPage',
                'description'   => 'nethavn.gallery::lang.gallerylist.categoryPage_description',
                'type'          => 'dropdown',
                'group'         => 'Links',
                'default'       => 'gallery/category'
            ],
            'noGalleriesMessage' => [
                'title'         => 'nethavn.gallery::lang.gallerylist.noGalleriesMessage',
                'description'   => 'nethavn.gallery::lang.gallerylist.noGalleriesMessage_description',
                'type'          => 'string',
                'default'       => 'No galleries found',
                'showExternalParam' => false
            ]
        ];
    }

    public function getGalleryPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName','baseFileName');
    }

    public function getCategoryPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName','baseFileName');
    }

    public function onRun()
    {
        $this->prepareProperties();

        $this->gallerylist = $this->page['galleries'] = $this->listGalleries();


    }

    protected function prepareProperties()
    {
        $this->noGalleriesMessage = $this->page['noGalleriesMessage'] = $this->property('noGalleriesMessage');

        /*
        * Page links
        */
        $this->galleryPage = $this->page['galleryPage']= $this->property('galleryPage');

        $this->categoryPage = $this->page['categoryPage']= $this->property('categoryPage');
    }

    protected function listGalleries()
    {
        /*
        * Fetch all published galleries
        */
        $galleries = new galleryList();
        $galleries = $galleries->isPublished()->get();

        /*
        * Set url's for each gallery
        */

        $galleries->each(function($gallery){
            $gallery->setUrl($this->galleryPage,$this->controller);

            $gallery->categories->each(function($category){
                $category->setUrl($this->categoryPage,$this->controller);
            });
        });

        return $galleries;
    }
}