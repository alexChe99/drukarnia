<?php
namespace App\Orchid\Screens;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class PostEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Створити нову публікацю';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Напишіть що вважаєте за потрібне';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Post $post
     *
     * @return array
     */
    public function query(Post $post): array
{
    $this->exists = $post->exists;

    if($this->exists){
        $this->name = 'Edit post';
    }

    $post->load('attachment');

    return [
        'post' => $post
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
            Button::make('Постити')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
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
            Layout::rows([
                Input::make('post.title')
                    ->title('Назва')
                    ->placeholder('')
                    ->help('Коротка та змістовна назва Вашої статті.'),
                
                    Cropper::make('post.hero')
                    ->targetId()
                    ->title('Large web banner image, generally in the front and center')
                    ->width(1000)
                    ->height(500),
                
                    TextArea::make('post.description')
                    ->title('Короткий опис')
                    ->rows(3)
                    ->maxlength(300)
                    ->placeholder(''),

                Relation::make('post.author')
                    ->title('Автор')
                    ->fromModel(User::class, 'name'),

                Quill::make('post.body')
                    ->title('Текст публікації'),

                Upload::make('post.attachment')
                ->targetUrl()
                    ->title('Зображення')

            ])
        ];
    }

    /**
     * @param Post    $post
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Post $post, Request $request)
    {
        $post->fill($request->get('post'))->save();
        $post->attachment()->syncWithoutDetaching(
            $request->input('post.attachment', [])
        );

        Alert::info('You have successfully created an posts.');

        return redirect()->route('platform.post.list');
    }
   

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Post $post)
    {
        $post->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.post.list');
    }
    
}