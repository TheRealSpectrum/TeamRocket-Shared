<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventAddForm extends Component
{
    public function render()
    {
        return view('livewire.event-add-form');
    }
    public function submit()
    {
        Event::create([

            'event_name' => $this->eventName,
            'contact_person' => $this->contactName,
            'contact_email' => $this->contactEmail,
            'allowed_participant' => $this->allowedParticipant,

        ]);

        return $this->redirectRoute('home');
    }
}
