@props([
    'modules' => [],
])

@php
    /**
     * Each module:
     *   ['title' => 'string', 'items' => ['string', ...] | null, 'subgroups' => [['title' => '', 'items' => []]] | null]
     * If items or subgroups present -> accordion. Else flat header card.
     */
@endphp

@if(!empty($modules))
    <ol class="course-curriculum">
        @foreach($modules as $i => $module)
            @php
                $hasItems = !empty($module['items']);
                $hasSubgroups = !empty($module['subgroups']);
                $isAccordion = $hasItems || $hasSubgroups;
                $variant = $isAccordion ? 'course-module--accordion' : 'course-module--flat';
            @endphp

            <li class="course-module {{ $variant }}" @if($isAccordion) data-open="false" @endif>
                <button type="button" class="course-module__header">
                    <span class="course-module__number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="course-module__title">{{ $module['title'] }}</h3>
                    @if($isAccordion)
                        <span class="course-module__chevron" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    @endif
                </button>

                @if($isAccordion)
                    <div class="course-module__body">
                        <div class="course-module__body-inner">
                            @if($hasSubgroups)
                                <ol>
                                    @foreach($module['subgroups'] as $sub)
                                        <li>
                                            <p>{{ $sub['title'] }}</p>
                                            @if(!empty($sub['items']))
                                                <ul>
                                                    @foreach($sub['items'] as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ol>
                            @elseif($hasItems)
                                <ul>
                                    @foreach($module['items'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ol>
@endif
