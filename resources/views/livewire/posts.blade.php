<div>

    <div class="text-4xl md:pl-32 p-10">
        {{ $company->company }}
    </div>
    <div class="ml-36">
        <a href="{{ route('dashboard') }}"><i class="fas fa-arrow-circle-left text-media-orange"></i></a>
    </div>

    <div class="flex justify-center">
        <div class="space-y-6 space-x-6 flex w-10/12 bg-dark-grey-600 rounded-lg">
            <div class="space-y-6 w-1/2 p-6">
                <div class="text-media-orange">Company:<span class="text-white"> {{ $company->company }}</span></div>
                <div class="text-media-orange"> URL: <span class="text-white">{{ $company->url }}</span></div>
                <div class="text-media-orange">Address:</div>
                <div class="text-media-orange"> Secure:
                    <div class="text-white">{{ $company->padlock }}</div>
                </div>
                <div class="text-media-orange">Site Live:</div>
            </div>

            <div class="space-y-6 w-1/2 p-6">
                <div class="text-media-orange">Prediction Score:
                    <div class="text-white">{{ $company->predictions }}</div>

                </div>
                <div class="text-media-orange">Emails: <span class="text-white">
                        @foreach($company->emails as $email)
                            <ol>
                                <li>{{ $email->email }}</li>
                            </ol>
                        @endforeach

                        {{ $company->email }}</span>
                </div>
                <div class="text-media-orange">Phone Number:
                    <div class="text-white">
                        @foreach($company->contacts as $contact)
                            <ol>
                                <li>{{ $contact->phone }}</li>
                            </ol>
                        @endforeach
                    </div>
                </div>
                <div class="text-media-orange"> Social Media Links:
                    @foreach($company->socials as $social)
                        <ol class="text-white">
                            <li>{{ $social->social }}</li>
                        </ol>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
