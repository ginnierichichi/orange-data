<?php

namespace App\Http\Livewire;

use App\Models\Data;
use Livewire\Component;

class Posts extends Component
{
    public $data;
    public function mount($data)
    {
        $this->data = $data;
    }

    public function render() {

        $company = Data::findOrFail(request('data'));

        return view('livewire/posts', [
            'company' => $company
        ]);
    }

//    public function render() {
//
//        $company = Data::with('contacts')->findOrFail(request('data'));
//
//        foreach($company->contacts as $contact) {
//            $contact->name
//        }
//
//        return view('livewire/posts', [
//            'company' => $company
//        ]);
//    }

}
