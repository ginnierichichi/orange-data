<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Data;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithSorting, WithPerPagePagination;

    public $search = '';
    public $showEditModal = false;
    public $showFilters = false;
    public $selectPage = false;
    public $selectAll = false;
    public $selected = [];
    public $filters = [
        'social' => '',
        'url' => null,
        'email' => null,
        'phone' => null,
    ];
    public Data $editing;

    //--persist to query string --
//    protected $queryString = ['sortField', 'sortDirection'];
    protected $queryString = [];


    public function rules()
    {
        return [
        'editing.company' => 'required|min:3',
        'editing.url' => 'required',
        'editing.email' => 'email',
        'editing.phone' => 'numeric',
        'editing.social' => 'required|in:'.collect(Data::SOCIAL)->keys()->implode(','),
         ];
    }

    public function mount() {
        $this->editing = $this->makeBlankData();
        $this->editing = $this->makeBlankTransaction();
    }

    public function updatedSearch() { $this->resetPage(); }

    public function updatedSelected()
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->selected = $this->data->pluck('id')->map(fn($id) => (string) $id);
        } else {
            $this->selected = [];
        }
    }

    public function selectAll()
    {
        $this->selectAll = true;
    }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo Data::whereKey($this->selected)->toCsv();
        }, 'data.csv');
    }

    public function deleteSelected()
    {
        $data = Data::whereKey($this->selected);
        $data->delete();
    }

    public function makeBlankData(){ return Data::make(); }

    public function makeBlankTransaction()
    {
        return Data::make(['social' => 'yes']);
    }


    public function create()
    {
        if ($this->editing->getKey()) $this->editing = $this->makeBlankTransaction();

        $this->showEditModal = true;
    }

    public function edit(Data $data)
    {
        if($this->editing->isNot($data)) $this->editing = $data;
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->showEditModal = false;
    }

    public function getDataQueryProperty()
    {
        $search = '%'. $this->search . '%';

        $query = Data::where('company', 'LIKE', $search)
            ->orWhere('url', 'LIKE', $search)
            ->orWhere('email', 'LIKE', $search)
            ->orWhere('phone', 'LIKE', $search);

        return $this->applySorting($query);

    }

    public function getDataProperty()
    {
        return $this->applyPagination($this->dataQuery);
    }

    public function render()
    {
        if ($this->selectAll) {
            $this->selected = $this->data->pluck('id')->map(fn($id) => (string) $id);
        }

        return view('livewire.dashboard', [
            'datas' => $this->data
        ]);
    }
}
