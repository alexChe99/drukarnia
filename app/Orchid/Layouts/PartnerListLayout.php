<?php
namespace App\Orchid\Layouts;

use App\Models\Partner;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class PartnerListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'partners';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (Partner $partner) {
                    return Link::make($partner->title)
                        ->route('platform.partner.edit', $partner);
                }),

            TD::make('created_at', 'Створено'),
            TD::make('updated_at', 'Остання редакція'),
        ];
    }
}