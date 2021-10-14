<?php
namespace App\Orchid\Layouts;

use App\Models\Event;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class EventListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'events';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (Event $event) {
                    return Link::make($event->title)
                        ->route('platform.event.edit', $event);
                }),

            TD::make('created_at', 'Створено'),
            TD::make('updated_at', 'Остання редакція'),
        ];
    }
}