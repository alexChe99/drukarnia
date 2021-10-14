<?php
namespace App\Orchid\Screens;

use App\Orchid\Layouts\DirectionListLayout;
use App\Models\Direction;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class DirectionListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Напрямки діяльності';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Усі напрямки діяльності';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'directions' => Direction::paginate()
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
                ->route('platform.direction.edit')
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
            DirectionListLayout::class
        ];
    }
}