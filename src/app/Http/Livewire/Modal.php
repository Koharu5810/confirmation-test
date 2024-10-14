<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class Modal extends Component
{
    public $showModal = false;
    public $contact;

    protected $listeners = ['openModal'];

    public function render()
    {
        return view('livewire.modal');
    }

    public function openModal($id)
    {
        $this->contact = Contact::with('category')->find($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

}
