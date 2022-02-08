<div>
    
    @if($showForm)
        <a wire:click="cancel" class="float-right bg-red-600 p-2 rounded text-white">Cancel</a>
        <div class="clear-both"></div>
        <form wire:submit.prevent="save" enctype="multipart/form-data">
            <div class="border-top rounded my-2">
                @forelse($block->inputs as $input)
                    <div class="mb-3">
                        <label for="{{ $input->id }}">{{ $input->label }}</label>
                        @if($input->type=="text")
                            <input type="text" wire:model="{{ $input->var }}" id="{{ $input->input_id }}" placeholder="{{ $input->placeholder }}" class="block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        @elseif($input->type=="image")
                            @if (isset($inputs[$input->input_id]))
                                <div class="shrink-0 mb-3">
                                    <img class="h-16 w-16 object-cover rounded" src="{{ $inputs[$input->input_id]->temporaryUrl() }}" alt="preview"/>
                                </div>
                            @endif
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input  wire:model="{{ $input->var }}" id="{{ $input->input_id }}" type="file" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-violet-50 file:text-violet-700
                                hover:file:bg-violet-100
                                "/>
                            </label>
                        @endif
                        @error($input->var)
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                @empty
                    <div class="bg-red-100 rounded-lg py-5 px-6 text-base text-red-700 mb-3" role="alert">
                        No Inputs Added
                    </div> 
                @endforelse


                <button class=" bg-blue-600 p-2 px-6 rounded text-white">Save</button>
            </div>
        <form>
    @else
        <a wire:click="addnew" class="float-right bg-blue-600 p-2 rounded text-white mb-3">Add</a>
        <div class="clear-both"></div>

        <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        
        </table>
      </div>
    </div>
  </div>
</div>

        <table class="min-w-full">
            <thead class="border-b bg-gray-50 text-left">
                <tr>
                    @foreach($block->inputs as $input)
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    {{ $input->label }}
                    </th>
                    @endforeach
                
                </tr>
            </thead class="border-b">
            <tbody>
            @foreach($block->components as $component)
                <?php $data=json_decode($component->json_data, true); ?>
                <tr>
                    @foreach($block->inputs as $input)
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        @if($input->type=='image')
                            <div class="shrink-0 mb-3">
                                <img class="h-16 w-16 object-cover rounded" src="{{ asset('storage/'.$data[$input->input_id]) }}" alt="preview"/>
                            </div>
                        @else
                            {{ $data[$input->input_id] }}
                        @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
