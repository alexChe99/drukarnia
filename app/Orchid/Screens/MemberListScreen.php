<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\MemberListLayout;
use App\Models\Member;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class MemberListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Всі публікації';
    public $description = 'Всі публікації блогу';
    /**
     * Query data.
     
     */
    public function query(): array
    {
        return [
            'members'=>Member::paginate()
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
            Link::make('Створити')
                ->icon('pencil')
                ->route('platform.member.edit')
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
            MemberListLayout::class
        ];
    }
}
