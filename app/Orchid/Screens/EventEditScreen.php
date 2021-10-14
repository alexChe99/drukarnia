<?php
namespace App\Orchid\Screens;

use App\Models\Event;
use App\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\DateTimer;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class EventEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Створити нову подію';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Опис події';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Event $event
     *
     * @return array
     */
    public function query(Event $event): array
{
    $this->exists = $event->exists;

    if($this->exists){
        $this->name = 'Редагувати';
    }

    $event->load('attachment');
    return [
        'event' => $event
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
                Input::make('event.title')
                    ->title('Назва')
                    ->placeholder('')
                    ->help('Коротка та змістовна назва Вашої події'),
                
                  
                
                    TextArea::make('event.description')
                    ->title('Короткий опис')
                    ->rows(3)
                    ->maxlength(300)
                    ->placeholder(''),
                    
                    DateTimer::make('event.data')
                    ->title('Opening date')
                    ->format('Y-m-d'),

                    Cropper::make('event.hero')
                    ->title('Додати зображення обкладинки')
                    ->targetId()
                    ->width(1200)
                    ->height(520),

                    DateTimer::make('event.time')
                    ->title('Opening time')
                    ->noCalendar()
                    ->format('h:i K'),

                     Relation::make('event.author')
                    ->title('Автор')
                    ->fromModel(User::class, 'name'),

                     Quill::make('event.body')
                    ->title('Текст події'),

                    Input::make('event.location')
                    ->title('Локація')
                    ->placeholder('')
                    ->help('Вкажіть де проводиться захід'),

                    Input::make('event.link')
                    ->title('Посилання на реєстрацію')
                    ->placeholder('')
                    ->help(''),

               

            ])
        ];
    }

    /**
     * @param Event    $event
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Event $event, Request $request)
    {
        $event->fill($request->get('event'))->save();
       

        Alert::info('You have successfully created an events.');

        return redirect()->route('platform.event.list');
    }
   

    /**
     * @param Event $event
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Event $event)
    {
        $event->delete();

        Alert::info('You have successfully deleted the event.');

        return redirect()->route('platform.event.list');
    }
    
}