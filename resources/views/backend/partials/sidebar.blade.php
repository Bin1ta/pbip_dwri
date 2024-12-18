@php
    use App\Enums\DocumentTypeEnum;
@endphp
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="{{ route('admin.dashboard') }}">
            <h4>{{ config('app.name') }}</h4>
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            {{-- dashboard --}}
            <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                        </svg>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>


            @can('office_setting_access')
                <li class="nav-item nav-item-has-children">
                    <a href="#" class="{{ request()->is('admin/setting/*') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" data-bs-target="#setting" aria-controls="setting"
                        aria-expanded="{{ request()->is('admin/setting/*') }}" aria-label="Toggle navigation">
                        <span class="icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="text">कार्यालय विवरण</span>
                    </a>
                    <ul id="setting" class="collapse dropdown-nav {{ request()->is('admin/setting/*') ? 'show' : '' }}">
                        <li>
                            <a class="{{ request()->is('admin/setting/officeSetting*') ? 'active' : '' }}"
                                href="{{ route('admin.officeSetting.index') }}"> कार्यालय सेटिंग </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/setting/officeDetail*') ? 'active' : '' }}"
                                href="{{ route('admin.officeDetail.index') }}"> कार्यालय विवरण </a>
                        </li>

                    </ul>
                </li>
            @endcan
            @can('menu_access')
                <li class="nav-item {{ request()->is('admin/menu*') ? 'active' : '' }}">
                    <a href="{{ route('admin.menu.index') }}">
                        <span class="icon">
                            <i class="mdi mdi-view-list"></i>
                        </span>
                        <span class="text">मेनु</span>
                    </a>
                </li>
            @endcan
            @can('slider_access')
                {{-- slider --}}
                <li class="nav-item {{ request()->is('admin/slider*') ? 'active' : '' }}">
                    <a href="{{ route('admin.slider.index') }}">
                        <span class="icon">
                            <i class="mdi mdi-abacus"></i>
                        </span>
                        <span class="text">स्लाइडर</span>
                    </a>
                </li>
            @endcan
            @can('canal_access')
                {{-- canal --}}
                <li class="nav-item {{ request()->is('admin/canal*') ? 'active' : '' }}">
                    <a href="{{ route('admin.canal.index') }}">
                        <span class="icon">
                            <i class="mdi mdi-abacus"></i>
                        </span>
                        <span class="text">केनल</span>
                    </a>
                </li>
            @endcan

            @can('employee_access')
                {{-- Employee --}}
                <li class="nav-item nav-item-has-children">
                    <a href="#" class="{{ request()->is('admin/employees/*') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" data-bs-target="#Employees" aria-controls="Employees"
                        aria-expanded="{{ request()->is('admin/employees/*') }}" aria-label="Toggle navigation">
                        <span class="icon">
                            <i class="mdi mdi-account-tie"></i>
                        </span>
                        <span class="text">कर्मचारी विवरण</span>
                    </a>
                    <ul id="Employees"
                        class="collapse dropdown-nav {{ request()->is('admin/employees/*') ? 'show' : '' }}">
                        <li>
                            <a class="{{ request()->is('admin/employees/department*') ? 'active' : '' }}"
                                href="{{ route('admin.department.index') }}"> शाखा </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/employees/designation*') ? 'active' : '' }}"
                                href="{{ route('admin.designation.index') }}"> पद </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/employees/employee*') ? 'active' : '' }}"
                                href="{{ route('admin.employee.index') }}"> कर्मचारीहरु </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/employees/exEmployee*') ? 'active' : '' }}"
                                href="{{ route('admin.exEmployee.index') }}"> पूर्व कर्मचारीहरु </a>
                        </li>

                    </ul>
                </li>
            @endcan


            <li class="nav-item nav-item-has-children">
                <a href="#" class="{{ request()->is('admin/contract-progress/*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" data-bs-target="#contract-progress" aria-controls="contract-progress"
                    aria-expanded="{{ request()->is('admin/contract-progress/*') }}" aria-label="Toggle navigation">
                    <span class="icon">
                        <i class="mdi mdi-file-document"></i>

                    </span>
                    <span class="text">समझौता विवरण</span>
                </a>
                <ul id="contract-progress"
                    class="collapse dropdown-nav {{ request()->is('admin/contract-progress/*') ? 'show' : '' }}">
                    @can('contract_progress_access')
                        <li>
                            <a class="{{ request()->is('admin/contractProgress/contract-progress*') ? 'active' : '' }}"
                                href="{{ route('admin.contract-progress.index') }}"> contract Progress </a>
                        </li>
                    @endcan
                    @can('current_contract_access')
                        <li>
                            <a class="{{ request()->is('admin/currentContract/current-contract*') ? 'active' : '' }}"
                                href="{{ route('admin.current-contract.index') }}"> Current Contract </a>
                        </li>
                    @endcan

                    @can('finished_contract_access')
                        <li>
                            <a class="{{ request()->is('admin/finishedContract/finished-contract*') ? 'active' : '' }}"
                                href="{{ route('admin.finished-contract.index') }}"> Finished Contract </a>
                        </li>
                    @endcan
                    @can('total_progress_access')
                        <li>
                            <a class="{{ request()->is('admin/totalProgress/total-progress*') ? 'active' : '' }}"
                                href="{{ route('admin.total-progress.index') }}"> Total Progress</a>
                        </li>
                    @endcan
                    @can('contract_progress_access')
                        <li>
                            <a class="{{ request()->is('admin/workPlanProgress/work-plan-progress*') ? 'active' : '' }}"
                                href="{{ route('admin.work-plan-progress.index') }}"> Work Plan Progress</a>
                        </li>
                    @endcan

                </ul>
            </li>

            @foreach ($sharedDocumentCategories as $sharedDocumentCategory)
                <li class="nav-item nav-item-has-children">
                    @can('category_access')
                        <a href="#"
                            class="{{ request()->is('admin/documentCategory/' . $sharedDocumentCategory->id . '/*') ? '' : 'collapsed' }}"
                            data-bs-toggle="collapse" data-bs-target="#document{{ $sharedDocumentCategory->id }}"
                            aria-controls="document{{ $sharedDocumentCategory->id }}"
                            aria-expanded="{{ request()->is('admin/documentCategory/' . $sharedDocumentCategory->id . '/*') }}"
                            aria-label="Toggle navigation">
                            <span class="icon">
                                <i class="mdi mdi-file-document"></i>
                            </span>
                            <span class="text">{{ $sharedDocumentCategory->title }}</span>
                        </a>
                    @endcan
                    <ul id="document{{ $sharedDocumentCategory->id }}"
                        class="collapse dropdown-nav {{ request()->is('admin/documentCategory/' . $sharedDocumentCategory->id . '/*') ? 'show' : '' }}">
                        <li>
                            @can('category_access')
                                <a class="{{ request()->is('admin/documentCategory/' . $sharedDocumentCategory->id . '/category*') ? 'active' : '' }}"
                                    href="{{ route('admin.documentCategory.category.index', $sharedDocumentCategory) }}">
                                    वर्ग थप्नुहोस
                                </a>
                            @endcan
                            @can('category_access')
                                <a class="{{ request()->is('admin/documentCategory/' . $sharedDocumentCategory->id . '/document*') ? 'active' : '' }}"
                                    href="{{ route('admin.documentCategory.document.index', $sharedDocumentCategory) }}">
                                    {{ $sharedDocumentCategory->title }}
                                    लिस्ट
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>
            @endforeach

            @can('photoGallery_access')
                <li class="nav-item nav-item-has-children">
                    <a href="#" class="{{ request()->is('admin/gallery/*') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" data-bs-target="#gallery" aria-controls="Employees"
                        aria-expanded="{{ request()->is('admin/gallery/*') }}" aria-label="Toggle navigation">
                        <span class="icon">
                            <i class="mdi mdi-image-search-outline"></i>
                        </span>
                        <span class="text">ग्यालरी</span>
                    </a>
                    <ul id="gallery"
                        class="collapse dropdown-nav {{ request()->is('admin/gallery/*') ? 'show' : '' }}">
                        <li>
                            <a class="{{ request()->is('admin/gallery/photoGallery*') ? 'active' : '' }}"
                                href="{{ route('admin.photoGallery.index') }}"> फोटो ग्यालरी </a>
                            <a class="{{ request()->is('admin/gallery/videoGallery*') ? 'active' : '' }}"
                                href="{{ route('admin.videoGallery.index') }}"> भिडीयो ग्यालरी </a>
                            <a class="{{ request()->is('admin/gallery/audio*') ? 'active' : '' }}"
                                href="{{ route('admin.audio.index') }}"> अडियो ग्यालरी </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('water_consumption_access')
                <li class="nav-item nav-item-has-children">
                    <a
                        href="#"
                        class="{{request()->is('admin/waterConsumption/*') ? '' : 'collapsed'}}"
                        data-bs-toggle="collapse"
                        data-bs-target="#waterConsumption"
                        aria-controls="WaterConsumptions"
                        aria-expanded="{{request()->is('admin/waterConsumption/*')}}"
                        aria-label="Toggle navigation"
                    >
              <span class="icon">
               <i class="mdi mdi-account"></i>
              </span>
                        <span class="text">जल उपभोक्ता समिति</span>
                    </a>
                    <ul id="waterConsumption"
                        class="collapse dropdown-nav {{request()->is('admin/waterConsumption/*') ? 'show' : ''}}">
                        <li>
                            <a class="{{request()->is('admin/waterConsumption/committeeCategory*') ? 'active' : ''}}"
                               href="{{route('admin.committeeCategory.index')}}"> समितिको वर्ग </a>
                            <a class="{{request()->is('admin/waterConsumption/committee*') ? 'active' : ''}}"
                               href="{{route('admin.committee.index')}}"> समिति</a>
                            <a class="{{request()->is('admin/waterConsumption/committeeMember*') ? 'active' : ''}}"
                               href="{{route('admin.committeeMember.index')}}"> सदस्यहरु</a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('registration_access')
                <li class="nav-item nav-item-has-children">
                    <a href="#" class="{{ request()->is('admin/registrations/*') ? '' : 'collapsed' }}"
                       data-bs-toggle="collapse" data-bs-target="#registrations" aria-controls="registrations"
                       aria-expanded="{{ request()->is('admin/registrations/*') }}" aria-label="Toggle navigation">
        <span class="icon">
            <i class="mdi mdi-image-search-outline"></i>
        </span>
                        <span class="text">प्रशासन</span>
                    </a>
                    <ul id="registrations" class="collapse dropdown-nav {{ request()->is('admin/registrations/*') ? 'show' : '' }}">
                        <li>
                            <a class="{{ request()->is('admin/registrations/registration*') ? 'active' : '' }}"
                               href="{{ route('admin.registration.index') }}"> दर्ता </a>
                            <a class="{{ request()->is('admin/registrations/invoice*') ? 'active' : '' }}"
                               href="{{ route('admin.invoice.index') }}"> चलानी </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('administration_access')
            <li class="nav-item nav-item-has-children">
                <a href="#"
                   class="{{ request()->is('admin/administrations/*') ? '' : 'collapsed' }}"
                   data-bs-toggle="collapse"
                   data-bs-target="#administrations"
                   aria-controls="administrations"
                   aria-expanded="{{ request()->is('admin/administrations/*') }}"
                   aria-label="Toggle navigation">
        <span class="icon">
            <i class="mdi mdi-file-outline"></i>
        </span>
                    <span class="text">प्रविधिक</span>
                </a>
                <ul id="administrations" class="collapse dropdown-nav {{ request()->is('admin/administrations/*') ? 'show' : '' }}">
                    @foreach (DocumentTypeEnum::cases() as $documentType)
                        <li>
                            <a class="{{ request()->is('admin/administrations/' . $documentType->value . '*') ? 'active' : '' }}"
                               href="{{ route('admin.administration.index', ['type' => $documentType->value]) }}">
                                {{ $documentType->label() }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @endcan

            @can('bill_access')
                <li class="nav-item {{ request()->is('admin/bill/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.index') }}">
                        <span class="icon">
                            <i class="mdi mdi-billboard"></i>
                        </span>
                        <span class="text">बिल सार्बजनिकरण</span>
                    </a>
                </li>
            @endcan
            @can('faq_access')
                <li class="nav-item {{ request()->is('admin/faq*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faq.index') }}">
                        <span class="icon">
                            <i class="mdi mdi-view-list"></i>
                        </span>
                        <span class="text">धेरै सोधिएको प्रस्नहरु</span>
                    </a>
                </li>
            @endcan
            @can('link_access')
                <li class="nav-item {{ request()->is('admin/link*') ? 'active' : '' }}">
                    <a href="{{ route('admin.link.index') }}">
                        <span class="icon">
                            <i class="mdi mdi-link"></i>
                        </span>
                        <span class="text">लिङ्कहरू</span>
                    </a>
                </li>
            @endcan

            @can('contact_message_access')
                <li class="nav-item {{ request()->is('admin/contactMessage*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contactMessage.index') }}">
                        <span class="icon">
                            <i class="mdi mdi-message-text"></i>
                        </span>
                        <span class="text">सम्पर्क सन्देशहरू</span>
                    </a>
                </li>
            @endcan
            @can('color_access')
                <li class="nav-item">
                    <a href="{{ route('admin.color.index') }}">
                        <span class="icon">
                            <i class="mdi mdi-message-text"></i>
                        </span>
                        <span class="text">रंग</span>
                    </a>
                </li>
            @endcan

        </ul>
    </nav>

</aside>
