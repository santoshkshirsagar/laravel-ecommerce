<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ContentComponent;

class Components extends Component
{
    use WithFileUploads;
    public $block, $inputs=array(), $files=array(), $showForm=false;

    protected $rules=[];
    protected $validationAttributes = [];

    public function mount()
    {
        $this->generateRules();
    }
    public function generateRules()
    {
        if(sizeof($this->block->inputs)>0){
            foreach($this->block->inputs as $input){
                $input->var='inputs.'.$input->input_id;
                $rules=array();
                if($input->mandatory){
                    $rules[]='required';
                }
                if($input->min){
                    $rules[]='min:'.$input->min;
                }
                if($input->max){
                    $rules[]='max:'.$input->max;
                }
                if($input->type=="image"){
                    $rules[]='image';
                    $this->files[]=$input->input_id;
                }
                $this->rules[$input->var]=implode('|',$rules);
                $attributes[$input->var]=$input->label;
            }
            $this->validationAttributes = $attributes;
        }
    }
    public function updated($propertyName)
    {
        $this->generateRules();
        $this->validateOnly($propertyName);
    }
    public function addnew(){
        $this->showForm=true;
        $this->generateRules();
    }
    public function cancel(){
        $this->showForm=false;
        $this->generateRules();
    }

    public function save()
    {
        $this->generateRules();
        $this->validate();
        //dd($this->inputs);
        if(sizeof($this->files)>0){
            foreach($this->files as $fileId)
            {
                $file=$this->inputs[$fileId];
                $paths[$fileId] = $file->store('photos','public');
            }
        }
        foreach($paths as $fileId=>$path){
            $this->inputs[$fileId]=$path;
        }
        dd(json_encode($this->inputs));
    }
    public function render()
    {
        return view('livewire.content.components');
    }
}
