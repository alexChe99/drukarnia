<?php
namespace App\Orchid\Screens;

use App\Models\Member;
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

class MemberEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Додати до команди';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = '';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Member $member
     *
     * @return array
     */
    public function query(Member $member): array
{
    $this->exists = $member->exists;

    if($this->exists){
        $this->name = 'Edit members';
    }

    $member->load('attachment');

    return [
        'member' => $member
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
                Input::make('member.title')
                    ->title('Ім\'я')
                    ->placeholder('Артем'),
                    
                
                    Cropper::make('member.hero')
                    ->targetId()
                    ->title('Завантажте аватар')
                    ->width(235)
                    ->height(235),
                
                    TextArea::make('member.description')
                    ->title('Посада')
                    ->rows(3)
                    ->maxlength(300)
                    ->placeholder(''),

                Relation::make('member.author')
                    ->title('Автор')
                    ->fromModel(User::class, 'name'),

               

              

            ])
        ];
    }

    /**
     * @param Member    $member
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Member $member, Request $request)
    {
        $member->fill($request->get('member'))->save();
       /** $member->attachment()->syncWithoutDetaching(
        *    $request->input('member.attachment', [])
        *);
*/
        Alert::info('You have successfully created an members.');

        return redirect()->route('platform.member.list');
    }
   

    /**
     * @param Member $member
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Member $member)
    {
        $member->delete();

        Alert::info('Ви видалили персону з команди.');

        return redirect()->route('platform.member.list');
    }
    
}