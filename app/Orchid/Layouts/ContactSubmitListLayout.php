<?php

namespace App\Orchid\Layouts;
use App\Models\ContactSubmit;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ContactSubmitListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    public  $target = 'contact_submits';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    public  function columns(): array
    {
        return [
            TD::make('name', 'Як звати?'),
            TD::make('phone', 'Номер телефону'),
            TD::make('status', 'Статус заявки'),
            TD::make('comment', 'Коментар'),
            TD::make('created_at', 'Час заявки'),
        ];
    }
}
