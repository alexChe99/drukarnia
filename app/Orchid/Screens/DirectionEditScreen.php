<?php
namespace App\Orchid\Screens;

use App\Models\Direction;
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

class DirectionEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Створити новий напрямок';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Напрямки роботи осередку';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Direction $direction
     *
     * @return array
     */
    public function query(Direction $direction): array
    {
        $this->exists = $direction->exists;

        if($this->exists){
            $this->name = 'Редагувати';
        }
        $direction->load('attachment');
        return [
            'direction' => $direction
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
            Button::make('Створити')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Оновити')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Видалити')
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
                Input::make('direction.title')
                    ->title('Назва напрямку')
                    ,
                    Cropper::make('direction.hero')
                    ->targetId()
                    ->title('Виберіть зображення для обкладинки')
                    ->width(500)
                    ->height(500),

                TextArea::make('direction.description')
                    ->title('Короткий опис')
                    ->rows(3)
                    ->maxlength(200)
                    ,

                Relation::make('direction.author')
                    ->title('Автор')
                    ->fromModel(User::class, 'name'),

                Quill::make('direction.body')
                    ->title('Повний опис напрямку'),
                    
               

            ])
        ];
    }

    /**
     * @param Direction    $direction
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Direction $direction, Request $request)
    {
        $direction->fill($request->get('direction'))->save();
        $direction->attachment()->syncWithoutDetaching(
        $request->input('direction.attachment', [])
        );

        Alert::info('You have successfully created an direction.');

        return redirect()->route('platform.direction.list');
    }

    /**
     * @param Direction $direction
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Direction $direction)
    {
        $direction->delete();

        Alert::info('Ви видалили напрямок.');

        return redirect()->route('platform.direction.list');
    }
}