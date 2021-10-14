<?php

namespace App\Orchid\Layouts;

use App\Post;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'posts';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Назва')
                ->render(function (Post $post) {
                    return Link::make($post->title)
                        ->route('platform.post.edit', $post);
                }),

            TD::make('created_at', 'Створено'),
            TD::make('updated_at', 'Остання редакція'),
           
        ];
    }
}