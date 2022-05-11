@if($pagination->total() > $pagination->perPage())

    <div class="row m-0 h-75 w-100 d-flex justify-content-center">
        <div class="col-md-6 mb-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    @if($pagination->currentPage() !== 1)
                        <li class="page-item me-auto">
                            <a class="page-link" href=" {{ $pagination->previousPageUrl() }} " tabindex="-1">Previous</a>
                        </li>
                    @else
                        <li class="page-item disabled me-auto">
                            <a class="page-link" href=" {{ $pagination->previousPageUrl() }} " tabindex="-1">Previous</a>
                        </li>
                    @endif
                    @if($pagination->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href=" {{ $pagination->nextPageUrl() }} ">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" href=" {{ $pagination->nextPageUrl() }} ">Next</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

@endif
