<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\PostListLayout;
use App\Post;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PostListScreen extends Screen
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
            'posts'=>Post::paginate()
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
            Link::make('Create new')
                ->icon('pencil')
                ->route('platform.post.edit')
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
            PostListLayout::class
        ];
    }
}
