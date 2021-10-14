<?php

namespace App\Orchid\Screens;
use App\Orchid\Layouts\ContactSubmitListLayout;
use Orchid\Screen\Screen;
use App\Models\ContactSubmit;
class ContactSubmitListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'ContactSubmitListScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [ 'contact_submits' => ContactSubmit::paginate()];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [ContactSubmitListLayout::class];
    }
}
