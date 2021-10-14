<?php
namespace App\Presenters;

use Orchid\Screen\Contracts\Cardable;
use Orchid\Support\Presenter;

class MemberPresenter extends Presenter 
{
    public function title(): string
    {
        return $this->entity->title;
    }

    public function description(): string
    {
        return $this->entity->description;
    }

    public function hero(): ?string
    {
        return $this->entity->hero;
    }

    public function color(): ?Color
    {
        return $this->entity->amount > 0
            ? Color::SUCCESS()
            : Color::DANGER();
    }
}