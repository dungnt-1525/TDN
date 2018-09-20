<!--Start Sidebar Product -->
<div class="w_sidebar">
    <section  class="sky-form">
        <h4>{{ __('Catogories') }}</h4>
        <div class="row1 scroll-pane">
            <div class="col col-4">
                <ul class="memenu sidebar">
                    @foreach ($parentNulls as $parentNull)
                    <li class="">
                        <p>
                            <a href="{{ route('prdByCategory', $parentNull->id) }}">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>  {{ $parentNull->name }}
                            </a>
                        </p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</div>
<div class="clearfix"> </div>
<!--End Sidebar Product -->
