<?php
namespace App\Orchid\Screens;

use App\Models\Partner;
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

class PartnerEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Додати партнера';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Партнери Друкарні';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Partner $partner
     *
     * @return array
     */
    public function query(Partner $partner): array
    {
        $this->exists = $partner->exists;

        if($this->exists){
            $this->name = 'Редагувати';
        }
        $partner->load('attachment');
        return [
            'partner' => $partner
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
                    Input::make('partner.title')
                    ->title('Назва партнерської організації')
                    ,
                    Cropper::make('partner.hero')
                    ->targetId()
                    ->title('Виберіть логотип партнера')
                    ,

                    Input::make('partner.link')
                    ->title('Посилання на ресурс партнера (сайт або соц. мережа)')
                    ,

               
                    
               

            ])
        ];
    }

    /**
     * @param Partner    $partner
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Partner $partner, Request $request)
    {
        $partner->fill($request->get('partner'))->save();
        

        Alert::info('You have successfully created an partner.');

        return redirect()->route('platform.partner.list');
    }

    /**
     * @param Partner $partner
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Partner $partner)
    {
        $partner->delete();

        Alert::info('Ви видалили партнера.');

        return redirect()->route('platform.partner.list');
    }
}