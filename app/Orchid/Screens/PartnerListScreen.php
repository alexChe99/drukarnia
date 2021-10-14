<?php
namespace App\Orchid\Screens;

use App\Orchid\Layouts\PartnerListLayout;
use App\Models\Partner;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PartnerListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Партнеры';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = '';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'partners' => Partner::paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Створити')
                ->icon('pencil')
                ->route('platform.partner.edit')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            PartnerListLayout::class
        ];
    }
}