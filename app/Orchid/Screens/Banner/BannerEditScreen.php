<?php

namespace App\Orchid\Screens\Banner;

use App\Models\Banner;

use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class BannerEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = '';

    /**
     * @var bool
     */
    public $exists = false;

    public function __construct()
    {
        $this->name = __('banners.edit_banner');
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Banner $banner): array
    {
        $this->exists = $banner->exists;

        if ($this->exists) {
            $this->name = __('banners.edit_banner');
        }

        $banner->load('attachment');

        return [
            'banner' => $banner
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create new')
                ->icon('save')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Save')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                TextArea::make('banner.title')
                    ->rows(3)
                    ->title(__('banners.title'))
                    ->placeholder(__('banners.title_placeholder')),

                TextArea::make('banner.subtitle')
                    ->title(__('banners.subtitle'))
                    ->rows(3)
                    ->placeholder(__('banners.subtitle_placeholder')),


                Input::make('banner.button_text')
                    ->title(__('banners.button_text'))
                    ->placeholder(__('banners.button_text_placeholder')),

                Input::make('banner.href')
                    ->title(__('banners.href'))
                    ->placeholder(__('banners.href_placeholder')),

                CheckBox::make('banner.is_active')
                    ->title('banners.is_active')
                    ->placeholder('banners.is_active_placeholder')
                    ->sendTrueOrFalse(),

                Cropper::make('banner.image_id')
                    ->targetId()
                    ->title(__('banners.image'))
                    ->help(__('banners.image_help'))
                    ->width(735)
                    ->height(454),

            ])
        ];
    }

    /**
     * @param Banner $banner
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Banner $banner, Request $request)
    {
        $banner->fill($request->get('banner'))->save();

        $banner->attachment()->syncWithoutDetaching(
            $request->input('banner.attachment', [])
        );

        Alert::info(__('banners.success_info'));

        return redirect()->route('platform.banner.list');
    }

    /**
     * @param Banner $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Banner $banner)
    {
        $banner->delete();

        Alert::info(__('banners.delete_info'));

        return redirect()->route('platform.banner.list');
    }
}
