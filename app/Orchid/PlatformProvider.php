<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            
            
            Menu::make('Всі публікації')->icon('paste')->route('platform.post.list') ->title('Панель керування'),

            Menu::make('Напрямки роботи')->icon('directions')->route('platform.direction.list'),

            Menu::make('Команда')->icon('friends')->route('platform.member.list'),
                
            Menu::make('Події')->icon('event')->route('platform.event.list'),
            Menu::make('Партнери')->icon('organization')->route('platform.partner.list'),
            Menu::make('Телефонні заявки')->icon('phone')->route('platform.contactsubmit.list'),

            //Menu::make('Text Editors')
            //    ->icon('list')
            //    ->route('platform.example.editors'),

            //Menu::make('Overview layouts')
            //    ->title('Layouts')
            //    ->icon('layers')
            //    ->route('platform.example.layouts'),

            //Menu::make('Chart tools')
            //    ->icon('bar-chart')
            //    ->route('platform.example.charts'),

            //Menu::make('Cards')
            //    ->icon('grid')
            //    ->route('platform.example.cards')
            //    ->divider(),

            //Menu::make('Documentation')
            //    ->title('Docs')
            //    ->icon('docs')
            //    ->url('https://orchid.software/en/docs'),

            //Menu::make('Changelog')
            //    ->icon('shuffle')
            //    ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
            //    ->target('_blank')
            //    ->badge(function () {
            //        return Dashboard::version();
            //    }, Color::DARK()),

            Menu::make(__('Користувачі'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Права доступу')),

            Menu::make(__('Ролі'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
