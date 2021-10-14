<?php
namespace App\Orchid\Layouts;

use App\Models\Direction;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class DirectionListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'directions';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (Direction $direction) {
                    return Link::make($direction->title)
                        ->route('platform.direction.edit', $direction);
                }),

            TD::make('created_at', 'Створено'),
            TD::make('updated_at', 'Остання редакція'),
        ];
    }
}