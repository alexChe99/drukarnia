<?php
namespace App\Orchid\Screens;

use App\Orchid\Layouts\EventListLayout;
use App\Models\Event;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class EventListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Події';

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
            'events' => Event::paginate()
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
                ->route('platform.event.edit')
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
            EventListLayout::class
        ];
    }
}