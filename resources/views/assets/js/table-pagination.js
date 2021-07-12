(function (cash) {
    'use strict';

    function paginate($table, $paginator, $page) {
        const $trs = $table.querySelectorAll('tbody > tr');
        const limit = parseInt($table.dataset.tablePaginationLimit || 20);
        const page = parseInt($page.innerHTML);
        const first = (page - 1) * limit;
        const last = (page * limit) - 1;

        $trs.forEach(function (value, index) {
            const $tr = $trs[index];

            if ((index < first) || (index > last)) {
                $tr.style.display = 'none';
                $tr.dataset.tablePaginationHidden = 'true';
            } else {
                $tr.style.display = 'table-row';
                $tr.dataset.tablePaginationHidden = 'false';
            }
        });

        $paginator.querySelectorAll('a').forEach(each => each.classList.remove('pagination__link--active'));

        $page.classList.add('pagination__link--active');
    }

    function reset(e, $table, $paginator) {
        if (e.detail === 'pagination') {
            return;
        }

        paginate($table, $paginator, $paginator.querySelector('.pagination__link--active'));
    }

    cash('[data-table-pagination]').each(function () {
        const $table = this;
        const $paginator = document.getElementById($table.dataset.tablePagination);

        if (!$paginator) {
            return;
        }

        const total = $table.querySelectorAll('tbody > tr').length;
        const limit = parseInt($table.dataset.tablePaginationLimit || 20);

        if (total < limit) {
            return;
        }

        const pages = parseInt((total / limit) + (((total % limit) === 0) ? 0 : 1));

        $paginator.insertAdjacentHTML('beforeend', '<li><a href="javascript:;" class="pagination__link pagination__link--active">1</a></li>');

        for (let i = 1; i < pages; i++) {
            $paginator.insertAdjacentHTML('beforeend', '<li><a href="javascript:;" class="pagination__link">' + (i + 1) + '</a></li>');
        }

        paginate($table, $paginator, $paginator.querySelector('a'));

        $paginator.querySelectorAll('a').forEach(each => each.addEventListener('click', () => paginate($table, $paginator, each), false));

        $table.addEventListener('reset', (e) => reset(e, $table, $paginator), false);
    });
})(cash);
