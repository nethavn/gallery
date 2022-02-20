<?php namespace nethavn\gallery\Components;

use Cms\Classes\ComponentBase;
use nethavn\gallery\Models\Gallery as GalleryModel;
use Lang;

class GallerySlug extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'nethavn.gallery::lang.galleryslug.title',
            'description' => 'nethavn.gallery::lang.galleryslug.description',
        ];
    }

    public function defineProperties()
    {
        return [
            'slug'         => [
                'title'       => 'nethavn.gallery::lang.slug.title',
                'description' => 'nethavn.gallery::lang.slug.description',
                'default'     => '{{:slug}}',
                'type'        => 'string',
            ],
            'lang'         => [
                'title'       => 'nethavn.gallery::lang.misc.title',
                'description' => 'nethavn.gallery::lang.misc.description',
                'type'        => 'string',
                'default'     => Lang::get('nethavn.gallery::lang.misc.defaultname'),
            ],
            'thumbnail'    => [
                'title'       => 'nethavn.gallery::lang.thumbnail.title',
                'description' => 'nethavn.gallery::lang.thumbnail.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('nethavn.gallery::lang.groups.options'),
                'options'     => ['true' => 'nethavn.gallery::lang.thumbnail.optionstrue', 'false' => 'nethavn.gallery::lang.thumbnail.optionsfalse'],
            ],
            'caption'      => [
                'title'       => 'nethavn.gallery::lang.caption.title',
                'description' => 'nethavn.gallery::lang.caption.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('nethavn.gallery::lang.groups.options'),
                'options'     => ['true' => 'nethavn.gallery::lang.caption.optionstrue', 'false' => 'nethavn.gallery::lang.caption.optionsfalse'],
            ],
            'desc'         => [
                'title'       => 'nethavn.gallery::lang.desc.title',
                'description' => 'nethavn.gallery::lang.desc.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('nethavn.gallery::lang.groups.options'),
                'options'     => ['true' => 'nethavn.gallery::lang.desc.optionstrue', 'false' => 'nethavn.gallery::lang.desc.optionsfalse'],
            ],
            'counter'      => [
                'title'       => 'nethavn.gallery::lang.counter.title',
                'description' => 'nethavn.gallery::lang.counter.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('nethavn.gallery::lang.groups.options'),
                'options'     => ['true' => 'nethavn.gallery::lang.counter.optionstrue', 'false' => 'nethavn.gallery::lang.counter.optionsfalse'],
            ],
            'controls'     => [
                'title'       => 'nethavn.gallery::lang.controls.title',
                'description' => 'nethavn.gallery::lang.controls.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('nethavn.gallery::lang.groups.options'),
                'options'     => ['true' => 'nethavn.gallery::lang.controls.optionstrue', 'false' => 'nethavn.gallery::lang.controls.optionsfalse'],
            ],
            'preload'      => [
                'title'             => 'nethavn.gallery::lang.preload.title',
                'description'       => 'nethavn.gallery::lang.preload.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'nethavn.gallery::lang.preload.validationMessage',
                'default'           => '1',
                'group'             => Lang::get('nethavn.gallery::lang.groups.options'),
            ],

            'mode'    => [
                'title'       => 'nethavn.gallery::lang.mode.title',
                'description' => 'nethavn.gallery::lang.mode.description',
                'type'        => 'dropdown',
                'default'     => 'lg-slide',
                'group'       => Lang::get('nethavn.gallery::lang.groups.effects'),
            ],
            'speed'   => [
                'title'             => 'nethavn.gallery::lang.speed.title',
                'description'       => 'nethavn.gallery::lang.speed.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'nethavn.gallery::lang.speed.validationMessage',
                'default'           => '600',
                'group'             => Lang::get('nethavn.gallery::lang.groups.effects'),
            ],
            'loop'    => [
                'title'       => 'nethavn.gallery::lang.loop.title',
                'description' => 'nethavn.gallery::lang.loop.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('nethavn.gallery::lang.groups.effects'),
                'options'     => ['true' => 'nethavn.gallery::lang.loop.optionstrue', 'false' => 'nethavn.gallery::lang.loop.optionsfalse'],
            ],
            'auto'    => [
                'title'       => 'nethavn.gallery::lang.auto.title',
                'description' => 'nethavn.gallery::lang.auto.description',
                'type'        => 'dropdown',
                'default'     => 'false',
                'group'       => Lang::get('nethavn.gallery::lang.groups.effects'),
                'options'     => ['true' => 'nethavn.gallery::lang.auto.optionstrue', 'false' => 'nethavn.gallery::lang.auto.optionsfalse'],
            ],
            'pause'   => [
                'title'             => 'nethavn.gallery::lang.pause.title',
                'description'       => 'nethavn.gallery::lang.pause.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'nethavn.gallery::lang.pause.validationMessage',
                'default'           => '2000',
                'group'             => Lang::get('nethavn.gallery::lang.groups.effects'),
            ],
            'escKey'  => [
                'title'       => 'nethavn.gallery::lang.escKey.title',
                'description' => 'nethavn.gallery::lang.escKey.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('nethavn.gallery::lang.groups.effects'),
                'options'     => ['true' => 'nethavn.gallery::lang.escKey.optionstrue', 'false' => 'nethavn.gallery::lang.escKey.optionsfalse'],
            ],
            'height'  => [
                'title'             => 'nethavn.gallery::lang.height.title',
                'description'       => 'nethavn.gallery::lang.height.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'nethavn.gallery::lang.height.validationMessage',
                'default'           => '70',
                'group'             => Lang::get('nethavn.gallery::lang.groups.thumbs'),
            ],
            'width'   => [
                'title'             => 'nethavn.gallery::lang.width.title',
                'description'       => 'nethavn.gallery::lang.width.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'nethavn.gallery::lang.width.validationMessage',
                'default'           => '100',
                'group'             => Lang::get('nethavn.gallery::lang.groups.thumbs'),
            ],
            'resizer' => [
                'title'       => 'nethavn.gallery::lang.resizer.title',
                'description' => 'nethavn.gallery::lang.resizer.description',
                'type'        => 'dropdown',
                'default'     => 'auto',
                'options'     => ['auto' => 'nethavn.gallery::lang.resizer.optionsauto', 'exact' => 'nethavn.gallery::lang.resizer.optionsexact', 'portrait' => 'nethavn.gallery::lang.resizer.optionsportrait', 'landscape' => 'nethavn.gallery::lang.resizer.optionslandscape', 'crop' => 'nethavn.gallery::lang.resizer.optionscrop'],
                'group'       => Lang::get('nethavn.gallery::lang.groups.thumbs'),
            ],
        ];
    }

    public function getModeOptions()
    {
        return $this->getTransitions();
    }

    private function getTransitions()
    {
        return [
            'lg-slide'                    => 'Slide',
            'lg-fade'                     => 'Fade',
            'lg-zoom-in'                  => 'Zoom In',
            'lg-zoom-in-big'              => 'Zoom In Big',
            'lg-zoom-out'                 => 'Zoom Out',
            'lg-zoom-out-big'             => 'Zoom Out Big',
            'lg-zoom-out-in'              => 'Zoom Out In',
            'lg-zoom-in-out'              => 'Zoom In Out',
            'lg-soft-zoom'                => 'Soft Zoom',
            'lg-scale-up'                 => 'Scale Up',
            'lg-slide-circular'           => 'Slide Circular',
            'lg-slide-circular-vertical'  => 'Slide Circular Vertical',
            'lg-slide-vertical'           => 'Slide Vertical',
            'lg-slide-vertical-growth'    => 'Slide Vertical Growth',
            'lg-slide-skew-only'          => 'Slide Skew Only',
            'lg-slide-skew-only-rev'      => 'Slide Skew Only Reverse',
            'lg-slide-skew-only-y'        => 'Slide Skew Only-Y',
            'lg-slide-skew-only-y-rev'    => 'Slide Skew Only-Y Reverse',
            'lg-slide-skew'               => 'Slide Skew',
            'lg-slide-skew-rev'           => 'Slide Skew Reverse',
            'lg-slide-skew-cross'         => 'Slide Skew Cross',
            'lg-slide-skew-cross-rev'     => 'Slide Skew Cross Reverse',
            'lg-slide-skew-ver'           => 'Slide Skew Vertical',
            'lg-slide-skew-ver-rev'       => 'Slide Skew Vertical Reverse',
            'lg-slide-skew-ver-cross'     => 'Slide Skew Vertical Cross',
            'lg-slide-skew-ver-cross-rev' => 'Slide Skew Vertical Cross Reverse',
            'lg-lollipop'                 => 'Lollipop',
            'lg-lollipop-rev'             => 'Lollipop Reverse',
            'lg-rotate'                   => 'Rotate',
            'lg-rotate-rev'               => 'Rotate Reverse',
            'lg-tube'                     => 'Tube',
            'lg-start-zoom'               => 'Start Zoom',
        ];
    }

    public function onRun()
    {
        $this->addCss('assets/css/lightgallery.min.css');
        $this->addCss('assets/css/lg-transitions.min.css');
        $this->addJs('assets/js/lightgallery.min.js');
        $this->addJs('assets/js/lg-thumbnail.min.js');
        $this->addJs('assets/js/lg-autoplay.min.js');
        $this->addJs('assets/js/lg-pager.min.js');
        $this->addJs('assets/js/lg-zoom.min.js');
        $this->addJs('assets/js/lg-fullscreen.min.js');
        $this->addJs('assets/js/lg-video.min.js');
        $this->addJs('assets/js/picturefill.min.js');

        $this->gallery = $this->page['gallery'] = GalleryModel::where('slug', $this->property('slug'))->isPublished()->first();;
    }

    public function onRender()
    {
        // Inject all gallery properties to page.
        foreach ($this->getProperties() as $key => $value) {
            $this->page[$key] = $value;
        }
    }
}
