<?php namespace Contentify;

use Illuminate\Pagination\LengthAwarePaginator as OriginalPaginator;
use Request;

class LengthAwarePaginator extends OriginalPaginator {

    /**
     * Create a new paginator instance.
     *
     * @param  mixed  $items
     * @param  int  $total
     * @param  int  $perPage
     * @param  int|null  $currentPage
     * @param  array  $options (path, query, fragment, pageName)
     * @return void
     */
    public function __construct($items, $total, $perPage, $currentPage = null, array $options = [])
    {
        parent::__construct($items, $total, $perPage, $currentPage, $options);

        /*
         * The original paginator always adds a trailing slash.
         * So we have to overwrite the $path variable with the path without a trailing slash.
         */
        $this->path = Request::url();
    }

}