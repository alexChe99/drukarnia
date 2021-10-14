<?php
namespace App\Orchid\Layouts;

use App\Models\Member;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class MemberListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'members';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (Member $member) {
                    return Link::make($member->title)
                        ->route('platform.member.edit', $member);
                }),

            TD::make('created_at', 'Створено'),
            TD::make('updated_at', 'Остання редакція'),
        ];
    }
}