<div>
    <h1 class="text-4xl px-12 pt-10 font-semibold text-white">Dashboard</h1>

    <div class="p-12 flex-col space-y-4">
        <div class="flex justify-between md:pb-10">
            <div class="w-2/4">
            <x-input.text wire:model="search" placeholder="Search Data..."/>
            </div>
            <div class="space-x-2 flex items-center">
                <x-input.group borderless paddingless for="perPage" label="Per Page" >
                    <x-input.select wire:model="perPage" id="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </x-input.select>
                </x-input.group>


            <x-dropdown label="Bulk Actions">
                <x-dropdown.item type="button" wire:click="exportSelected"><i class="fas fa-download pr-2"></i>Export</x-dropdown.item>
                <x-dropdown.item type="button" wire:click="deleteSelected"><i class="far fa-trash-alt pr-2"></i>Delete</x-dropdown.item>
            </x-dropdown>
            <x-button.new wire:click="create"><i class="fas fa-plus-circle pr-2"></i>New</x-button.new>
            </div>
        </div>

        <div class="flex-col space-y-4">
            <x-table>
            <x-slot name="head">
                <x-table.heading class="pr-0 w-8">
                    <x-input.checkbox wire:model="selectPage"/>
                </x-table.heading>
                <x-table.heading sortable multi-column wire:click="sortBy('company')" :direction="$sorts['company'] ?? null" >Company</x-table.heading>
                <x-table.heading sortable multi-column wire:click="sortBy('url')" :direction="$sorts['url'] ?? null">Url</x-table.heading>
                <x-table.heading sortable multi-column wire:click="sortBy('email')" :direction="$sorts['email'] ?? null" >Email</x-table.heading>
                <x-table.heading sortable multi-column wire:click="sortBy('phone')" :direction="$sorts['phone'] ?? null" >Phone</x-table.heading>
                <x-table.heading sortable multi-column wire:click="sortBy('social')" :direction="$sorts['social'] ?? null" >Social</x-table.heading>
                <x-table.heading />
            </x-slot>

            <x-slot name="body">
                @if($selectPage)
                <x-table.row class="bg-media-orange" wire:key="row-message">
                    <x-table.cell colspan="6">
                        <div class="text-base">
                            @unless($selectAll)
                                <div>
                                    <span>You have selected <strong>{{ $datas->count() }}</strong> companies.
                                    Do you want to <x-button.link class="hover:underline hover:text-media-orange" wire:click="selectAll">Select All <strong>{{ $datas->total() }}</strong></x-button.link>?</span>
                                </div>
                            @else
                                <span>You have selected all <strong>{{ $datas->total() }}</strong> companies.</span>
                            @endif
                        </div>
                    </x-table.cell>
                </x-table.row>
                @endif

                @forelse ($datas as $data)
                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $data->id }}">
                        <x-table.cell class="pr-0">
                            <x-input.checkbox wire:model="selected" value="{{ $data->id }}"/>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="group inline-flex space-x-2 truncate" wire:click="$emit('dataId', {{ $data->id }})">
                                <!-- Heroicon name: cash -->
                                <p class="text-white truncate text-base">
                                   <a href="{{ route('posts', $data->id) }}">{{ $data->company }}</a>
                                </p>
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-white"><i class="fas fa-globe-europe pr-2 text-base"></i>{{ $data->url }}</span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-white">  <i class="fas fa-envelope pr-2"></i> {{ $data->emails->count('email') }}</span>
                        </x-table.cell>

                        <x-table.cell>
                             <span class="inline-flex items-center py-0.5 rounded-full">
                              <i class="fas fa-phone-alt text-white pr-2"></i>
                               {{ $data->contacts->count('phone') }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                             <span class="inline-flex items-center px-2.5 py-0.5 rounded-full">
                               {{ $data->socials->count() > 0 ? 'Yes' : 'No' }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <x-button.link wire:click="edit({{ $data->id }})"><span class="text-white">Edit</span></x-button.link>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="7">
                            <div class="space-x-2">
                                <x-icon.inbox />
                                <span class="text-xl text-white">No data found...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        </div>
        <div class="text-white">
            {{ $datas->links() }}
        </div>

        <!-------- EDIT TRANSACTIONS MODAL --------->
        <form wire:submit.prevent="save">
            <x-modal.dialog wire:model.defer="showEditModal">
                <x-slot name="title">
                    <span class="text-2xl py-10">  {{ $editing->id ? 'Edit' : 'Create' }} Data</span>
                </x-slot>
                <x-slot name="content">
                    <div class="space-y-4">
                        <x-input.group for="company" label="Company" :error="$errors->first('editing.company')">
                            <x-input.text wire:model="editing.company" id="company" placeholder="Company" />
                        </x-input.group>

                        <x-input.group for="url" label="Url" :error="$errors->first('editing.url')">
                            <x-input.text wire:model="editing.url" id="url" placeholder="URL" />
                        </x-input.group>

                        <x-input.group for="email" label="Email" :error="$errors->first('editing.email')">
                            <x-input.text wire:model="editing.email" id="email" placeholder="Email" />
                        </x-input.group>

                        <x-input.group for="phone" label="Phone" :error="$errors->first('editing.phone')">
                            <x-input.phone wire:model="editing.phone" id="phone" placeholder="123456789"/>
                        </x-input.group>

                        <x-input.group for="social" label="Social" :error="$errors->first('editing.social')">
                            <x-input.select wire:model="editing.social" id="social">
                                @foreach (App\Models\Data::SOCIAL as $value => $label)
                                    <option value="{{ $value  }}">{{ $label }}</option>
                                @endforeach
                            </x-input.select>
                        </x-input.group>

                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>
                    <x-button.primary type="submit">Save</x-button.primary>
                </x-slot>
            </x-modal.dialog>
        </form>
    </div>
</div>
